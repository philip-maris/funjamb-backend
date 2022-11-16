<?php

namespace App\Http\Service\Vi\Api;

use App\Http\Requests\V1\Api\CartSummary\CreateCartSummaryRequest;
use App\Models\V1\Cart;
use App\Models\V1\CartSummary;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;

class CartSummaryService
{
    use ResponseUtil;
    public function create(Cart $cart): JsonResponse
    {
        try {

            dd($cart);
           $cartSummary = CartSummary::create();

            //todo  check if successful
            if (!$cart) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
