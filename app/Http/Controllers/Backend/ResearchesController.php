<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ResearchesExportExcel;
use App\Exports\StudentsExportRecordAll;
use App\Exports\StudentsExportRecordAllExcel;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\InstitutionalResearch;
use Illuminate\Http\Request;

# --  
use App\Models\Research as Model;
use App\Models\Program;
use App\Models\Research;
use App\Models\Sex;
use App\Models\Student;
use App\Models\Unit;
use App\Models\User;
use App\Notifications\UserNotify;
use Classes\DataTable as ClassesDataTable;
use Yajra\DataTables\Datatables;
use View;
# -- 
use Illuminate\Support\Str;

use Auth;

class ResearchesController extends Controller
{
    private $model;
    private $students;
    private $path;
    private $route;


    public function __construct()
    {
        $this->model        = Model::class;
        $this->students     = Student::class;
        $this->path         = 'researches';
        $this->route        = 'backend.researches';

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
        $model = $this->students::query();


        if (!Auth::guard('web')->user()->hasRole(['admin'])) {
            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();
            $model->whereHas('registrations', function ($query) use ($find) {
                $query->whereIn('student_registrations.classe_id',  $find)
                    ->where('student_registrations.status', '=', '1');
            });
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

        $model = $this->model;

        return Datatables::of($this->query($search))
            ->addColumn('action', function ($row) {
                return View::make('backend.pages.' . $this->path . '.actions', ['row' => $row, 'path' => $this->path])->render();
            })
            ->addColumn('status', function ($row) {
                return '<span class="badge light badge-' . $row->getStatus()->badge . '"><i class="fa fa-circle text-' . $row->getStatus()->badge . ' mr-1"></i>' . $row->getStatus()->text . '</span>';
            })
            ->addColumn('current_research_institutional', function ($row) use ($model) {

                $searcs_intitutional_current = '';

                $content = $model::firstOrCreate([
                    'student_id' => $row->id,
                    'year' => (string) date("Y"),
                ]);
                $year = false;
                foreach ($content->instutional()->whereNotNull('interest_in_studying')->orderBy('id', 'DESC')->get() as $key => $value) {
                    $year = true;
                    $searcs_intitutional_current .= '<span class="badge light badge-primary mr-1"><i class="fa fa-circle text-primary mr-1"></i>' . ($key + 1) . 'ª Pesq. Inst.</span>';
                }

                return $searcs_intitutional_current . ($year ? ' / ' . (string) date("Y") : '');
            })
            ->filterColumn('id', function ($row, $keyword) {
                return $row->where('id', 'LIKE', "%{$keyword}%");
            })
            ->orderColumn("name", function ($query, $order) {
                return $query->orderBy('students.name', $order);
            })
            ->orderColumn("id", function ($query, $order) {
                return $query->orderBy('students.id', $order);
            })
            ->rawColumns(['status', 'action', 'current_research_institutional'])
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
                'title' => __('tables.student'),
            ],
            [
                'data' => 'status',
                'title' => __('tables.status'),
            ],
            [
                'data' => 'current_research_institutional',
                'title' => __('texts.current_research_institutional'),
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

        $content    = $this->model::firstOrCreate([
            'student_id' => $id,
            'year' => ($request->input('year') ? $request->input('year') : (string) date("Y")),
        ]);

        if ($content->instutional()->count() === 0) {
            # Create Institutional Researches default;
            foreach (range(1, 3) as $key => $value) {
                $instutional = new InstitutionalResearch();
                $instutional->research_id = $content->getId();
                $instutional->save();
            }
        }


        $programs   = Program::where('status', TRUE)->get();
        $units      = Unit::where('status', TRUE)->get();
        $educators   = User::role('educator')->get();



        return view('backend.pages.' . $this->path . '.show', [
            'content'       => $content,
            'programs'      => $programs,
            'units'         => $units,
            'educators'      => $educators,
        ]);
    }

    public function update(Request $request, $id)
    {

        # Init transaction
        \DB::beginTransaction();

        try {

            $content = $this->model::findOrFail($id);

            # Validate FOrm
            $request->validate($this->model::$rules, \Lang::get('validation'));

            # Update
            $content->update($request->all());

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

        return redirect(route('backend.' . $this->path . '.index'));
    }

    public function institutional(Request $request, $id)
    {

        # Init transaction
        \DB::beginTransaction();

        try {

            $content = InstitutionalResearch::find($id);


            if (!$request->input('interest_in_studying')) {
                $content->interest_in_studying = null;
            }

            if (!$request->input('behavior')) {
                $content->behavior = null;
            }

            if (!$request->input('responsibility')) {
                $content->responsibility = null;
            }

            if (!$request->input('respect')) {
                $content->respect = null;
            }

            if (!$request->input('self_esteem')) {
                $content->self_esteem = null;
            }

            if (!$request->input('habits')) {
                $content->habits = null;
            }

            if (!$request->input('care')) {
                $content->care = null;
            }

            if (!$request->input('date')) {
                $content->date = null;
            }

            if (!$request->input('filled_by')) {
                $content->filled_by = null;
            }

            if (!$request->input('filled_by_other')) {
                $content->filled_by_other = null;
            }

            # Save Content
            $content->save();

            $content->update($request->all());


            # Commit
            \DB::commit();


            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            return redirect(route('backend.' . $this->path . '.show', $content->research->students->getId()) . "?instutional=" . $content->getId() . "&#accordion-one-" . $content->getId());
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
    }

    public function print(Request $request, $id)
    {
        $content = $this->model::where('student_id', $id);

        if ($request->input('year')) {
            $content->where('year', '=', (string) $request->input('year'));
        }

        if (empty($content)) {
            abort(404);
        }


        // return view('backend.pages.' . $this->path . '.export.print', [
        //     'content' => $content->first(),
        // ]);

        $pdf = \PDF::loadView('backend.pages.' . $this->path . '.export.print', [
            'content' => $content->first(),
        ]);


        return $pdf->download('Pesquisa - ' . $content->first()->students->name . '.pdf');
    }

    public function export(Request $request)
    {
        try {
            # Get Query
            $result = $this->query();

            // dd($request->all());

            # Get Units
            $req = (object) [];
            $req->units     = $request->input('units');
            $req->programs  = $request->input('programs');
            $req->classes   = $request->input('classes');
            $req->years     = $request->input('years');

            # Student
            $researches     = [];
            $classes        = [];
            $students       = [];

            # Total
            $total = 0;

            # Loop
            foreach ($req->units as $unit_key => $value) {

                # Unit
                $unit = Unit::find($value);

                # Model Classe
                $ModelClasses = Classe::where('unit_id', $value);

                # Where Program
                if ($req->programs[0] !== "all") {
                    $ModelClasses->whereIn('program_id', $req->programs);
                }

                # Where Classes
                if ($req->programs[0] !== "all") {
                    $ModelClasses->whereIn('id', $req->classes);
                }

                # Result Classes
                $classes = $ModelClasses->get();



                foreach ($classes as $item => $classe) {

                    foreach ($req->years as $key => $year) {

                        $years[$year]["year"] = $year;
                        foreach ($classe->students()->get() as $st => $student) {

                            $research = Research::where('student_id', $student->getId())->whereHas('students', function ($query) {
                                $query->where('students.status', 1);
                            })->where('year', $year)->first();
                            if ($research) {
                                $instutional = $research->instutional()->get();
                            } else {
                                $instutional = [];
                            }
                            $total++;

                            $years[$year]["items"][$st] = [
                                "research"      => $research,
                                "student"       => $student,
                                "instutional"   => $instutional,
                            ];
                        }
                    }

                    $students[$unit_key][$item] = collect([
                        "classe" => $classe->name,
                        "program" => $classe->program->name,
                        "unit" => $unit->name,
                        "years" => $years,
                    ]);
                }
            }

            $collections = collect($students);


            foreach ($collections as $key => $collect) {

                foreach ($collect as $item) {

                    $years = collect($item["years"]);

                    foreach ($years as $y => $year) {

                        $research = collect($year["items"]);

                        $part = 1;

                        # Chunk
                        foreach ($research->chunk(90) as $key => $rows) {

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

                            $fileName = 'Relatorio_Pesquisas_' . \Carbon\Carbon::now()->format('H-i-s') . "_" . Str::slug($item["classe"], '-') . ($part > 1 ? "_Part-" . $part : '');

                            # Email Content
                            $content = [
                                'subject' => 'Dados exportado com sucesso! ' . $item["classe"] . ' ' . ($part > 1 ? '| (Part.' . $part . ')' : ''),
                                'message' => 'Olá, seus dados estão prontos, clique no <a href="' . route('frontend.download.file', [$fileName . '.xlsx', 'public-exports-excel']) . '">aqui</a> para download.',
                            ];

                            $items = collect([
                                "rows"      => $rows,
                                "classe"    => $item["classe"],
                                "program"   => $item["program"],
                                "unit"      => $item["unit"],
                                "year"      => $year["year"],
                            ]);

                            #
                            (new ResearchesExportExcel($items))->queue('public/exports/excel/' . $fileName . '.xlsx')->delay($delay)->chain([
                                new UserNotify($content, Auth::guard('web')->user()),
                            ]);

                            # 
                            $part++;
                        }
                    }
                }
            }



            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Operação realizada com sucesso! Será enviado um e-mail para ' . Auth::guard('web')->user()->email . ', com o link para download do arquivo. ' . (($total > 100) ? '<br><br> Atenção: A geração de arquivos grande é em horario fixo, das 18h (dia atual) até as 08h (dia seguinte) para ser enviado o E-mail, então aguarde. <br> <span class="badge badge-sm badge-warning mt-2 mb-2">Previsão: ' . $delay->format('d/m/Y \a\s H:i') . '</span>' : '') . '<br><br> Total de Arquivos a serem enviados: <b>' . (ceil($total / 90)) . '</b>'
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

    public function api(Request $request, $type)
    {
        if ($type === 'classes') {

            $units = $request->input('units');
            $units = explode(",", $units);

            $programs = $request->input('programs');
            $programs = explode(",", $programs);


            # Get Classes
            if (!Auth::guard('web')->user()->hasRole(['admin'])) $classes = Auth::guard('web')->user()->classes();
            else $classes = Classe::where('status', TRUE)->orderBy('name', 'ASC');

            if ($units) {
                $classes->whereIn('unit_id', $units);
            }

            if ($programs && $request->input('programs') !== 'all') {
                $classes->whereIn('program_id', $programs);
            }

            $_classes = [];
            foreach ($classes->get() as $key => $classe) {
                $_classes[$key]['text'] = $classe->name;
                $_classes[$key]['id'] = $classe->getId();
            }

            return response()->json($_classes);
        }
    }
}
