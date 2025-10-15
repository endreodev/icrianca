<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::where('status', TRUE)->orderBy('id', 'DESC')->paginate(6);

        $about = About::find(1);

        return view('frontend.pages.reports.index', [
            'reports' => $reports,
            'about' => $about,
        ]);
    }

    public function show($id, $slug)
    {
        $report = Report::findOrFail($id);

        return view('frontend.pages.reports.wireframe', [
            'report' => $report,
        ]);
    }
}
