<?php

namespace App\Mail;

use App\Util\ExceptionUtil\ExceptionUtil;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessfulMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $fullName;
    public string $orderSubTotal;
    public string $orderTotal;
    public string $orderDeliveryFee;
    public string $orderDetailAddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName,$orderDeliveryFee,$orderDetailAddress,$orderSubTotal,$orderTotal)
    {
        $this->fullName = $fullName;
        $this->orderDeliveryFee = $orderDeliveryFee;
        $this->orderDetailAddress = $orderDetailAddress;
        $this->orderSubTotal = $orderSubTotal;
        $this->orderTotal = $orderTotal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('v1.email.order-successful-email')

        ->with([
            'fullName'=>$this->fullName,
            'orderDeliveryFee'=>$this->orderDeliveryFee,
            'orderDetailAddress'=>$this->orderDetailAddress,
            'orderSubTotal'=>$this->orderSubTotal,
            'orderTotal'=>$this->orderTotal
            ]);
    }
}
