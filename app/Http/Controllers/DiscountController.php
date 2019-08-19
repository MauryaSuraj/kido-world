<?php

namespace App\Http\Controllers;

use App\Discount;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(){
        $coupons = Discount::all();
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Discount.index', compact('coupons'));
    }
    public function create(){
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Discount.create');
    }
    public function edit($id){
        if (User::adminProfileCheck() == 0){
            return redirect()->to('/');
        }else
        return view('Discount.edit');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'discount_start_date' => 'required',
            'discount_end_date' => 'required',
            'discount_cart_total_min' => 'required',
            'discount_cart_total_max' => 'required',
        ]);
        $add_discount = DB::table('discounts')
            ->insert([
                'discount_name' => $request->input('name'),
                'discount_price' => $request->input('discount'),
                'discount_start_date' => $request->input('discount_start_date'),
                'discount_end_date' => $request->input('discount_end_date'),
                'discount_cart_total_min' => $request->input('discount_cart_total_min'),
                'discount_cart_total_max' => $request->input('discount_cart_total_max'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        if ($add_discount)
            return redirect()->back()->with('success', 'Discount Coupon Added successfully');
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function show($id) {
//        return view()
    }
    public function destroy ($id){
        Discount::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Deleted SuccessFully');
    }
}
