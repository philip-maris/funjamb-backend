<?php


namespace App\Mail;

use App\Models\V1\EmailProduct;
use App\Models\V1\OrderItem;
use App\Models\V1\Product;
use App\Models\V1\Order;
use Illuminate\Bus\Queueable;
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
    private Order $order;


    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($order)
    {
        $this->order = $order;

        $orderItems = OrderItem::where('orderItemOrderId', $order['orderId'])->get()->toArray();

        $this->fullName = "{$order->orderDetails->orderDetailFirstName} "."{$order->orderDetails->orderDetailLastName} ";
        $this->customerPhone = $order->orderDetails->orderDetailPhone;
        $this->orderDeliveryFee =$order->delivery->deliveryFee;
//        $this->orderDeliveryFee =$delivery['deliveryMinFee'];
        $this->orderDetailAddress = $order->orderDetails->orderDetailAddress;;
        $this->orderSubTotal = $order['orderSubTotalAmount'];
        $this->orderTotal = $order['orderTotalAmount'];
        $this->orderTrackingId = $order['orderTrackingCode'];
        $this->orderDeliveryEstimatedDate = $order['orderDeliveryEstimatedDate'];;

        foreach ($orderItems as $key => $item){
            $product = Product::find($item['orderItemProductId']);

            $emailProductItem = new EmailProduct(
                $product['productName'],
                $product['productImage'],
                $item["orderItemQuantity"],
                $item["orderItemTotalAmount"]
            );
            $this->products[] = $emailProductItem;
        }
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
                'fullName' => $this->fullName,
                'customerPhone' => $this->customerPhone,
                'orderDeliveryFee' => $this->orderDeliveryFee,
                'orderDetailAddress' => $this->orderDetailAddress,
                'orderSubTotal' => $this->orderSubTotal,
                'orderTrackingId' => $this->orderTrackingId,
                'orderTotal' => $this->orderTotal,
                'orderDeliveryEstimatedDate' => $this->orderDeliveryEstimatedDate,
                'products' => $this->products
            ]);
    }
}
