<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\Cart\CreateCartRequest;
use App\Http\Requests\V1\Api\Cart\ReadByCartIdRequest;
use App\Http\Requests\V1\Api\Cart\ReadByCustomerIdRequest;
use App\Http\Requests\V1\Api\Cart\UpdateCartRequest;
use App\Models\V1\Cart;
use App\Models\V1\Customer;
use App\Models\V1\Product;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class CartService
{
    use ResponseUtil;
    public function __construct(protected ProductService $productService, protected CartSummaryService $cartSummaryService){

    }

    public function create(CreateCartRequest $createCartRequest): JsonResponse
    {
        try {

            //todo  validate
            $validated = $createCartRequest->validated();
            //check if user exit
            $customer = Customer::find($validated['cartCustomerId']);
            if (!$customer)
                throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Unable to locate customer");

            //check if requested product quantity is available
            $product = Product::find($validated['cartProductId']);
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Unable to locate product with the id {$validated['cartProductId']}");

            if (($product['productQuantity'] - $validated['cartQuantity']) < 0) {
                throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG , "{$product['productQuantity']} {$product['productName']} available");
            }

            if ($validated['cartQuantity'] < 1) {
                throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG , "Cannot add product, quantity must be greater than 0");
            }

            //check if cart exist and delete if it exists
            $existCart = Cart::where("cartProductId", $validated['cartProductId'])->first();
            if ($existCart){
                //dd($existCart);
                $existCart->delete();
            }
                //dd($product['productSellingPrice'] ?? $product['productOfferPrice'] * $validated['cartQuantity']);
                $response = Cart::create(array_merge($validated, [
                    "cartTotalAmount"=> (integer)$product['productOfferPrice'] !== 0 ? $product['productOfferPrice'] * $validated['cartQuantity']:$product['productSellingPrice'] * $validated['cartQuantity']
                ]));
                //todo  check if successful
                if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

                $data = array_merge($response->toArray(), [
                    "product" => $product->toArray(),

                ]);

            return $this->BASE_RESPONSE($data);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    protected function cart_summary(){

    }

    public function update(UpdateCartRequest $updateCartRequest): JsonResponse
    {
        try {
            //  validate
            $validated = $updateCartRequest->validated();

             $cartCustomer = Cart::where("cartCustomerId",$updateCartRequest['cartCustomerId']);
             if (!$cartCustomer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "this user have no cart");


             $cart = Cart::where("cartId",$updateCartRequest['cartId'])->first();
             if (!$cart) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "cart cannot be located");

            if ($validated['cartQuantity'] < 1) {
                $cart->delete();
                throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);
            }
             $product = Product::find($updateCartRequest['cartProductId']);
             if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "product  not found");

            //  check if requested product quantity is available
            if (($product['productQuantity'] - $updateCartRequest['cartAddedQuantity']) < 0) {
                throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG , "{$product['productQuantity']} available");
            }

//            dd($validated);
            //todo update the cart
            $response =    $cart->update(array_merge($validated,[
                "cartTotalAmount"=> (integer)$product['productOfferPrice'] !== 0 ? $product['productOfferPrice'] * $validated['cartQuantity']:$product['productSellingPrice'] * $validated['cartQuantity']
            ]));
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            $cart->products->get();
            return $this->BASE_RESPONSE($cart->toArray());
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }



    public function read(): JsonResponse
    {
        try {
            $cart = Cart::all();
            if (!$cart)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($cart);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readByCustomerId(ReadByCustomerIdRequest $readByCustomerIdRequest): JsonResponse
    {
        try {
            //todo validation
            $readByCustomerIdRequest->validated();

            //todo action
            $cart = Cart::where('cartCustomerId', $readByCustomerIdRequest['cartCustomerId'])->get();
            $products = [];
            foreach ($cart as $key => $value){
               $products[$key] = $value->products->all();
            }
            if (!$cart) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            $response = $cart->toArray();
            return  $this->BASE_RESPONSE($response);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }



    public function delete(ReadByCartIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            $cart = Cart::where('cartId', $request['cartId'])->first();
            if (!$cart) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            if (!$cart->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);
            return  $this->SUCCESS_RESPONSE("CART Deleted SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
}
