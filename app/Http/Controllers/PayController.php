<?php

namespace App\Http\Controllers;

use App\CartTest;
use App\CheckOut;
use App\Mail\PaymentConfirm;
use App\ShoppingCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PayController extends Controller
{


    public function pay(Request $request){
      
        $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                            array("X-Api-Key:1e50d4d593e3774854b50ebdc75cba69",
                                  "X-Auth-Token:1cf7698f8db02fd46b9fb83fb74fbcde"));
                $payload = Array(
                    'purpose' => $request->purpose,
                    'amount' => $request->amount,
                    'buyer_name' => $request->name,
                    'redirect_url' => 'http://kidoworldstore.in/pay-success',
                    'send_email' => true,
                    'webhook' => 'http://kidoworldstore.in/webhook',
                    'send_sms' => true,
                    'email' => $request->email,
                    'phone' => $request->mobile_number,
                    'allow_repeated_payments' => false
                );
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                $response = curl_exec($ch);
                curl_close($ch); 
                
                // echo $response;
            $data = json_decode($response, true);
            return redirect($data['payment_request']['longurl']);
    }
    public function success(Request $request){
        echo $request->payment_id;
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$request->payment_id);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:1e50d4d593e3774854b50ebdc75cba69",
                          "X-Auth-Token:1cf7698f8db02fd46b9fb83fb74fbcde"));

        $response = curl_exec($ch);
        curl_close($ch); 
        
        // echo $response;
         $data = json_decode($response, true);
          if($data['success'] == true){
        $phone = $data['payment']['buyer_phone'];
        $payment_id = $data['payment']['buyer_phone'];
        $email = $data['payment']['buyer_email'];
        $buyer_name = $data['payment']['buyer_name'];
        $amount = $data['payment']['unit_price'];
        $status = $data['payment']['status'];
        $sms_status = "sent";
        $email_status = "sent";

              Mail::send(new PaymentConfirm([
                  'email'=> $data['payment']['buyer_email'],
                  'name' => $data['payment']['buyer_name'],
                  'amount' => $data['payment']['unit_price'],
                  'phone' => $data['payment']['buyer_phone'],
                  'date' => Carbon::now()->toDateTimeString(),
              ]));

          DB::table('payment')
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
        if ($data['success'] == true)
        {
            if (Auth::user()){
                $user_id = \auth()->user()->id;
            }else{
                $user_id = CartTest::getIPAddress();
            }
            ShoppingCart::where('id', $user_id)->delete();
            return view('payment')->with('error', 'Payment successfull');
        }
          }
          else{
              return view('payment')->with('error','Payment Failed');
          }

    }

}
