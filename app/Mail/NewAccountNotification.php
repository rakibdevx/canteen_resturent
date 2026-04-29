<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccountNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $email;
    public $subject;

    public function __construct($user, $email)
    {
        $this->user = $user;
        $this->email = $email;
        $this->subject = config('site.name') . " - New Account";   
    }

    public function build()
    {
        return $this->subject($this->subject)->view('emails.new_account_notification');
    }
}
