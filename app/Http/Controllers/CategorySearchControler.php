<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorySearchControler extends Controller
{
    public function search($id){

        $products = DB::table('products')
            ->join('product_categories','product_categories.id','=','products.category_id')
            ->orWhere('category_name','LIKE','%'.$id.'%')
            ->orWhere('category_des','LIKE','%'.$id.'%')
            ->orWhere('product_categories.slug','LIKE','%'.$id.'%')
            ->select('products.*')
            ->paginate(12);
        return view('shop.index',compact('products'));
    }
}
