<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Team;
use App\Models\Unit;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function index()
    {
        $about = About::find(1);

        $count = (object) [];
        $count->students = Student::count();
        $count->classes = Classe::where('status', TRUE)->count();
        $count->units = Unit::where('status', TRUE)->where('is_visible', TRUE)->count();

        $teams = Team::where('status', TRUE)->get();


        return view('frontend.pages.abouts.index', [
            'about' => $about,
            'count' => $count,
            'teams' => $teams,
        ]);
    }
}
