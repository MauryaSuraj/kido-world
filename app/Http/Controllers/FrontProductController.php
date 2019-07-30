<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontProductController extends Controller
{
    public function index(){
        $products = DB::table('products')
            ->paginate(1);
      return  view('shop.index',compact('products'));
    }
    public function show($id){
        $products = DB::table('products')
            ->where('id', $id)
            ->get()->first();
        return view('shop.show',compact('products'));
    }
}
