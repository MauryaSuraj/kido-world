<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public static function order_details(){
        $orders = DB::table('orders')->get();
        return $orders;
    }
    public static function product_id($id)
    {
        $product_id_array = unserialize($id);
         return $product_id_array;
    }
    public static function product_name($id){
        $product_details = DB::table('products')
            ->where('id', '=', $id)
            ->pluck('product_name')
            ->first();
        echo $product_details."<br>";
    }
    public static function customer_details($user_id){
        $buyer_details = DB::table('buyer_profiles')
            ->where('user_id', '=', $user_id)
            ->get()->toArray();
        return $buyer_details;
    }
    public static function update_order_status($order_status, $id){
        DB::table('orders')
            ->where('id', $id)
            ->update([
               'order_status' => $order_status
            ]);
    }
}
