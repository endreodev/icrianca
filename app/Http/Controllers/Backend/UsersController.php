<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Office;
use App\Models\Permission as ModelsPermission;
use App\Models\Sex;
use App\Models\User;

use Classes\DataTable as ClassesDataTable;
use Yajra\DataTables\Datatables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Classes\Upload;

class UsersController extends Controller
{
    use Upload;

    private $model;
    private $path;

    public function __construct()
    {
        $this->model        = User::class;
        $this->path         = 'users';

        $this->middleware('permission:' . $this->model::PREFIX . '.index',   ['only' => ['index']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.show',   ['only' => ['show']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.update', ['only' => ['update']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.status', ['only' => ['status']]);
        $this->middleware('permission:' . $this->model::PREFIX . '.delete', ['only' => ['destroy']]);
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
        $offices        = Office::where('status', TRUE)->get();

        return view('backend.pages.' . $this->path . '.show', [
            'countries'     => $countries,
            'content'       => $this->model::create([]),
            'roles'         => $roles,
            'permissions'   => $permissions,
            'sexes'         => $sexes,
            'offices'       => $offices,
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

            # Rules
            $rules = $this->model::$rules;

            unset($rules['password']);

            # Validate Form
            $request->validate($rules, \Lang::get('validation'));

            if ($request->hasFile('file')) {

                $size = [400, 400];
                $request->merge([
                    'image' => $this->upload($request,  $attr = 'file', $size)
                ]);
            }


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

            if ($request->input('marital_status') === 'other') {
                $request->merge([
                    'marital_status' => $request->input('other_marital_status'),
                ]);
            }


            $content = $this->model::create($request->all());


            # Create Link for Email
            if ($request->input('send_link_via_email') === 'on') {
                $content->status = 3;
                $content->save();
                self::sendLinkToUser($content);
            } else {
                $content->status = true;
            }


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

            $content->save();

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
        $offices        = Office::where('status', TRUE)->get();

        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $content,
            'countries'     => $countries,
            'roles'         => $roles,
            'permissions'   => $permissions,
            'sexes'         => $sexes,
            'offices'       => $offices,
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

            $rules = $this->model::$rules;

            # Rules Saved
            $rules['email']     = 'required|string|email|unique:users,email,' . $content->getId() . ',id,deleted_at,NULL|max:255';
            $rules['document']  = 'required|unique:users,document,' . $content->getId() . ',id,deleted_at,NULL|max:14';


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

            # set Null declared_color
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

            # set Null marital_status
            if (!$request->input('marital_status')) {
                $request->merge([
                    'marital_status' => null,
                ]);
            }


            # Validate FOrm
            $request->validate($rules, \Lang::get('validation'));

            # syncRoles
            $roles = $request->input('roles');
            if ($roles) {
                $is_diff_role = !$content->hasRole($roles);
                $content->syncRoles($roles);
            }


            # syncPermissions
            $permissions = $request->input('permissions');
            if ($permissions && !$is_diff_role) {
                $content->syncPermissions($permissions);
            } else {
                $permissions = Role::where('name', $roles[0])->first();
                $permissions = $permissions->permissions;
                $content->syncPermissions($permissions);
            }

            $content->update($request->all());

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            try {
                \LogActivity::addToLog('Usuário alterou na sessão: ' . $this->model::NAME);
            } catch (\Exception $e) {
            }

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

            $content->status = ($content->status === 1) ? 2 : 1;
            $content->save();

            try {
                \LogActivity::addToLog('Usuário alterou status na sessão: ' . $this->model::NAME);
            } catch (\Exception $e) {
            }

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

    public static function sendLinkToUser(User $user)
    {
        try {
            $token = Crypt::encryptString($user->getId() . ':|:' . $user->name . ':|:' . $user->email . ':|:' . time());
            $link = route('backend.login.token', $token);

            $data =
                [
                    'subject'       => 'Cadastro de Usuário',
                    'content' => [
                        'user' => [
                            'name'  => $user->name,
                        ],
                        'message' => 'Acesse este <a href="' . $link . '">LINK</a> para terminar o cadastro de sua conta ',
                    ],
                ];
            $sender = (object) [
                'name' => env('APP_NAME'),
                'email' => $user->email,
            ];
            app('App\Services\SendGridService')->send($data, $sender, 'blank');

            Log::warning([
                'link-to-user' => $link,
            ]);

            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            return false;
        }
    }

    public function sendLink(Request $request, $id)
    {
        try {
            $content = User::findOrFail($id);
            self::sendLinkToUser($content);

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->withInput();
        }

        return redirect(route('backend.' . $this->path . '.index'));
    }

    public function record(Request $request, $id)
    {
        try {
            $content = User::findOrFail($id);


            // return view('backend.pages.' . $this->path . '.export.pdf', [
            //     'content' => $content,
            // ]);

            $pdf = \PDF::loadView('backend.pages.' . $this->path . '.export.pdf', [
                'content' => $content,
            ]);
            return $pdf->download('Ficha - ' . $content->name . '.pdf');

            // 

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->withInput();
        }

        return redirect(route('backend.' . $this->path . '.index'));
    }
}
