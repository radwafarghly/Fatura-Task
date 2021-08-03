<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRequestedPasswordReset extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $code;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$code)
    {
        //
        $this->user = $user;
        $this->code = $code;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@athar.com', 'Athar')->subject('Password reset request') ->view('emails.users.request-password-reset');
    }  
}
