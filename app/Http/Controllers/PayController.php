<?php

namespace App\Http\Controllers;

use App\CheckOut;
use App\ShoppingCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{

    public function pay(Request $request){

        $api = new \Instamojo\Instamojo(
            config('services.instamojo.api_key'),
            config('services.instamojo.auth_token'),
            config('services.instamojo.url')
        );

        try {
            $response = $api->paymentRequestCreate(array(
                "purpose" => $request->purpose,
                "amount" => $request->amount,
                "buyer_name" => "$request->name",
                "send_email" => true,
                "send_sms" => true,
                "email" => "$request->email",
                "phone" => "$request->mobile_number",
                "redirect_url" => "http://127.0.0.1:8000/pay-success"
            ));

            header('Location: ' . $response['longurl']);
            exit();
        }catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }
    public function success(Request $request){
        try {

            $api = new \Instamojo\Instamojo(
                config('services.instamojo.api_key'),
                config('services.instamojo.auth_token'),
                config('services.instamojo.url')
            );
            $response = $api->paymentRequestStatus(request('payment_request_id'));

            if( !isset($response['payments'][0]['status']) ) {
                dd('payment failed');
            } else if($response['payments'][0]['status'] != 'Credit') {
                dd('payment failed');
            }
        }catch (\Exception $e) {
            dd('payment failed');
        }
        $phone = $response['phone'];
        $payment_id = $response['id'];
        $email = $response['email'];
        $buyer_name = $response['buyer_name'];
        $amount = $response['amount'];
        $status = $response['status'];
        $sms_status = $response['sms_status'];
        $email_status = $response['email_status'];

        $payment_enter = DB::table('payment')
            ->insert([
               'phone' => $phone,
               'email' => $email,
               'buyer_name' => $buyer_name,
               'amount' => $amount,
               'status' => $status,
               'sms_status' => $sms_status,
               'email_status' => $email_status,
               'payments_id' => $payment_id,
               'created_at' => Carbon::now()->toDateString(),
               'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        DB::table('orders')
            ->insert([
               'customer_id' => auth()->user()->id,
               'product_id' => serialize(CheckOut::getProductIdarray()->toArray()),
               'payment_status' => $status,
               'payment_id' => $payment_id,
               'order_status' => 'pending',
               'created_at' => Carbon::now()->toDateString(),
               'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        if ($status == 'Completed')
        {
            return view('payment');
        }

    }

}
