<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function addTowish(Request $request){
        if (Auth::user()){
            $user_id = \auth()->user()->id;
        }else{
            $user_id = null;
        }
        $add_to_wishlist = DB::table('wishlists')
            ->insert([
               'user_id' => $user_id,
               'product_id' => $request->input('product_id'),
               'status' => 1,
               'created_at' => Carbon::now()->toDateTimeString(),
               'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        if ($add_to_wishlist)
        return redirect()->back()->with('success', 'Added Successfully to Wish list');
    }
}

