<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CauseController extends Controller
{
    public function index($id) {
        $data = DB::table('categoriess')->get();
        //dd($data);
        return view('causes_cat')->with('data', $data);
    }


    public function GetSub($id){
        echo json_encode(DB::table('sub_categoriess')->where('category_id', $id)->get());
    }
}
