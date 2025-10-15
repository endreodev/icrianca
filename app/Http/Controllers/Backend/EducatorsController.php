<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\Sex;
use App\Models\User;

use Classes\DataTable as ClassesDataTable;
use Yajra\DataTables\Datatables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Classes\Upload;

class EducatorsController extends Controller
{
    use Upload;

    private $model;
    private $path;


    public function __construct()
    {
        $this->model        = User::class;
        $this->path         = 'users';

        $this->middleware('permission:educator.index',   ['only' => ['index']]);
        $this->middleware('permission:educator.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:educator.show',   ['only' => ['show']]);
        $this->middleware('permission:educator.update', ['only' => ['update']]);
        $this->middleware('permission:educator.status', ['only' => ['status']]);
        $this->middleware('permission:educator.delete', ['only' => ['destroy']]);
    }

    public function DataTable()
    {
        return Datatables::of($this->model::query())
            // ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return View::make('backend.pages.' . $this->path . '.actions', ['row' => $row])->render();
            })
            ->addColumn('status', function ($row) {
                return '<span class="badge light badge-' . $row->getStatus()->badge . '"><i class="fa fa-circle text-' . $row->getStatus()->badge . ' mr-1"></i>' . $row->getStatus()->text . '</span>';
            })
            ->editColumn('name', function ($row) {
                return '<img class="rounded-circle" width="35" src="' . $row->getImage() . '" alt=""> ' . $row->name . ' ' . $row->surname;
            })
            ->filterColumn('status', function ($query, $keyword) {
                if (strtolower($keyword) === 'ativo') {
                    return $query->where('status', TRUE);
                } else
                if (strtolower($keyword) === 'inativo') {
                    return $query->where('status', FALSE);
                }
            })
            ->orderColumn("name", function ($query, $order) {
                return $query->orderBy('name', $order);
            })
            ->orderColumn("id", function ($query, $order) {
                return $query->orderBy('id', $order);
            })
            ->rawColumns(['status', 'action', 'name'])
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
            // [
            //     'data' => 'image',
            //     'title' => __('tables.image'),
            // ],
            [
                'data' => 'name',
                'title' => __('tables.name'),
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
        $countries      = Country::select('name', 'id')->get();
        $roles          = Role::all();
        $permissions    = Permission::all();
        $sexes          = Sex::where('status', TRUE)->get();

        return view('backend.pages.' . $this->path . '.show', [
            'countries'     => $countries,
            'content'       => $this->model::create([]),
            'roles'         => $roles,
            'permissions'   => $permissions,
            'sexes'         => $sexes,
        ]);
    }

    public function store(Request $request)
    {
        # Init transaction
        \DB::beginTransaction();

        try {

            if ((is_array($request->input('roles'))) && in_array('admin', $request->input('roles'))) {
                if (!Auth::guard('web')->user()->hasRole('admin')) {
                    throw new \Exception("Você não tem permissão para isso.");
                }
            }

            # Validate Form
            $request->validate($this->model::$rules, \Lang::get('validation'));

            if ($request->hasFile('file')) {

                $size = [400, 400];
                $request->merge([
                    'image' => $this->upload($request,  $attr = 'file', $size)
                ]);
            }

            $content = $this->model::create($request->all());

            # syncRoles
            $roles = $request->input('roles');
            if ($roles) {
                $content->syncRoles($roles);
            }

            # syncPermissions
            $permissions = $request->input('permissions');
            if ($permissions) {
                $content->syncPermissions($permissions);
            }


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
        return redirect(route('backend.' . $this->path . '.index'));
    }

    public function show(Request $request, $id)
    {

        $countries      = Country::select('name', 'id')->get();
        $content        = $this->model::find($id);
        $roles          = Role::all();
        $permissions    = Permission::all();
        $sexes          = Sex::where('status', TRUE)->get();
        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $content,
            'countries'     => $countries,
            'roles'         => $roles,
            'permissions'   => $permissions,
            'sexes'         => $sexes,
        ]);
    }

    public function update(Request $request, $id)
    {

        # Init transaction
        \DB::beginTransaction();

        try {

            $content = User::findOrFail($id);

            # Check Super Admin
            if ($content->hasRole('admin')) {
                if (!Auth::guard('web')->user()->hasRole('admin')) {
                    throw new \Exception("Você não tem permissão para isso.");
                }
            }

            if ($request->hasFile('file')) {

                $size = [400, 400];
                $request->merge([
                    'image' => $this->upload($request,  $attr = 'file', $size)
                ]);
            }


            # Validate FOrm
            $request->validate($this->model::$rules, \Lang::get('validation'));

            # syncRoles
            $roles = $request->input('roles');
            if ($roles) {
                $content->syncRoles($roles);
            }

            # syncPermissions
            $permissions = $request->input('permissions');
            if ($permissions) {
                $content->syncPermissions($permissions);
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

        return redirect(route('backend.' . $this->path . '.index'));
    }

    public function status(Request $request, $id)
    {
        # Init transaction
        \DB::beginTransaction();
        try {


            $content = User::findOrFail($id);

            # Check Super Admin
            if ($content->hasRole('admin')) {
                if (!Auth::guard('web')->user()->hasRole('admin')) {
                    throw new \Exception("Você não tem permissão para isso.");
                }
            }

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


        return redirect(route('backend.' . $this->path . '.index'));
    }

    public function destroy(Request $request, $id)
    {        # Init transaction
        \DB::beginTransaction();
        try {
            $content = User::findOrFail($id);

            # Check Super Admin
            if ($content->hasRole('admin')) {
                if (!Auth::guard('web')->user()->hasRole('admin')) {
                    throw new \Exception("Você não tem permissão para isso.");
                }
            }

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

        return redirect(route('backend.' . $this->path . '.index'));
    }
}
