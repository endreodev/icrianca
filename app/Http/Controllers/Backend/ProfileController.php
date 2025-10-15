<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Sex;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Classes\Upload;

class ProfileController extends Controller
{

    use Upload;

    public function index()
    {
        $countries      = Country::select('name', 'id')->get();
        $sexes          = Sex::where('status', TRUE)->get();

        $content = User::find(\Auth::guard('web')->user()->id);

        return view('backend.pages.profile.index', [
            'countries' => $countries,
            'sexes' => $sexes,
            'content' => $content,
        ]);
    }

    public function update(Request $request)
    {

        # Init transaction
        \DB::beginTransaction();

        try {

            $content = User::find(\Auth::guard('web')->user()->id);

            # Check Super Admin
            if ($content->hasRole('admin')) {
                if (!Auth::guard('web')->user()->hasRole('admin')) {
                    throw new \Exception("Você não tem permissão para isso.");
                }
            }

            $rules = User::$rules;

            unset($rules['email']);

            # Rules Saved
            $rules['document']  = 'required|unique:users,document,' . $content->getId() . ',id,deleted_at,NULL|max:14';

            if ($content->status === 3) {
                $rules['password']  = 'required|confirmed|min:6';
            }

            # Validate FOrm
            $request->validate($rules, \Lang::get('validation'));

            $children = [];
            if ($request->input('children_name')) {
                foreach ($request->input('children_name') as $key => $name) {
                    $children[$key]['name'] = $name;
                    $children[$key]['document'] = (isset($request->input('children_document')[$key]) ? $request->input('children_document')[$key] : null);
                    $children[$key]['birthday'] = (isset($request->input('children_birthday')[$key]) ? $request->input('children_birthday')[$key] : null);
                }
                $request->merge([
                    'children' => $children,
                ]);
            }

            if (!$request->input('declared_color')) {
                $request->merge([
                    'declared_color' => null,
                ]);
            }

            if ($request->input('marital_status') === 'other') {
                $request->merge([
                    'marital_status' => $request->input('other_marital_status'),
                ]);
            }

            if (!$request->input('marital_status')) {
                $request->merge([
                    'marital_status' => null,
                ]);
            }


            # Upload
            if ($request->file('file')) {
                $size = [400, 400];
                $request->merge([
                    'image' => $this->upload($request,  $attr = 'file', $size)
                ]);
            }


            if ($content->status === 3) {
                if (!$request->input('password')) {
                    throw new \Exception("Você precisa informar uma senha.");
                } else {
                    $request->merge([
                        'status' => 1,
                    ]);
                }
            }

            $content->update($request->all());

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            \DB::commit();
        } catch (\Illuminate\Validation\ValidationException $e) {
            \DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);

            \DB::rollback();

            return redirect()->back()->withInput();
        }

        return redirect(route('backend.profile'));
    }
}
