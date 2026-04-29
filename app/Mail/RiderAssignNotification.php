<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RiderAssignNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $rider;
    public $subject;

    public function __construct($rider,$order)
    {
        $this->order = $order;
        $this->rider = $rider;
        $this->subject = config('site.name') . " - New Order Assigned (#{$order->order_number})";
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.rider_assign_notification');
    }
}