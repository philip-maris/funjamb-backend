<?php

namespace App\Service\V1\Api;

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

//            dd($cart);
           $cartSummary = CartSummary::create();

            //todo  check if successful
            if (!$cart) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
