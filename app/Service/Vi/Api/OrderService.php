<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\Order\CreateOrderRequest;
use App\Http\Requests\V1\Api\Order\ReadByOrderIdRequest;
use App\Http\Requests\V1\Api\Order\ReadOrderByCustomerId;
use App\Http\Requests\V1\Api\Order\UpdateOrderRequest;
use App\Mail\OrderSuccessfulMail;
use App\Models\V1\Cart;
use App\Models\V1\Customer;
use App\Models\V1\Delivery;
use App\Models\V1\Order;
use App\Models\V1\OrderDetail;
use App\Models\V1\Product;
use App\Util\BaseUtil\DateTimeUtil;
use App\Util\BaseUtil\RandomUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;


class EmailProduct{
    public string $productImage;
    public string $productName;
    public string $productQuantity;
    public string $productTotalAmount;

    public function __construct($productName,$productImage,$productQuantity,$productTotalAmount){
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->productQuantity = $productQuantity;
        $this->productTotalAmount = $productTotalAmount;

    }
}

class OrderService
{
    use ResponseUtil;
    use RandomUtil;
    use DateTimeUtil;
    public function create(CreateOrderRequest $createOrderRequest): JsonResponse
    {
        try {

            //  validate
            $validate = $createOrderRequest->validated();

            //  action
            $customer = Customer::find($createOrderRequest['orderCustomerId']);
            if (!$customer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD,"Customer not located");


            $carts = Cart::where("cartCustomerId", $createOrderRequest['orderCustomerId'])->get();
            if (empty($carts->toArray())) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Cart items is empty");

            $delivery = Delivery::find($createOrderRequest['orderDeliveryId']);
            if (!$delivery) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "delivery not found");


            if (strtolower($createOrderRequest->orderPaymentMethod) == "paystack"){
                $resPaystack =  Http::withToken(env("PAYSTACK_SECRET_KEY"))->get("https://api.paystack.co/transaction/verify/{$validate['orderReference']}")->json();
                if (!$resPaystack["status"]) return $this->ERROR_RESPONSE($resPaystack["message"]);
            }else{
                throw new ExceptionUtil(ExceptionCase::SYSTEM_MALFUNCTION, "Only paystack is available now");
            }

//            $resBizgem =  Http::withToken(env('PAYSTACK_SECRET_KEY'))->post("https://api.bizgem.io/virtual-account/transaction-status-query", [
//                "reference"=> $validate['orderReference']
//            ])->json();



            $order = $customer->orders()->create(
                array_merge($createOrderRequest->only([
                    "orderCustomerId",
                    "orderPaymentMethod",
                    "orderDeliveryId",
                    "orderTotalAmount",
                    "orderReference",
                    "orderSubTotalAmount",
                ]),['orderDeliveryEstimatedDate'=>$this->addTimestamp(days: 3), "orderTrackingCode"=>$this->RANDOM_STRING()])
            );
            //  check if successful
            if (!$order) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);



            // mark all items in the cart as pending
//            $customer = Customer::find($createOrderRequest['orderCustomerId']);
//            $email =  Mail::to($customer['customerEmail'])->send(new OrderSuccessfulMail());
            //check if email sent
//            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            // create order details
          //  dd($order);
            $orderDetail = $order->orderDetails()->create([
                'orderDetailFirstName'=>$validate['orderDetailsFirstName'],
                'orderDetailLastName'=>$validate['orderDetailsLastName'],
                'orderDetailEmail'=>$validate['orderDetailsEmail'],
                'orderDetailPhone'=>$validate['orderDetailsPhone'],
                'orderDetailAddress'=>$validate['orderDetailsAddress'],
                'orderDetailState'=>$validate['orderDetailsState'],
            ]);

            //  check if successful
            if (!$orderDetail) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
//            dd($cart);

            $emailProductItems = [];
            foreach ($carts as $key => $cart){
//                dd($cart);
                $orderItem = $order->orderItems()->create([
                    "orderItemProductId"=>$cart["cartProductId"],
                    "orderItemQuantity"=>$cart["cartQuantity"],
                    "orderItemTotalAmount"=>$cart["cartTotalAmount"],
                ]);
                if (!$orderItem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, "unable to create order item");


                $product = Product::find($cart['cartProductId']);

                $emailProductItem = new EmailProduct(
                    $product['productName'],
                    $product['productImage'],
                    $cart["cartQuantity"],
                    $cart["cartTotalAmount"]
                );
                 $emailProductItems[] = $emailProductItem;

                if (!$cart->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);
//                dd($key);
            }

            //todo send email
            $fullName ="{$customer['customerFirstName']} " . " {$customer['customerLastName']}";


            $email =  Mail::to($createOrderRequest['orderDetailsEmail'])->send(new OrderSuccessfulMail(
                $fullName,
                $customer['customerPhoneNo'],
                $delivery['deliveryFee'],
                $createOrderRequest['orderDetailsAddress'],
                $createOrderRequest['orderSubTotalAmount'],
                $createOrderRequest['orderTotalAmount'],
                $order['orderTrackingCode'],
                $order['orderDeliveryEstimatedDate'],
                $emailProductItems
            ));
            //todo check if not email sent
            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("Order Created Successful");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function update(UpdateOrderRequest $request): JsonResponse
    {
        try {
            //  validate
            $request->validated($request);
            // verify admin

             $order = Order::where('orderId', $request['orderId'])->first();
             if (!$order) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =    $order->update(['orderStatus'=>$request['orderStatus']]
            );
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);


            return $this->SUCCESS_RESPONSE("UPDATE SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }



    public function read(): JsonResponse
    {
        try {
            $order = Order::all();
            if (!$order)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($order);

            //loop through all orders and add order details
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByOrderIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $order = Order::where('orderId', $request['orderId'])->first();
            if (!$order) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            $orderDetail = OrderDetail::where('orderDetailOrderId',$request['orderId']);
            if (!$orderDetail)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);

            $data[] = array_merge($order->toArray(),
                ['orderDetail' => $orderDetail->toArray()]);
            return $this->BASE_RESPONSE($data);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readByCustomerId(ReadOrderByCustomerId $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $order = Order::where('orderCustomerId', $request['orderCustomerId'])->first();
            if (!$order) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

//            $orderDetail = OrderDetail::where('orderDetailOrderId',$request['orderId']);
//            if (!$orderDetail)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            $order->orderDetails;

            $order->orderItems;
//            $data[] = array_merge($order->toArray(),
//                ['orderDetail' => $orderDetail->toArray()]);
            return $this->BASE_RESPONSE($order);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
