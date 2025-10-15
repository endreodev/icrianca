<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function states($country)
    {
        $states = State::where('country_id', $country)->orderBy('name', 'ASC')->get();

        return response()->json($states)->setStatusCode(200);
    }
    public function cities($state)
    {
        $cities = City::where('state_id', $state)->orderBy('name', 'ASC')->get();

        return response()->json($cities)->setStatusCode(200);
    }

    public function countries()
    {
        $countries = Country::orderBy('name', 'ASC')->get();

        return response()->json($countries)->setStatusCode(200);
    }

    public function search($city = null, $state = null, $country = null)
    {

        $city = trim($city);
        $state = trim($state);
        $country = trim($country);

        $query = \DB::table('cities')
            ->select(
                'cities.id as city_id',
                'cities.name as city_name',
                'states.id as state_id',
                'countries.id as country_id',
            )
            ->whereRaw("cities.name like ?", ["%{$city}%"])
            //    ->orWhereRaw("states.initials like ?", ["%{$state}%"])
            ->where(function ($query) use ($state) {
                if(\Functions::count_characters($state) > 2){
                    return $query->whereRaw("states.name like ?", ["%{$state}%"]);
                }else{
                    return $query->whereRaw("states.initials like ?", ["%{$state}%"]);
                }
            })
            // ->whereRaw("states.name like ?", ["%{$state}%"])
            ->whereRaw("countries.name like ?", ["%{$country}%"])
            ->leftJoin('states', 'cities.state_id', 'states.id')
            ->leftJoin('countries', 'states.country_id', 'countries.id')->get();

        return response()->json($query)->setStatusCode(200);
    }
}
