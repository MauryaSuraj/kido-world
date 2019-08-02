<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
            $request->validate([
                'search' => 'required'
            ]);
            $search_term =   $request->input('search');

        $products = DB::table('products')
                ->where('product_name', 'LIKE','%'.$search_term.'%')
                ->orWhere('product_description','LIKE','%'.$search_term.'%')
                ->join('product_categories','product_categories.id','=','products.category_id')
                ->orWhere('category_name','LIKE','%'.$search_term.'%')
                ->orWhere('category_des','LIKE','%'.$search_term.'%')
                ->select('products.*')
                ->paginate(12);
             return view('shop.index',compact('products'));
    }
}

