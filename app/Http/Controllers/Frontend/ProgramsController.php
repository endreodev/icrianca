<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::where('status', TRUE)->paginate(9);
        return view('frontend.pages.programs.index', [
            'programs' => $programs,
        ]);
    }

    public function show($id, $slug)
    {
        $program = Program::findOrFail($id);

        $others = Program::whereNotIn('id', [$program->getId()])->where('status', TRUE)->get();

        return view('frontend.pages.programs.show', [
            'program' => $program,
            'others' => $others,
        ]);
    }
}
