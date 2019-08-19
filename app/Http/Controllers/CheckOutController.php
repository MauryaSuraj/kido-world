<?php

namespace App\Http\Controllers;

use App\CartTest;
use App\CheckOut;
use App\Discount;
use App\Mail\OrderGenerated;
use App\ShoppingCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function index(){
        $effected = '';
        $user_id = \auth()->user()->id;
        $shipping_details  = DB::table('shipping')
            ->where('user_id', '=', $user_id)
            ->first();
        return view('CheckOut.index', compact('shipping_details', 'effected'));
    }
    public function discount(Request $request){
        $request->validate([
            'apply_coupon' => 'required',
        ]);

        $coupon =  $request->input('apply_coupon');
        $total =  ShoppingCart::grandTotal();
        $effected =  Discount::coupon_validation($total, $coupon);
        if (Auth::user()){
            $user_id = \auth()->user()->id;
        }else{
            $user_id = CartTest::getIPAddress();
        }
        return redirect()->back();
    }

    public function addShippingDetails(Request $request){
        if (Auth::user())
        {
            $user_id = \auth()->user()->id;
        }
        else{
            $user_id = CartTest::getIPAddress();
        }
         $request->validate([
           'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'state' => ['required', 'string'],
            'streetaddress' => ['required', 'string'],
            'nearby' => ['required', 'string'],
            'city' => ['required', 'string'],
            'pincode' => ['required', 'string'],
            'phone' => ['required'],
            'email' => ['required', 'email']
        ]);
         $addShipping = DB::table('check_outs')
             ->insert([
                 'address' => $request->input('streetaddress'),
                 'nearby' => $request->input('nearby'),
                 'pincode' => $request->input('pincode'),
                 'city' => $request->input('city'),
                 'state' => $request->input('state'),
                 'area' => $request->input('nearby'),
             ]);
         if ($addShipping)
             return redirect()->back()->with('success', 'Address Added');
    }

    public function shipping(Request $request){
        $effected['msg'] = '';
        $effected['discount'] ='';
        $strFromArr = serialize(CheckOut::getCartIdarray()->toArray());
        $subtotal = ShoppingCart::subTotal();
        $delivery = ShoppingCart::deliveryCharge();
        $total = ShoppingCart::grandTotal();
         $request->validate([
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'state' => ['required', 'string'],
            'streetaddress' => ['required', 'string'],
            'nearby' => ['required', 'string'],
            'city' => ['required', 'string'],
            'pincode' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
        ]);
    if (Auth::user())
    {
        $user_id = \auth()->user()->id;
    }else{
        $user_id = CartTest::getIPAddress();
    }
         $inser_data = DB::table('shipping')
             ->insert([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'street_address' => $request->input('streetaddress'),
                'apartment' => $request->input('nearby'),
                'state' => $request->input('state'),
                'pincode' => $request->input('pincode'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'cart_id' => $strFromArr,
                 'subtotal' => $subtotal,
                 'delivery' =>$delivery,
                 'total' => $total,
                 'user_id' => $user_id,
                 'created_at' => Carbon::now()->toDateTimeString(),
                 'updated_at' => Carbon::now()->toDateTimeString(),
             ]);
        Mail::send(new OrderGenerated([
            'email'=> $request->input('email'),
            'name' => $request->input('first_name') ." ".$request->input('last_name'),
            'address' => $request->input('streetaddress')." ".$request->input('nearby')." ".$request->input('state')." ". $request->input('city')." ". $request->input('pincode'),
            'phone' => $request->input('phone'),
            'total' => $total,
            'cart_id' => $strFromArr,
            'date' => Carbon::now()->toDateTimeString(),
        ]));
        if ($inser_data)
            if (Auth::user()){
                $user_id = \auth()->user()->id;
            }
        else{
            $user_id = CartTest::getIPAddress();
        }
            $shipping_details  = DB::table('shipping')
            ->where('user_id', '=', $user_id)
            ->first();
            return view('CheckOut.index', compact('shipping_details', 'effected'));
    }
}
