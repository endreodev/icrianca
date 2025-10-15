<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;
# --  
use App\Models\StudentAnnotation as Model;
use App\Models\Unit;
use Classes\DataTable as ClassesDataTable;
use Yajra\DataTables\Datatables;
use View;
# -- 
use Auth;

class AnnotationsController extends Controller
{
    private $model;
    private $path;
    private $route;

    public function __construct()
    {
        $this->model        = Model::class;
        $this->path         = 'annotations';
        $this->route        = 'backend.annotations';

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


    public function DataTable()
    {

        $model = $this->model::query()->whereType(1);

        if (!Auth::guard('web')->user()->hasRole(['admin'])) {
            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();

            $model->whereHas('student', function ($annotation) use ($find) {

                $annotation->whereNull('student.deleted_at');

                $annotation->whereHas('registrations', function ($student) use ($find) {
                    $student->whereIn('student_registrations.classe_id',  $find)
                        ->where('student_registrations.status', '=', '1');
                });
            });
        } else {
            $model->whereHas('student', function ($queyr) {
                $queyr->whereNull('students.deleted_at');
            });
        }

        return Datatables::of($model->orderBy('id', 'DESC'))
            // ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return View::make('backend.pages.' . $this->path . '.actions', ['row' => $row, 'path' => $this->path, 'route' => $this->route])->render();
            })
            ->editColumn('student', function ($row) {
                return $row->student->name;
            })
            ->editColumn('date', function ($row) {
                return $row->date->format('d/m/Y');
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
            ->filterColumn('id', function ($row, $keyword) {
                return $row->where('id', 'LIKE', "%{$keyword}%");
            })
            ->filterColumn('student', function ($row, $keyword) {
                return $row->whereHas('student', function ($query) use ($keyword) {
                    $query->where('students.name', 'LIKE', "%{$keyword}%");
                });
            })
            ->rawColumns(['action'])
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
                'data' => 'title',
                'title' => __('tables.title'),
            ],
            [
                'data' => 'date',
                'title' => __('texts.date'),
            ],
            [
                'data' => 'student',
                'title' => __('texts.student'),
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

        if (!Auth::guard('web')->user()->hasRole(['admin'])) {
            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();

            $students = Student::whereHas('registrations', function ($query) use ($find) {
                $query->whereIn('student_registrations.classe_id',  $find)
                    ->where('student_registrations.status', '=', '1');
            })->where('status', 1)->get();
            $units = Auth::guard('web')->user()->units();
            $classes = Auth::guard('web')->user()->classes()->get();
        } else {
            $students   = Student::where('status', 1)->get();
            $units      = Unit::where('status', 1)->get();
            $classes    = Classe::where('status', 1)->get();
        }


        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $this->model::create([]),
            'students'      => $students,
            'units'      => $units,
            'classes'      => $classes,
        ]);
    }

    public function store(Request $request)
    {

        # Init transaction
        \DB::beginTransaction();

        try {

            if (!$request->input('type')) {
                throw new \Exception('Por favor, selecione um tipo pelo menos');
            }

            # Validate FOrm
            $request->validate($this->model::$rules, \Lang::get('validation'));

            $annotation = [];
            $annotation['date'] = $request->input('date');
            $annotation['title'] = $request->input('title');
            $annotation['text'] = $request->input('text');
            $annotation['type'] = 1;


            if ($request->input('type') === 'student') {

                foreach ($request->input('student') as $key => $value) {
                    $student = Student::find($value);
                    $student->annotations()->create($annotation);
                }
            } else
            if ($request->input('type') === 'units') {
                foreach ($request->input('units') as $key => $value) {
                    $units = Unit::find($value);

                    foreach ($units->students()->get() as $key => $item) {
                        $item->annotations()->create($annotation);
                    }
                }
            } else
            if ($request->input('type') === 'classes') {
                foreach ($request->input('classes') as $key => $value) {
                    $classes = Classe::find($value);

                    foreach ($classes->students()->get() as $key => $item) {
                        $item->annotations()->create($annotation);
                    }
                }
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
        return redirect(route($this->route . '.index'));
    }

    public function show(Request $request, $id)
    {

        $content        = $this->model::find($id);
        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $content,
        ]);
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
}
