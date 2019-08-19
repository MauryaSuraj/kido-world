<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;
   protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->user = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Created On Kidoworld')
            ->to($this->user['email'])
            ->view('emails.register')
            ->with([
                'name' => $this->user['name'],
                'email' => $this->user['email']
            ]);
        // return $this->view('emails.register');
    }
}
