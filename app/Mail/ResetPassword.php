<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $token;

    /**
     * Create a new message instance.
     */
  
    public function __construct($name,$token)
    {
        //
        $this->name = $name;
        $this->token = $token;
    }

    public function build()
    {
        $user['name'] = $this->name;
        $user['token'] = $this->token;

        return $this->from("yoursenderemail@mail.com", "Sender Name")
        ->subject('Password Reset Link')
        ->view('reset.reset-password', ['user' => $user]);
    }
}
