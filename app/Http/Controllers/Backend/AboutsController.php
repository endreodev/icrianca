<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

# --  
use App\Models\About as Model;
use View;
# -- 
use Classes\Upload;

class AboutsController extends Controller
{
    private $model;
    private $path;
    private $route;

    use Upload;

    public function __construct()
    {
        $this->model        = Model::class;
        $this->path         = 'abouts';
        $this->route        = 'backend.frontend.abouts';

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
        try {
            \LogActivity::addToLog('Usuário acessou a sessão: ' . $this->model::NAME);
        } catch (\Exception $e) {
        }
        return view('backend.pages.' . $this->path . '.show', [
            'content'  => $this->model::find(1),
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
            if ($request->hasFile('file-image_background')) {

                $size = [1903, 450];
                $request->merge([
                    'image_background' => $this->upload($request, 'file-image_background', $size)
                ]);
            }
            if ($request->hasFile('file-image_featured')) {

                $size = [1170, 390];
                $request->merge([
                    'image_featured' => $this->upload($request, 'file-image_featured', $size)
                ]);
            }
            if ($request->hasFile('file-about_image_secondary')) {

                $size = [900, 500];
                $request->merge([
                    'about_image_secondary' => $this->upload($request, 'file-about_image_secondary', $size)
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

            try {
                \LogActivity::addToLog('Usuário atualizou a sessão: ' . $this->model::NAME);
            } catch (\Exception $e) {
            }

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
