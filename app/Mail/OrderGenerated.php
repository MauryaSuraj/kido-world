<?php

namespace App\Mail;

use App\CheckOut;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderGenerated extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    public function __construct($request)
    {
        $this->order = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart_product = array();
          $cart_id =   \Opis\Closure\unserialize($this->order['cart_id']);
          foreach ($cart_id as $cart){
            $cart_product[] =   \App\CheckOut::cart_details_email($cart);
          }

        return $this->subject('Please Confirm Your Payment On Kido World')
            ->to($this->order['email'])
        ->view('emails.OrderGenerated')
            ->with([
                'email' => $this->order['email'],
                'name' => $this->order['name'],
                'address' => $this->order['address'],
                'phone' => $this->order['phone'],
                'total' => $this->order['total'],
                'cart_product' => $cart_product,
                'date' => $this->order['date'],
            ]);
    }
}
