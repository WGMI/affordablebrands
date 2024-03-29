<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;
use App\Products;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $products;
    public $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$products,$amount)
    {
        $this->order = $order;
        $this->products = $products;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.thankyou')->with(['order',$this->order,'products',$this->products,'amount',$this->amount]);
    }
}
