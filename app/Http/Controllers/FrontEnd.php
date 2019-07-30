<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEnd extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view('FrontEnd.index',compact('products'));
    }
}
