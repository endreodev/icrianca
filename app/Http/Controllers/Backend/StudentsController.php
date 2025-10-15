<?php



namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;

use App\Models\Classe;

use App\Models\School;

use App\Models\SchoolYear;

use App\Models\Sex;

use Illuminate\Http\Request;



# --

use App\Models\Student as Model;

use App\Models\Unit;

use Classes\DataTable as ClassesDataTable;

use Yajra\DataTables\Datatables;

use View;

use Classes\Upload;

# --

use App\Exports\StudentsExportExcel;

use App\Exports\StudentsExportRecord;

use App\Models\Program;

use App\Notifications\UserNotify;

use Exception;

use Auth;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller

{

    use Upload;

    private $model;

    private $path;

    private $route;





    public function __construct()

    {

        $this->model        = Model::class;

        $this->path         = 'students';

        $this->route        = 'backend.students';



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





    public function query($search = null)

    {

        $model = $this->model::query();



        if (!Auth::guard('web')->user()->hasRole(['admin'])) {

            $classes = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();

            $units = Auth::guard('web')->user()->units()->pluck('id')->toArray();



            $model->whereHas('registrations', function ($query) use ($units, $classes) {



                $query->where(function ($query) use ($units, $classes) {

                    $query->whereIn('student_registrations.unit_id', $units);

                    $query->whereIn('student_registrations.classe_id', $classes);

                });



                $query->orWhere(function ($query) use ($units, $classes) {

                    $query->whereIn('student_registrations.unit_id', $units);

                    $query->where('students.status', 3);

                });

            });

        }



        # Search Name

        if (isset($search['name']) && $search['name'] !== '') {

            $find = urldecode($search['name']);

            $model->where('name', 'LIKE', "%{$find}%");

        }



        # Search Unit

        if (isset($search['unit']) && $search['unit'] !== 'all') {

            $find = $search['unit'];

            // dd($find);

            $model->whereHas('registrations', function ($query) use ($find) {

                $query->where('student_registrations.unit_id', '=', $find);

            });

        }

        # Search Class

        if (isset($search['class']) && $search['class'] !== 'all') {

            $find = $search['class'];

            $model->whereHas('registrations', function ($query) use ($find) {

                $query->where('student_registrations.classe_id', '=', $find);

            });

        }

        # Search Program

        if (isset($search['program']) && $search['program'] !== 'all') {

            $find = $search['program'];

            $model->whereHas('registrations', function ($query) use ($find) {

                $query->where('student_registrations.program_id', '=', $find);

            });

        }



        # Search Sex

        if (isset($search['sex']) && $search['sex'] !== 'all') {

            $find = $search['sex'];

            $model->where('sexe_id', '=', $find);

        }



        // # Search birth_date

        if (isset($search['birth_date']) && $search['birth_date'] !== 'none') {



            if ($search['birth_date'] === 'now_month') {

                $model->whereMonth('birth_date', '=', \Carbon\Carbon::now());

            } else

            if ($search['birth_date'] === 'now') {

                $model->where('birth_date', '=', \Carbon\Carbon::now());

            } else

            if ($search['birth_date'] === 'custom') {



                $day = $search['birth_date_day'];

                $month = $search['birth_date_month'];



                if ($day !== 'all') {

                    $model->whereDay('birth_date', '=', $day);

                }

                if ($month !== 'all') {

                    $model->whereMonth('birth_date', '=', $month);

                }

            }

        }



        # Search Age

        if (isset($search['age'])) {

            $find = $search['age'];

            $year = date('Y', strtotime("- " . $find . " Years", strtotime(date('Y'))));

            $model->where(\DB::raw('YEAR(birth_date)'), $year);

            // $model->where('birth_date', '=', date('Y-m-d', strtotime('-' . $find . ' years')));

        }



        # Search Status

        if (isset($search['status']) && $search['status'] !== 'all') {

            $find = $search['status'];



            switch ($find) {

                case 'active':

                    $find = 1;

                    break;

                case 'inactive':

                    $find = 2;

                    break;

                case 'transfer':

                    $find = 3;

                    break;

                default:

                    $find = 1;

                    break;

            }



            $model->where('status', '=', $find);

        }



        return $model;

    }





    public function DataTable($search = null)

    {

        # Get All Units for transfer

        $units = Unit::where('status', TRUE)->orderBy('name', 'ASC')->get();



        return Datatables::of($this->query($search))

            ->addColumn('action', function ($row) use ($units) {

                return View::make('backend.pages.' . $this->path . '.actions', ['row' => $row, 'path' => $this->path, 'units' => $units])->render();

            })

            ->addColumn('status', function ($row) {

                return '<span class="badge light badge-' . $row->getStatus()->badge . '"><i class="fa fa-circle text-' . $row->getStatus()->badge . ' mr-1"></i>' . $row->getStatus()->text . '</span>';

            })

            ->filterColumn('id', function ($row, $keyword) {

                return $row->where('id', 'LIKE', "%{$keyword}%");

            })

            ->filterColumn('status', function ($query, $keyword) {

                if (strtolower($keyword) === 'ativo') {

                    return $query->where('status', 1);

                } else

                if (strtolower($keyword) === 'inativo') {

                    return $query->where('status', 2);

                } else

                if ((strtolower($keyword) === 'transferencia') or (strtolower($keyword) === 'transferência')) {

                    return $query->where('status', 3);

                }

            })

            ->editColumn('name', function ($row) {

                return ($row->image ? '<img class="rounded-circle" width="45" height="45" style="object-fit: cover !important;" src="' . $row->getImage() . '" alt=""> ' : '') . $row->name;

            })

            ->orderColumn("name", function ($query, $order) {

                return $query->orderBy('students.name', $order);

            })

            ->orderColumn("id", function ($query, $order) {

                return $query->orderBy('students.id', $order);

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

            [

                'data' => 'name',

                'title' => __('tables.name'),

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

            return $this->DataTable($request->all());

        }



        $sexes = Sex::where('status', TRUE)->orderBy('name', 'ASC')->get();



        # Get Units

        if (!Auth::guard('web')->user()->hasRole(['admin'])) $units = Auth::guard('web')->user()->units();

        else $units = Unit::where('status', TRUE)->orderBy('name', 'ASC')->get();



        # Get Classes

        if (!Auth::guard('web')->user()->hasRole(['admin'])) $classes = Auth::guard('web')->user()->classes()->get();

        else $classes = Classe::where('status', TRUE)->orderBy('name', 'ASC')->get();



        $programs = Program::where('status', TRUE)->orderBy('name', 'ASC')->get();



        return view('backend.pages.' . $this->path . '.index', [

            'columns' => $this->DataTableColumn(),

            'units' => $units,

            'sexes' => $sexes,

            'classes' => $classes,

            'programs' => $programs,

        ]);

    }





    public function show(Request $request, $id)

    {

        $content = $this->model::findOrFail($id);



        if (!Auth::guard('web')->user()->hasRole(['admin'])) {

            // $find = Auth::guard('web')->user()->units()->pluck('id')->toArray();

            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();

            $units = Auth::guard('web')->user()->units()->pluck('id')->toArray();





            $check = $content->registrations()->where('status', '=', '1')->whereIn('classe_id', $find);



            $check2 = $content->registrations()->whereIn('unit_id', $units);



            if (!$check->exists() && !$check2->exists()) {

                $request->session()->flash('alert', [

                    'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',

                    'code' => 'danger',

                    'strong' => 'Ops, algo deu errado!',

                    'message' => 'O Aluno não faz parte de seu polo/turma.',

                ]);



                return redirect()->back()->withInput();

            }

        }



        $sexes          = Sex::where('status', TRUE)->get();

        $schools        = School::where('status', TRUE)->get();

        $school_years   = SchoolYear::where('status', TRUE)->get();



        # Get Units

        if (!Auth::guard('web')->user()->hasRole(['admin'])) $units = Auth::guard('web')->user()->units();

        else $units = Unit::where('status', TRUE)->orderBy('name', 'ASC')->get();



        // $units          = Unit::where('status', TRUE)->get();



        try {

            \LogActivity::addToLog('Usuário acessou a sessão: ' . $this->model::NAME);

        } catch (\Exception $e) {

        }



        return view('backend.pages.' . $this->path . '.show', [

            'content'       => $content,

            'sexes'         => $sexes,

            'schools'       => $schools,

            'units'         => $units,

            'school_years'  => $school_years,

        ]);

    }



    public function update(Request $request, $id)

    {

        # Init transaction

        \DB::beginTransaction();



        try {





            $content = $this->model::findOrFail($id);



            if (!Auth::guard('web')->user()->hasRole(['admin'])) {

                $find = Auth::guard('web')->user()->units()->pluck('id')->toArray();

                $check = $content->registrations()->where('status', '=', '1')->whereIn('unit_id', $find);





                if (!$check->exists()) {

                    throw new \Exception('O Aluno não faz parte de seu polo/turma.');

                }

            }



            # Only Educators validations

            if (!Auth::guard('web')->user()->hasRole(['admin'])) {

                if (!$request->input('registrations_unit_id')) {

                    throw new \Exception('Atenção, você nao selecionou um Polo/Programa/Turma deste Aluno, por favor selecione novamente');

                }

            }



            $rules = $content::$rules;



            # Rules Saved

            $rules['document'] = 'required|cpf|unique:students,document,' . $content->getId() . ',id,deleted_at,NULL|max:14|min:11';



            # Validate Form

            $request->validate($rules, \Lang::get('validation'));





            if ($request->input('responsible_document')) {

                $request->merge([

                    'responsible_document' => true,

                ]);

            } else {

                $request->merge([

                    'responsible_document' => false,

                ]);

            }

            if ($request->input('certificate_birth')) {

                $request->merge([

                    'certificate_birth' => true,

                ]);

            } else {

                $request->merge([

                    'certificate_birth' => false,

                ]);

            }

            if ($request->input('certificate_of_schooling')) {

                $request->merge([

                    'certificate_of_schooling' => true,

                ]);

            } else {

                $request->merge([

                    'certificate_of_schooling' => false,

                ]);

            }

            if ($request->input('certificate_medical')) {

                $request->merge([

                    'certificate_medical' => true,

                ]);

            } else {

                $request->merge([

                    'certificate_medical' => false,

                ]);

            }





            # Check is birth date is greater then today

            if (isset($request->birth_date)) {

                $birth_date = \Carbon\Carbon::parse($request->birth_date);

                $today = \Carbon\Carbon::now();



                $todayGreater = $today->gt($birth_date);

                $diffYears = $today->diffInYears($birth_date);



                if (!$todayGreater) {

                    throw new \Exception('Data de nascimento menor que hoje');

                }

                if ($diffYears <= 4) {

                    throw new \Exception('Data de nascimento deve ser maior a 4 Anos');

                }

            }





            # Upload Image

            if ($request->hasFile('file')) {



                $size = [850, 850];

                $request->merge([

                    'image' => $this->upload($request, 'file', $size)

                ]);

            }



            /**

             * Registrations Students

             */

            if ($request->input('registrations_unit_id') && is_array($request->input('registrations_unit_id'))) {



                $ids = [];



                foreach ($request->input('registrations_unit_id') as $key => $registration) {



                    if (isset($request->input('registrations_lasted_id')[$key])) {

                        $regis = $content->registrations()->find(($request->input('registrations_lasted_id')[$key]));



                        if ($regis) {

                            $ids[$key] = $regis->id;

                            $regis->update([

                                'unit_id'     => (isset($request->input('registrations_unit_id')[$key]) ? $request->input('registrations_unit_id')[$key] : null),

                                'program_id'  => (isset($request->input('registrations_program_id')[$key]) ? $request->input('registrations_program_id')[$key] : null),

                                'classe_id'   => (isset($request->input('registrations_classe_id')[$key]) ? $request->input('registrations_classe_id')[$key] : null),

                                'status'      => (isset($request->input('registrations_status')[$key]) ? $request->input('registrations_status')[$key] : true),

                            ]);

                        }

                    } else {

                        $regis = $content->registrations()->create([

                            'unit_id'     => (isset($request->input('registrations_unit_id')[$key]) ? $request->input('registrations_unit_id')[$key] : null),

                            'program_id'  => (isset($request->input('registrations_program_id')[$key]) ? $request->input('registrations_program_id')[$key] : null),

                            'classe_id'   => (isset($request->input('registrations_classe_id')[$key]) ? $request->input('registrations_classe_id')[$key] : null),

                            'status'      => (isset($request->input('registrations_status')[$key]) ? $request->input('registrations_status')[$key] : true),

                        ]);

                        $ids[$key] = $regis->id;

                    }

                }

                $content->registrations()->whereNotIn('id', $ids)->delete();

            } else {

                $content->registrations()->delete();

            }



            /**

             * Measurements Students

             */

            if ($request->input('measurements_date') && is_array($request->input('measurements_date'))) {



                $ids = [];



                foreach ($request->input('measurements_date') as $key => $measurement) {



                    if (isset($request->input('measurements_lasted_id')[$key])) {

                        $meas = $content->measurements()->find(($request->input('measurements_lasted_id')[$key]));

                        if ($meas) {

                            $ids[$key] = $meas->id;

                            $meas->update([

                                'date'      => (isset($request->input('measurements_date')[$key]) ? $request->input('measurements_date')[$key] : null),

                                'weight'    => (isset($request->input('measurements_height')[$key]) ? $request->input('measurements_height')[$key] : null),

                                'height'    => (isset($request->input('measurements_weight')[$key]) ? $request->input('measurements_weight')[$key] : null),

                            ]);

                        }

                    } else {

                        $meas = $content->measurements()->create([

                            'date'      => (isset($request->input('measurements_date')[$key]) ? $request->input('measurements_date')[$key] : null),

                            'weight'    => (isset($request->input('measurements_height')[$key]) ? $request->input('measurements_height')[$key] : null),

                            'height'    => (isset($request->input('measurements_weight')[$key]) ? $request->input('measurements_weight')[$key] : null),

                        ]);

                        $ids[$key] = $meas->id;

                    }

                }

                $content->measurements()->whereNotIn('id', $ids)->delete();

            } else {

                $content->measurements()->delete();

            }





            /**

             * Contacts Students

             */

            if ($request->input('contacts_name') && is_array($request->input('contacts_name'))) {



                $ids = [];



                foreach ($request->input('contacts_name') as $key => $contact) {



                    if (isset($request->input('contacts_lasted_id')[$key])) {

                        $cont = $content->contacts()->find(($request->input('contacts_lasted_id')[$key]));

                        if ($cont) {

                            $ids[$key] = $cont->id;

                            $cont->update([

                                'name'               => (isset($request->input('contacts_name')[$key]) ? $request->input('contacts_name')[$key] : null),

                                'degree_of_kinship'  => (isset($request->input('contacts_degree_of_kinship')[$key]) ? $request->input('contacts_degree_of_kinship')[$key] : null),

                                'phone'              => (isset($request->input('contacts_phone')[$key]) ? $request->input('contacts_phone')[$key] : null),

                            ]);

                        }

                    } else {

                        $cont = $content->contacts()->create([

                            'name'               => (isset($request->input('contacts_name')[$key]) ? $request->input('contacts_name')[$key] : null),

                            'degree_of_kinship'  => (isset($request->input('contacts_degree_of_kinship')[$key]) ? $request->input('contacts_degree_of_kinship')[$key] : null),

                            'phone'              => (isset($request->input('contacts_phone')[$key]) ? $request->input('contacts_phone')[$key] : null),

                        ]);

                        $ids[$key] = $cont->id;

                    }

                }



                $content->contacts()->whereNotIn('id', $ids)->delete();

            } else {

                $content->contacts()->delete();

            }



            /**

             * Schools Students

             */

            if ($request->input('schools_academic_year') && is_array($request->input('schools_academic_year'))) {



                $ids = [];



                foreach ($request->input('schools_academic_year') as $key => $schools) {



                    if (isset($request->input('schools_lasted_id')[$key])) {

                        $sch = $content->schools()->find(($request->input('schools_lasted_id')[$key]));

                        if ($sch) {

                            $ids[$key] = $sch->id;

                            $sch->update([

                                'teaching'              => (isset($request->input('schools_teaching')[$key]) ? $request->input('schools_teaching')[$key] : null),

                                'academic_year'         => (isset($request->input('schools_academic_year')[$key]) ? $request->input('schools_academic_year')[$key] : null),

                                'school_id'             => (isset($request->input('schools_school')[$key]) ? $request->input('schools_school')[$key] : null),

                                'school_year_id'        => (isset($request->input('schools_school_year')[$key]) ? $request->input('schools_school_year')[$key] : null),

                                'classe'                => (isset($request->input('school_classe')[$key]) ? $request->input('school_classe')[$key] : null),

                                'period'                => (isset($request->input('schools_periodo')[$key]) ? $request->input('schools_periodo')[$key] : null),

                            ]);

                        }

                    } else {

                        $sch = $content->schools()->create([

                            'teaching'              => (isset($request->input('schools_teaching')[$key]) ? $request->input('schools_teaching')[$key] : null),

                            'academic_year'         => (isset($request->input('schools_academic_year')[$key]) ? $request->input('schools_academic_year')[$key] : null),

                            'school_id'             => (isset($request->input('schools_school')[$key]) ? $request->input('schools_school')[$key] : null),

                            'school_year_id'        => (isset($request->input('schools_school_year')[$key]) ? $request->input('schools_school_year')[$key] : null),

                            'classe'                => (isset($request->input('school_classe')[$key]) ? $request->input('school_classe')[$key] : null),

                            'period'                => (isset($request->input('schools_periodo')[$key]) ? $request->input('schools_periodo')[$key] : null),

                        ]);

                        $ids[$key] = $sch->id;

                    }

                }



                $content->schools()->whereNotIn('id', $ids)->delete();

            } else {

                $content->schools()->delete();

            }





            /**

             * Annotations Students

             */

            if ($request->input('annotations_date') && is_array($request->input('annotations_date'))) {



                $ids = [];



                foreach ($request->input('annotations_date') as $key => $annotation) {



                    if (isset($request->input('annotations_lasted_id')[$key]) && ($request->input('annotations_lasted_id')[$key] !== '%%lasted_id%%')) {

                        $regis = $content->annotations()->find(($request->input('annotations_lasted_id')[$key]));



                        if ($regis) {

                            $ids[$key] = $regis->id;

                            $regis->update([

                                'date'      => (isset($request->input('annotations_date')[$key]) ? $request->input('annotations_date')[$key] : null),

                                'title'     => (isset($request->input('annotations_title')[$key]) ? $request->input('annotations_title')[$key] : null),

                                'text'      => (isset($request->input('annotations_text')[$key]) ? $request->input('annotations_text')[$key] : null),

                            ]);

                        }

                    } else {

                        $regis = $content->annotations()->create([

                            'date'       => (isset($request->input('annotations_date')[$key]) ? $request->input('annotations_date')[$key] : null),

                            'title'    => (isset($request->input('annotations_title')[$key]) ? $request->input('annotations_title')[$key] : null),

                            'text'          => (isset($request->input('annotations_text')[$key]) ? $request->input('annotations_text')[$key] : null),

                        ]);

                        $ids[$key] = $regis->id;

                    }

                }

                $content->annotations()->whereNotIn('id', $ids)->delete();

            } else {

                $content->annotations()->delete();

            }





            // $content->schools()



            # Update

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



          	echo $e->getMessage();

            return redirect()->back()->withInput();

        }



        if ($request->input('goBack')) {

            return redirect(route('backend.' . $this->path . '.show', $content->getId()));

        }



        $return_back = (request()->return ? \Illuminate\Support\Facades\Crypt::decrypt(request()->return) : '');



        return redirect(route('backend.' . $this->path . '.index') .  $return_back);

    }



    public function create()

    {





        $sexes          = Sex::where('status', TRUE)->get();

        $schools        = School::where('status', TRUE)->get();

        $school_years   = SchoolYear::where('status', TRUE)->get();



        # Get Units

        if (!Auth::guard('web')->user()->hasRole(['admin'])) $units = Auth::guard('web')->user()->units();

        else $units = Unit::where('status', TRUE)->orderBy('name', 'ASC')->get();

        // $units          = Unit::where('status', TRUE)->get();





        return view('backend.pages.' . $this->path . '.show', [

            'content'       => $this->model::create([]),

            'sexes'         => $sexes,

            'schools'       => $schools,

            'school_years'  => $school_years,

            'units'         => $units,

        ]);

    }



    public function store(Request $request)

    {

        # Init transaction

        \DB::beginTransaction();



        try {



            # Validate FOrm

            $request->validate($this->model::$rules, \Lang::get('validation'));



            # Only Educators validations

            if (!Auth::guard('web')->user()->hasRole(['admin'])) {

                if (!$request->input('registrations_unit_id')) {

                    throw new \Exception('Atenção, você nao selecionou um Polo/Programa/Turma deste Aluno, por favor selecione novamente');

                }

            }





            if ($request->input('responsible_document')) {

                $request->merge([

                    'responsible_document' => true,

                ]);

            }

            if ($request->input('certificate_birth')) {

                $request->merge([

                    'certificate_birth' => true,

                ]);

            }

            if ($request->input('certificate_of_schooling')) {

                $request->merge([

                    'certificate_of_schooling' => true,

                ]);

            }

            if ($request->input('certificate_medical')) {

                $request->merge([

                    'certificate_medical' => true,

                ]);

            } else {

                $request->merge([

                    'certificate_medical' => false,

                ]);

            }



            # Upload Image

            if ($request->hasFile('file')) {



                $size = [850, 850];

                $request->merge([

                    'image' => $this->upload($request, 'file', $size)

                ]);

            }



            # Check is birth date is greater then today

            if (isset($request->birth_date)) {

                $birth_date = \Carbon\Carbon::parse($request->birth_date);

                $today = \Carbon\Carbon::now();



                $todayGreater = $today->gt($birth_date);

                $diffYears = $today->diffInYears($birth_date);



                if (!$todayGreater) {

                    throw new \Exception('Data de nascimento menor que hoje');

                }

                if ($diffYears <= 4) {

                    throw new \Exception('Data de nascimento deve ser maior a 4 Anos');

                }

            }





            # Create Content

            $content = $this->model::create($request->all());



            /**

             * Registrations Students

             */

            if ($request->input('registrations_unit_id') && is_array($request->input('registrations_unit_id'))) {



                foreach ($request->input('registrations_unit_id') as $key => $registration) {



                    $regis = $content->registrations()->create([

                        'unit_id'     => (isset($request->input('registrations_unit_id')[$key]) ? $request->input('registrations_unit_id')[$key] : null),

                        'program_id'  => (isset($request->input('registrations_program_id')[$key]) ? $request->input('registrations_program_id')[$key] : null),

                        'classe_id'   => (isset($request->input('registrations_classe_id')[$key]) ? $request->input('registrations_classe_id')[$key] : null),

                        'status'      => (isset($request->input('registrations_status')[$key]) ? $request->input('registrations_status')[$key] : true),

                    ]);

                }

            }



            /**

             * Measurements Students

             */

            if ($request->input('measurements_date') && is_array($request->input('measurements_date'))) {



                foreach ($request->input('measurements_date') as $key => $measurement) {



                    $meas = $content->measurements()->create([

                        'date'      => (isset($request->input('measurements_date')[$key]) ? $request->input('measurements_date')[$key] : null),

                        'weight'    => (isset($request->input('measurements_height')[$key]) ? $request->input('measurements_height')[$key] : null),

                        'height'    => (isset($request->input('measurements_weight')[$key]) ? $request->input('measurements_weight')[$key] : null),

                    ]);

                }

            }





            /**

             * Contacts Students

             */

            if ($request->input('contacts_name') && is_array($request->input('contacts_name'))) {



                foreach ($request->input('contacts_name') as $key => $contact) {



                    $cont = $content->contacts()->create([

                        'name'               => (isset($request->input('contacts_name')[$key]) ? $request->input('contacts_name')[$key] : null),

                        'degree_of_kinship'  => (isset($request->input('contacts_degree_of_kinship')[$key]) ? $request->input('contacts_degree_of_kinship')[$key] : null),

                        'phone'              => (isset($request->input('contacts_phone')[$key]) ? $request->input('contacts_phone')[$key] : null),

                    ]);

                }

            }



            /**

             * Schools Students

             */

            if ($request->input('schools_academic_year') && is_array($request->input('schools_academic_year'))) {



                foreach ($request->input('schools_academic_year') as $key => $schools) {



                    $sch = $content->schools()->create([

                        'teaching'              => (isset($request->input('schools_teaching')[$key]) ? $request->input('schools_teaching')[$key] : null),

                        'academic_year'         => (isset($request->input('schools_academic_year')[$key]) ? $request->input('schools_academic_year')[$key] : null),

                        'school_id'             => (isset($request->input('schools_school')[$key]) ? $request->input('schools_school')[$key] : null),

                        'school_year_id'        => (isset($request->input('schools_school_year')[$key]) ? $request->input('schools_school_year')[$key] : null),

                        'classe'                => (isset($request->input('school_classe')[$key]) ? $request->input('school_classe')[$key] : null),

                        'period'                => (isset($request->input('schools_periodo')[$key]) ? $request->input('schools_periodo')[$key] : null),

                    ]);

                }

            }





            /**

             * Annotations Students

             */

            if ($request->input('annotations_date') && is_array($request->input('annotations_date'))) {



                $ids = [];



                foreach ($request->input('annotations_date') as $key => $annotation) {



                    $regis = $content->annotations()->create([

                        'date'       => (isset($request->input('annotations_date')[$key]) ? $request->input('annotations_date')[$key] : null),

                        'title'    => (isset($request->input('annotations_title')[$key]) ? $request->input('annotations_title')[$key] : null),

                        'text'          => (isset($request->input('annotations_text')[$key]) ? $request->input('annotations_text')[$key] : null),

                    ]);

                    $ids[$key] = $regis->id;

                }

                $content->annotations()->whereNotIn('id', $ids)->delete();

            } else {

                $content->annotations()->delete();

            }



            $request->session()->flash('alert', [

                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',

                'code' => 'success',

                'strong' => 'Legal!',

                'message'  => 'Operação realizada com sucesso!'

            ]);



            \DB::commit();



            try {

                \LogActivity::addToLog('Usuário alterou na sessão: ' . $this->model::NAME);

            } catch (\Exception $e) {

            }

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







        if ($request->input('goBack')) {

            return redirect(route('backend.' . $this->path . '.show', $content->getId()));

        }



        return redirect(route('backend.' . $this->path . '.index'));

    }





    public function status(Request $request, $id)

    {

        # Init transaction

        \DB::beginTransaction();

        try {





            $content = $this->model::findOrFail($id);

            $content->status = ($content->status === 1) ? 2 : 1;

            $content->save();



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



            try {

                \LogActivity::addToLog('Usuário deletou na sessão: ' . $this->model::NAME);

            } catch (\Exception $e) {

            }



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



    public function export(Request $request, $type)
    {
        try {
            # Get Query
            $result = $this->query($request->all());
            $total = $result->count();

            # Carbon

            $now = \Carbon\Carbon::now(new \DateTimeZone('America/Cuiaba'));

            $start = \Carbon\Carbon::createFromTimeString('17:00')->subDay(1);

            $end = \Carbon\Carbon::createFromTimeString('08:00')->addDay(1);

            if ($now->between($start, $end)) {
                $delay = $now->addMinute(1);
            } else {
                $hoursDiff = $now->diffInHours(\Carbon\Carbon::createFromTimeString('17:00')->addDay(1));
                $delay = \Carbon\Carbon::now(new \DateTimeZone('America/Cuiaba'))->createFromTimeString("17:" . $now->addSecond(30)->format('i:s'))->addMinutes($hoursDiff)->addSecond(25);
            }

            $part = 1;

            $result->chunk((($type === 'excel') ? 250 : 50), function ($rows) use ($type, $request, $total, $delay, &$part) {

                $count = count($rows);

                if ($type === 'excel') {

                    # New Name File

                    $fileName = 'Alunos_' . \Carbon\Carbon::now()->format('d-m-Y-H-i-s') . '-' . $count;



                    $content = [

                        'subject'  => 'Dados exportado com sucesso!  (Part.' . $part . ')',
                      	'message'  => 'Olá, seus dados estão prontos, clique no <a href="' . route('frontend.download.file', [$fileName . '.xlsx', 'public-exports-excel']) . '">aqui</a> para download.',
                        'message1' => 'Olá, seus dados estão prontos, clique no <a href="' . route('frontend.download.file', [$fileName . '.xlsx', 'public-exports-excel']) . '">aqui</a> para download.',

                    ];

                    

                    echo $content['message1'];
                   
                    (new StudentsExportExcel($rows))->queue('public/exports/excel/' . $fileName . '.xlsx')->delay(($total > 100 ? $delay : now()->addMinute(1)))->chain([

                        new UserNotify($content, Auth::guard('web')->user()),

                    ]);
                  
                  	exit;

                  

                }



                if ($type === 'record') {



                    $zipName = 'Fichas_Alunos_' . \Carbon\Carbon::now()->format('d-m-Y-H-i-s') . '-' . $count;

                    $footer = ($request->input('footer')) ? $request->input('footer') : null;



                    $content = [

                        'subject' => 'Fichas gerada com sucesso! (Part.' . $part . ')',

                        'message' => 'Olá, seus dados estão prontos, clique no <a href="' . route('frontend.download.file', [$zipName . '.zip', 'public-exports-zip']) . '">aqui</a> para download.',

                    ];



                    dispatch(new StudentsExportRecord($rows, $footer, $zipName))->delay(($total > 100 ? $delay : now()->addMinute(1)))->chain([

                        new UserNotify($content, Auth::guard('web')->user()),

                    ]);

                }

                $part++;

            });



            $request->session()->flash('alert', [

                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',

                'code' => 'success',

                'strong' => 'Legal!',

                'message'  => 'Operação realizada com sucesso! Será enviado um e-mail para ' . Auth::guard('web')->user()->email . ', com o link para download do arquivo. ' . (($total > 100) ? '<br><br> Atenção: A geração de arquivos grande é em horario fixo, das 18h (dia atual) até as 08h (dia seguinte) para ser enviado o E-mail, então aguarde. <br> <span class="badge badge-sm badge-warning mt-2 mb-2">Previsão: ' . $delay->format('d/m/Y \a\s H:i') . '</span>' : '') . '<br><br> Total de Arquivos a serem enviados: <b>' . (ceil($total / ($type === 'excel' ? 250 : 50))) . '</b>'

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



    public function record(Request $request, $id)

    {

        $content = $this->model::find($id);



        if (empty($content)) {

            abort(404);

        }



        $document = (object) [];

        if ($request->input('footer')) {

            $document->footer = $request->input('footer');

        }





        // return view('backend.pages.' . $this->path . '.export.pdf', [

        //     'content' => $content,

        //     'document' => $document,

        // ]);



        $pdf = \PDF::loadView('backend.pages.' . $this->path . '.export.pdf', [

            'content' => $content,

            'document' => $document,

        ]);





        return $pdf->download('Ficha - ' . $content->name . '.pdf');

    }



    public function transfer(Request $request, $id)

    {

        # Init transaction

        \DB::beginTransaction();



        try {



            $content = $this->model::findOrFail($id);



            $content->status = 3;





            foreach ($content->registrations()->get() as $key => $registration) {

                $registration->status = 0;

                $registration->save();

            }



            $content->registrations()->create([

                'unit_id' => $request->input('unit_id'),

                'status' => 1,

            ]);



            $content->save();



            $request->session()->flash('alert', [

                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',

                'code' => 'success',

                'strong' => 'Legal!',

                'message'  => 'Operação realizada com sucesso!'

            ]);



            try {

                \LogActivity::addToLog('Usuário transferiu na sessão: ' . $this->model::NAME);

            } catch (\Exception $e) {

            }



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

