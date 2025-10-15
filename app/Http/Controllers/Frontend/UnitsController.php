<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::where('is_visible', TRUE)->where('status', TRUE)->orderBy('id', 'DESC')->paginate(9);

        return view('frontend.pages.units.index', [
            'units' => $units,
        ]);
    }

    public function show($id, $slug)
    {

        $unit = Unit::where('id', $id)->where('is_visible', TRUE)->where('status', TRUE)->first();

        if (empty($unit)) {
            abort(404);
        }
        return view('frontend.pages.units.show', [
            'unit' => $unit,
        ]);
    }
}
