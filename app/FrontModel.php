<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FrontModel extends Model
{
    public static function categoryWiseProduct()
    {
        $category = DB::table('product_categories')->get();
       return $category;
    }
    public static function productBasedOnCategory($id){
        $products = DB::table('products')
            ->where('category_id', '=', $id)->orderByDesc('created_at')->limit(6)
            ->get();
        return $products;
    }
}
