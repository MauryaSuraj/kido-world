<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        return view('UserProfile.index');
    }

    public function wishlist(){
        return view('UserProfile.wishlist');
    }

    public function order(){
        return view('UserProfile.order');
    }

    public function profile(){
        return view('UserProfile.profile');
    }
    public function profile_edit(){
        return view('UserProfile.profile_edit');
    }
    public function cart(){
        $user_id = null;
        if (Auth::user()){
            $user_id = \auth()->user()->id;
        }
        $cart_item = DB::table('shopping_carts')
            ->where('user_id', '=', $user_id)
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.*', 'shopping_carts.quantity as cart_quantity','shopping_carts.id as cart_id')
            ->get();
        return view('UserProfile.cart', compact('cart_item'));
    }
}
