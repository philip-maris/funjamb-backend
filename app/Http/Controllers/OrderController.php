<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Requests\Order\ReadByOrderIdRequest;
use App\Http\Service\OrderService;
use App\Util\baseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    use ResponseUtil;

    public function __construct(protected OrderService $orderService){
        //todo code here
    }


    public function create(CreateOrderRequest $request): JsonResponse
    {
      return  $this->orderService->create($request);
    }



    public function update(UpdateOrderRequest $request): JsonResponse
    {
      return  $this->orderService->update($request);
    }

    public function read(): JsonResponse
    {

        return $this->orderService->read();
    }

    public function readById(ReadByOrderIdRequest $request): JsonResponse
    {
       return $this->orderService->readById($request);
    }
}
