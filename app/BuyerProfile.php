<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyerProfile extends Model
{
    protected $guarded = [];

    public static function wishlist(){
        if (Auth::user()){
            $user_id  = \auth()->user()->id;
        }else
        {
            $user_id = null;
        }
        $product_on_wishlist = DB::table('wishlists')
            ->where('user_id' , '=', $user_id)
            ->join('products', 'products.id','=','wishlists.product_id')
            ->get();
        return $product_on_wishlist;
    }

    public static function user_details(){
        if (Auth::user()){
            $user_id  = \auth()->user()->id;
        }else
        {
            $user_id = null;
        }
        $user_profile_detils = DB::table('buyer_profiles')
            ->where('user_id', '=',$user_id)
            ->get()->first();
        return $user_profile_detils;
    }
}
