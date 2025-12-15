<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderId;
    public $status;

    public function __construct($orderId, $status)
    {
        $this->orderId = $orderId;
        $this->status  = $status;
    }

    public function build()
    {
        return $this->subject('Your Manga Order Status')
                    ->view('emails.orderShipped')
                    ->with([
                        'orderId' => $this->orderId,
                        'status'  => $this->status,
                    ]);
    }
}
