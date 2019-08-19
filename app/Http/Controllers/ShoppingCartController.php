<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CartTest;
use App\Discount;
use App\ShoppingCart;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{
    public function index(){

        if (Auth::user()){
            $user_id = \auth()->user()->id;
        }else{
            $user_id = CartTest::getIPAddress();
        }
        $cart_item = DB::table('shopping_carts')
            ->where('user_id', '=', $user_id)
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.*', 'shopping_carts.quantity as cart_quantity','shopping_carts.id as cart_id')
            ->get();
        // return view('ShoppingCart.index',compact('cart_item'));
         return view('ShoppingCart.index',compact('cart_item'));
    }
    public function addTocart(Request $request){
        $request->validate([
           'product_id' => 'required',
           'product_quantity' => 'required',
           'product_price' => 'required',
        ]);
        if (Auth::check()) {
            $auth_user_id = auth()->user()->id;
        }else{ $auth_user_id =  $auth_user_id = CartTest::getIPAddress(); }

        $product_id = $request->input('product_id');

        //check if product exist in database or not

        $check_for_product = DB::table('shopping_carts')
            ->where('product_id','=', $product_id)
            ->where('user_id','=', $auth_user_id)
            ->count();

        if ($check_for_product > 0){
            $product_quantity = (int) DB::table('shopping_carts')
                ->where('product_id','=', $product_id)
                ->where('user_id','=', $auth_user_id)
                ->pluck('quantity')->first();
            $add_cart_item_to_database = DB::table('shopping_carts')
                ->where('product_id', '=', $product_id)
                ->where('user_id','=', $auth_user_id)
                ->update([
                   //update quantity by one
                    'quantity' => $product_quantity + $request->input('product_quantity'),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);

        }else{

        $add_cart_item_to_database = DB::table('shopping_carts')
            ->insert([
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('product_quantity'),
                'product_price' => $request->input('product_price'),
                'user_id' => $auth_user_id,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($add_cart_item_to_database)
            return redirect()->back()->with('success', 'Item Added To cart Successfully');
    }

    public function removeItem($id){
        $remove_cart_item = DB::table('shopping_carts')
            ->where('id', '=', $id)
            ->delete($id);
       if ($remove_cart_item)
           return redirect()->back()->with('success', 'Item Removed Successfully');
    }
}
