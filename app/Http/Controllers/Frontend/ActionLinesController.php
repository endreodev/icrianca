<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActionLine;
use Illuminate\Http\Request;

class ActionLinesController extends Controller
{
    public function index()
    {

        $action_lines = ActionLine::where('status', TRUE)->orderBy('id', 'ASC')->get();

        return view('frontend.pages.action-lines.index', [
            'action_lines' => $action_lines,
        ]);
    }
}
