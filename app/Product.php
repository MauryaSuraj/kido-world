<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function isFeaturedProduct(){
        $product_lists = DB::table('products')
            ->where('isFeature', '=', 1)
            ->join('product_categories','product_categories.id', '=', 'products.category_id')
            ->select('products.*','product_categories.category_name')
            ->limit(6)->get();
        return $product_lists;
    }
     public static function gst($price, $gst){
        $gst_amount = ($price * $gst)/100;
        $effected_price = $gst_amount + $price;
        return $effected_price;
    }
}
