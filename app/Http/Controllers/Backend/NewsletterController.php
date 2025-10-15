<?php

namespace App\Http\Controllers\Backend;

use App\Exports\NewsletterExportExcel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
# --  
use App\Models\Newsletter as Model;
use App\Models\Unit;
use App\Notifications\UserNotify;
use Classes\DataTable as ClassesDataTable;
use Yajra\DataTables\Datatables;
use View;
# -- 
use Auth;

class NewsletterController extends Controller
{
    private $model;
    private $path;
    private $route;

    public function __construct()
    {
        $this->model        = Model::class;
        $this->path         = 'newsletter';
        $this->route        = 'backend.frontend.newsletter';

        $this->middleware('permission:' . $this->model::PREFIX . '.index',   ['only' => ['index']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.status', ['only' => ['status']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.delete', ['only' => ['destroy']]);

        # Share Globally
        View::share([
            'title'     => $this->model::NAME,
            'route'     => $this->route,
            'path'      => $this->path,
        ]);
    }


    public function DataTable()
    {
        return Datatables::of($this->model::latest())
            // ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return View::make('backend.pages.' . $this->path . '.actions', ['row' => $row, 'path' => $this->path, 'route' => $this->route])->render();
            })
            ->addColumn('status', function ($row) {
                return '<span class="badge light badge-' . $row->getStatus()->badge . '"><i class="fa fa-circle text-' . $row->getStatus()->badge . ' mr-1"></i>' . $row->getStatus()->text . '</span>';
            })
            ->filterColumn('status', function ($query, $keyword) {
                if (strtolower($keyword) === 'ativo') {
                    return $query->where('status', TRUE);
                } else
                if (strtolower($keyword) === 'inativo') {
                    return $query->where('status', FALSE);
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    public function DataTableColumn()
    {

        $DataTableColumn = new ClassesDataTable;
        $fields = [
            [
                'data' => 'id',
                'title' => __('tables.id',),
            ],
            [
                'data' => 'email',
                'title' => __('tables.email'),
            ],
            [
                'data' => 'status',
                'title' => __('tables.status'),
            ],
            [
                'data' => 'action',
                'title' => __('tables.action'),
            ],
        ];
        $js = $DataTableColumn->getColumns('js', $fields);
        $table = $DataTableColumn->getColumns('table', $fields);

        return (object) [
            'js' => $js,
            'table' => $table,
        ];
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->DataTable();
        }

        return view('backend.pages.' . $this->path . '.index', [
            'columns' => $this->DataTableColumn(),
        ]);
    }

    public function create()
    {
        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $this->model::create([]),
        ]);
    }

    public function status(Request $request, $id)
    {
        # Init transaction
        \DB::beginTransaction();
        try {


            $content = $this->model::findOrFail($id);
            $content->status = !$content->status;
            $content->save();

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            \DB::commit();
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

        return redirect(route($this->route . '.index'));
    }


    public function destroy(Request $request, $id)
    {        # Init transaction
        \DB::beginTransaction();
        try {
            $content = $this->model::findOrFail($id);
            $content->delete();

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            \DB::commit();
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

        return redirect(route($this->route . '.index'));
    }

    public function export(Request $request)
    {

        try {
            $rows = $this->model::query()->get();

            if ($rows->count() === 0) {
                throw new \Exception("Nenhum registro encontrado.");
            }

            # New Name File            
            $fileName = 'Newsletter_' . \Carbon\Carbon::now()->format('d-m-Y-H-i-s');

            $content = [
                'subject' => 'Dados exportado com sucesso!',
                'message' => 'Olá, seus dados estão prontos, clique no <a href="' . route('frontend.download.file', [$fileName . '.xlsx', 'public-exports-excel']) . '">aqui</a> para download.',
            ];

            (new NewsletterExportExcel($rows))->queue('public/exports/excel/' . $fileName . '.xlsx')->chain([
                new UserNotify($content, Auth::guard('web')->user()),
            ]);
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso! Será enviado um e-mail para ' . Auth::guard('web')->user()->email . ', com o link para download do arquivo',
            ]);

            return redirect(route($this->route . '.index'));
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput();
        }
    }
}
