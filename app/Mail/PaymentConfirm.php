<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $order_palces;
    public function __construct($request)
    {
        $this->order_palces = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Confirmed Kido World')
            ->to($this->order_palces['email'])
           ->view('emails.confirm_payment')
            ->with([
               'email' =>  $this->order_palces['email'],
                'name' => $this->order_palces['name'],
                'amount' => $this->order_palces['amount'],
                'phone' => $this->order_palces['phone'],
                'date' => $this->order_palces['date'],
            ]);
    }
}
