<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public static function order_details(){
        $orders = DB::table('orders')
            ->paginate(6);

       return $orders;
    }
}
