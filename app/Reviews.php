<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reviews extends Model
{
    public static function reviews_product($product_id){
        $reviews = DB::table('reviews')
            ->where('product_id', '=', $product_id)
            ->get();
        return $reviews;
    }

    public static function user_details($id){
        $user_detail = DB::table('users')
            ->where('id', '=', $id)
            ->get()->first();
        return $user_detail->name;
    }

    public static function reviews_count($product_id){
        $reviews = DB::table('reviews')
            ->where('product_id', '=', $product_id)
            ->count();
        return $reviews;
    }
}
