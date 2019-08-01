<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    public static function checkWishList($product_id){
        if (Auth::user()) { $user_id = \auth()->user()->id; } else { $user_id = null; }
        $check_for_wish = DB::table('wishlists')
            ->where('user_id','=', $user_id)
            ->where('product_id','=',$product_id)
            ->count();
        return $check_for_wish;
    }
}
