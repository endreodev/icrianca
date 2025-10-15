<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function get($ref = null)
    {
        $school_years   = SchoolYear::where('status', TRUE);

        if($ref){
            $school_years->where('teaching', $ref);
        }

        return response()->json($school_years->get())->setStatusCode(200);
    }
}
