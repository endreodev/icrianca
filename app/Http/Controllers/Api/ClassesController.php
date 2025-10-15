<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Program;
use App\Models\Unit;
use Illuminate\Http\Request;

use Auth;

class ClassesController extends Controller
{
    public function units()
    {
        # Get Units
        if (!Auth::guard('web')->user()->hasRole(['admin'])) $units = Auth::guard('web')->user()->units();
        else $units = Unit::where('status', TRUE)->orderBy('name', 'ASC')->get();

        return response()->json($units);
    }

    public function programs($unit_id)
    {
        $user = Auth::guard('web')->user();

        if (!$user->hasRole(['admin'])) {
            $response = Program::where('status', TRUE)->get();
        } else {
            $response = Program::where('status', TRUE)->get();
        }

        return response()->json($response);
    }
    public function classes($program_id, $unit_id)
    {
        $user = Auth::guard('web')->user();

        if (!$user->hasRole(['admin'])) {
            $response = Classe::where('status', TRUE)->where('program_id', $program_id)->where('unit_id', $unit_id)->whereHas('trainers', function ($query) {
                $query->where('classe_educator.user_id', Auth::guard('web')->user()->id);
            })->get();
        } else {
            $response = Classe::where('status', TRUE)->where('program_id', $program_id)->where('unit_id', $unit_id)->get();
        }

        return response()->json($response);
    }
}
