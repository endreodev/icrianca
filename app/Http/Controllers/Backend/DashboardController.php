<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Program;
use App\Models\Student;
use App\Models\Unit;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {

        # Count Programs
        $programs = Program::where('status', 1)->count();

        if (!Auth::guard('web')->user()->hasRole(['admin'])) {

            # Get Units
            $units = Auth::guard('web')->user()->units();

            # Get Students
            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();
            $students = Student::where('status', 1)->whereHas('registrations', function ($query) use ($find) {
                $query->whereIn('student_registrations.classe_id',  $find)
                    ->where('student_registrations.status', '=', '1');
            });

            # Get Classes
            $classes = Auth::guard('web')->user()->classes()->where('status', 1)->count();
            $students_lasted = $students->take(15)->get();
            $students = $students->count();
            $units = $units->count();
        } else {

            $students = Student::where('status', 1)->count();
            $classes = Classe::where('status', 1)->count();
            $units = Unit::where('status', 1)->count();
            $students_lasted = Student::where('status', 1)->orderBy('id', 'DESC')->take(15)->get();
        }

        return view('backend.pages.dashboard.index', [
            'students' => $students,
            'classes' => $classes,
            'units' => $units,
            'programs' => $programs,
            'students_lasted' => $students_lasted,
        ]);
    }

    public function metrics($type)
    {
        // setlocale(LC_TIME, 'ptb');


        if (!Auth::guard('web')->user()->hasRole(['admin'])) {
            # Get Students
            $students = Student::query();

            $find = Auth::guard('web')->user()->classes()->pluck('classe_educator.classe_id')->toArray();
            $students = $students->whereHas('registrations', function ($query) use ($find) {
                $query->whereIn('student_registrations.classe_id',  $find)
                    ->where('student_registrations.status', '=', '1');
            });
        }

        if ($type === 'students') {
            $period = now()->subMonths(8)->monthsUntil(now());
            $counts_students = [];
            foreach ($period as $key => $date) {
                $counts_students[$key]['x'] = mb_convert_encoding($date->translatedFormat('M'), 'UTF-8', 'UTF-8') . "/" . $date->year;
                $students = Student::query();
                $counts_students[$key]['y'] = $students->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->count();
            }

            return response()->json($counts_students)->setStatusCode(200);
        }

        if ($type === 'sex') {

            $students = Student::query();

            $male = clone $students;
            $male = $male->where('sexe_id', 1)->count();

            #
            $female = clone $students;
            $female = $female->where('sexe_id', 2)->count();

            return response()->json([
                $male, $female,
            ])->setStatusCode(200);
        }
        if ($type === 'age') {

            $students = Student::query();

            # Min Max age Metrics
            $max = 16;
            $min = 8;

            $count_age = [];
            foreach (range($min, $max) as $key => $age) {

                $find = $age;
                $year = date('Y', strtotime("- " . $find . " Years", strtotime(date('Y'))));
                $count_students_age = clone $students;
                $count_age[$key]['y'] = $count_students_age->where(\DB::raw('YEAR(birth_date)'), $year)->where('status', 1)->count();
                $count_age[$key]['x'] = $age;
            }

            return response()->json($count_age)->setStatusCode(200);
        }
    }
}
