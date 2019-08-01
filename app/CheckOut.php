<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckOut extends Model
{
    public static function getCartIdarray(){
        if (Auth::user()){
            $user_id = \auth()->user()->id;
            $check_for_item_in_cart = DB::table('shopping_carts')->where('user_id', '=', $user_id)->pluck('id');
        }
        return $check_for_item_in_cart;
    }

    public static function cart_details(){
        $cart_items_details = array();
        $cart_id = Self::cart_id_details();
        foreach ($cart_id as $cart){
            $cart_details = DB::table('shopping_carts')
                ->where('shopping_carts.id', '=', $cart)
                ->join('products','products.id','shopping_carts.product_id')
                ->select('products.*', 'shopping_carts.quantity as cart_quantity')
                ->first();
            $cart_items_details[] = $cart_details;
        }
       return $cart_items_details;
    }

    public static function cart_id_details(){
        $user_id = \auth()->user()->id;
        $cart_id  = unserialize(DB::table('shipping')
            ->where('user_id', '=', $user_id)
            ->pluck('cart_id')->first());
        return $cart_id;
    }
    public static function product_name_in_cart(){
        foreach (Self::cart_details() as $cart_item_details){
            echo $cart_item_details->product_name." "." ";
        }
    }

}
