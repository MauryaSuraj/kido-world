<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('order.index');
    }
    public function order_status(Request $request){
        $order_status = $request->input('order_status');
        $id = $request->input('id');
        Order::update_order_status($order_status, $id);
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return redirect()->back()->with('success', 'Status Updated');
    }
}
