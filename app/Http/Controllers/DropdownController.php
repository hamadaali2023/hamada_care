<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DropdownController extends Controller
{
    
        public function index($id)
        {
            $countries = DB::table("country_tables")->pluck("name","id");
            return view('drop',compact('countries'));
        }

        public function getStateList(Request $request)
        {
            $states = DB::table("state_tables")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
            return response()->json($states);
        }

        public function getCityList(Request $request)
        {
            $cities = DB::table("city_tables")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($cities);
        }
}
