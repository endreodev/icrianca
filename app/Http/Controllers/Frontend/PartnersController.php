<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {


        $partners_1_1 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->count();
        $partners_1_1 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->take(20)->get();
        $not = [];
        foreach ($partners_1_1 as $key => $value) {
            $not[$key] = $value->getId();
        }

        $partners_1_2 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->whereNotIn('id', $not)->get();
        $partners_2 = Partner::where('type', 2)->where('status', TRUE)->get();

        return view('frontend.pages.partners.index', [
            'partners_1_1'  => $partners_1_1,
            'partners_1_2'  => $partners_1_2,
            'partners_2'    => $partners_2,
        ]);
    }
}
