<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Discount extends Model
{
    public static function coupon_validation($cart_Total,$coupons_code ){
        $discount = '';
        $msg = "";
        $details_based_on_coupon_code = DB::table('discounts')
            ->where('discount_name', '=', $coupons_code)
            ->first();
        if (count($details_based_on_coupon_code)> 0)
        {
            if ($details_based_on_coupon_code->status == 1) {
                if ($cart_Total > $details_based_on_coupon_code->discount_cart_total_min && $cart_Total < $details_based_on_coupon_code->discount_cart_total_max  )
                {
                    $discount =  self::cart_discount($cart_Total,$details_based_on_coupon_code->discount_price );
                }
                else {
                    $msg = "You are Not Applicable For Discount ";
                }
            }
            else{
                $msg = "Coupon Is Not Valid ";
            }
        }
        else{
            // coupon not presented
            $msg = "Coupon is Not Valid ";
        }
        $return_value = [
            'msg' =>  $msg,
            'discount' => $discount
        ];
        return $return_value;
    }

    public static function cart_discount($total_cart_value,$discount_amount ){
        $reflected_price = $total_cart_value - $discount_amount;
        return $reflected_price;
    }
}
