<?php

namespace App\Mail;

use App\Service\Vi\Api\EmailProduct;
use App\Util\ExceptionUtil\ExceptionUtil;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessfulMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $fullName;
    public string $customerPhone;
    public string $orderSubTotal;
    public string $orderTotal;
    public int $orderDeliveryFee;
    public string $orderDetailAddress;
    public string $orderTrackingId;
    public string $orderDeliveryEstimatedDate;
    public array $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName,$customerPhone,$orderDeliveryFee,$orderDetailAddress,$orderSubTotal,$orderTotal,$orderTrackingId,$orderDeliveryEstimatedDate,$products)
    {
        $this->fullName = $fullName;
        $this->customerPhone = $customerPhone;
        $this->orderDeliveryFee = $orderDeliveryFee;
        $this->orderDetailAddress = $orderDetailAddress;
        $this->orderSubTotal = $orderSubTotal;
        $this->orderTotal = $orderTotal;
        $this->orderTrackingId=$orderTrackingId;
        $this->orderDeliveryEstimatedDate=$orderDeliveryEstimatedDate;
        $this->products=$products;
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
            'customerPhone'=>$this->customerPhone,
            'orderDeliveryFee'=>$this->orderDeliveryFee,
            'orderDetailAddress'=>$this->orderDetailAddress,
            'orderSubTotal'=>$this->orderSubTotal,
            'orderTrackingId'=>$this->orderTrackingId,
            'orderTotal'=>$this->orderTotal,
            'orderDeliveryEstimatedDate'=>$this->orderDeliveryEstimatedDate,
            'products'=>$this->products
            ]);
    }
}
