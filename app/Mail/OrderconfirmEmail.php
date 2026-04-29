<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderconfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $orderNo;
    public $deliveredAt;

    public function __construct($customerName, $orderNo, $deliveredAt)
    {
        $this->customerName = $customerName;
        $this->orderNo = $orderNo;
        $this->deliveredAt = $deliveredAt;
    }

    public function build()
    {
        return $this->subject(config('site.name').' - Order Delivered')
            ->view('emails.order_delevered');
    }
}
