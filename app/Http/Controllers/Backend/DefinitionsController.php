<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

# --  
use App\Models\Definition as Model;
use View;
# -- 
use Classes\Upload;

class DefinitionsController extends Controller
{
    private $model;
    private $path;
    private $route;

    use Upload;

    public function __construct()
    {
        $this->model        = Model::class;
        $this->path         = 'definitions';
        $this->route        = 'backend.frontend.definitions';

        $this->middleware('permission:' . $this->model::PREFIX . '.index',   ['only' => ['index']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.show',   ['only' => ['show']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.update', ['only' => ['update']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.status', ['only' => ['status']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.delete', ['only' => ['destroy']]);

        # Share Globally
        View::share([
            'title'     => $this->model::NAME,
            'route'     => $this->route,
            'path'      => $this->path,
        ]);
    }

    public function show()
    {
        return view('backend.pages.' . $this->path . '.show', [
            'content'  => $this->model::firstOrCreate(['id' => 1]),
        ]);
    }


    public function update(Request $request)
    {
        # Init transaction
        \DB::beginTransaction();

        try {

            $request->merge([
                'id' => 1,
            ]);

            # Upload File
            if ($request->hasFile('file-bg_programs')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_programs' => $this->upload($request, 'file-bg_programs', $size)
                ]);
            }
            if ($request->hasFile('file-bg_actions')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_actions' => $this->upload($request, 'file-bg_actions', $size)
                ]);
            }
            if ($request->hasFile('file-bg_actions_line')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_actions_line' => $this->upload($request, 'file-bg_actions_line', $size)
                ]);
            }
            if ($request->hasFile('file-bg_units')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_units' => $this->upload($request, 'file-bg_units', $size)
                ]);
            }
            if ($request->hasFile('file-bg_partners')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_partners' => $this->upload($request, 'file-bg_partners', $size)
                ]);
            }
            if ($request->hasFile('file-image_1_partner')) {

                $size = [570, 323];
                $request->merge([
                    'image_1_partner' => $this->upload($request, 'file-image_1_partner', $size)
                ]);
            }
            if ($request->hasFile('file-image_2_partner')) {

                $size = [570, 323];
                $request->merge([
                    'image_2_partner' => $this->upload($request, 'file-image_2_partner', $size)
                ]);
            }
            if ($request->hasFile('file-bg_contacts')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_contacts' => $this->upload($request, 'file-bg_contacts', $size)
                ]);
            }
            if ($request->hasFile('file-bg_reports')) {

                $size = [1170, 778];
                $request->merge([
                    'bg_reports' => $this->upload($request, 'file-bg_reports', $size)
                ]);
            }

            # Validate FOrm
            $request->validate($this->model::$rules, \Lang::get('validation'));

            # Update
            $this->model::find(1)->update($request->except(['_token', 'file-image_background', 'file-image_featured', 'file-about_image_secondary']));

            # Alert
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            # Commit
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

            # Rollback
            \DB::rollback();
            return redirect()->back()->withInput();
        }

        return redirect(route($this->route . '.show'));
    }
}
