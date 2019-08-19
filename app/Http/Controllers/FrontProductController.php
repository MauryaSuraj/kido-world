<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontProductController extends Controller
{
    public function index(){
    
        
        $products = DB::table('products')
            ->paginate(12);
      return  view('shop.index',compact('products'));
    }
    public function show($id){
        
         
        // if (Auth::user()){
        //     $user_id = \auth()->user()->id;
        // }else{
        //     $user_id = CartTest::getIPAddress();
        // }
        // $cart_item = DB::table('shopping_carts')
        //     ->where('user_id', '=', $user_id)
        //     ->join('products', 'products.id', '=', 'shopping_carts.product_id')
        //     ->select('products.*', 'shopping_carts.quantity as cart_quantity','shopping_carts.id as cart_id')
        //     ->get();
        
        $products = DB::table('products')
            ->where('slug','=', $id)
            ->get()->first();
        return view('shop.show',compact('products'));
    }
}
