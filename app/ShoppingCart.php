<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
    public $itemCount  ;
   public static function itemCount(){
       global $itemCount;
       if (Auth::user()){
           $user_id = \auth()->user()->id;
           $check_for_item_in_cart = DB::table('shopping_carts')
               ->where('user_id', '=', $user_id)
               ->count();
           if ($check_for_item_in_cart > 0){
               $count_item = DB::table('shopping_carts')->where('user_id','=', $user_id)->get();
               foreach ($count_item as $item){
                   $itemCount = $itemCount + $item->quantity;
               }
           }
           else{
               $itemCount ="Cart Is Empty";
           }
       }
       echo $itemCount;
   }

   public static function subTotal(){
       $itemCount =0;
       if (Auth::user()){
           $user_id = \auth()->user()->id;
           $check_for_item_in_cart = DB::table('shopping_carts')->where('user_id', '=', $user_id)->count();
           if ($check_for_item_in_cart){
               $count_item = DB::table('shopping_carts')->where('user_id','=', $user_id)->get();
               foreach ($count_item as $item){
                   $itemCount = $itemCount + $item->quantity*$item->product_price;
               }
           }
       }
       return $itemCount;
   }

   public static function deliveryCharge(){
       $delevery_charge_below_1000 = 0;
       $delevery_charge_avove_1000 = 70;
       $charge =0;
       $delivery_charge = 0;
       if (Auth::user()){
           $user_id = \auth()->user()->id;
           $check_for_item_in_cart = DB::table('shopping_carts')->where('user_id', '=', $user_id)->count();
           if ($check_for_item_in_cart){
               $count_item = DB::table('shopping_carts')->where('user_id','=', $user_id)->get();
               foreach ($count_item as $item){
                   $charge = $charge + $item->quantity*$item->product_price;
                   if ($charge < 1000){
                       $delivery_charge =  $delevery_charge_avove_1000 + $delivery_charge;
                   }elseif ($charge > 1000){
                       $delivery_charge = $delevery_charge_below_1000 + $delivery_charge;
                   }
               }
           }
       }
       return $delivery_charge;
   }

   public static function grandTotal(){
        $grandTotal = (int) self::subTotal() + (int) self::deliveryCharge();
        return $grandTotal;
   }

}
