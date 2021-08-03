<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Dev\Infrastructure\Models\User;

class SendVerificationCodeEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     *
     */
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject(env('APP_NAME') . ' Registration Verification')
            // ->name(env('APP_NAME'))
            ->view('emails.users.send-verification-code-email')
            ->with([
                'verification' => $this->user->verificationCode
            ]);
    }
}
