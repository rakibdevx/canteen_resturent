<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $otp;
    public $orderNo;
    public $subject;

    public function __construct($user, $otp,$orderNo)
    {
        $this->user = $user;
        $this->otp = $otp;
        $this->subject = config('site.name') . " - Order Confirmation OTP";
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.otp')
            ->with([
                'user' => $this->user,
                'otp' => $this->otp,
                'orderNo' => $this->orderNo,
            ]);
    }
}
