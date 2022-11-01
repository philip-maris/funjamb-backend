<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CreateCartRequest;
use App\Http\Requests\Cart\ReadByCustomerIdRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\ReadByCartIdRequest;
use App\Http\Service\CartService;
use App\Util\baseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    use ResponseUtil;

    public function __construct(protected CartService $cartService){
        //todo code here
    }

    public function create(CreateCartRequest $request): JsonResponse
    {
      return  $this->cartService->create($request);
    }

    public function update(UpdateCartRequest $request): JsonResponse
    {
      return  $this->cartService->update($request);
    }

    public function read(): JsonResponse
    {

        return $this->cartService->read();
    }

    public function readByCustomerId(ReadByCustomerIdRequest $request): JsonResponse
    {
       return $this->cartService->readByCustomerId($request);
    }

    public function delete(ReadByCartIdRequest $request): JsonResponse
    {
       return $this->cartService->delete($request);
    }
}
