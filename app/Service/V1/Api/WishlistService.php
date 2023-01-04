<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\WishList\CreateWishlistRequest;
use App\Http\Requests\V1\Api\WishList\ReadByWishlistIdRequest;
use App\Http\Requests\V1\Api\WishList\ReadWishlistByCustomerIdRequest;
use App\Models\V1\Customer;
use App\Models\V1\Product;
use App\Models\V1\Wishlist;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;

class WishlistService
{
    use ResponseUtil;

    public function create(CreateWishlistRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request);
            //TODO ACTION

            //find customer
            $customer = Customer::find($request['wishlistCustomerId']);
            $product = Product::find($request['wishlistProductId']);
           // dd($customer);
            if (!$customer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "UNABLE TO LOCATE CUSTOMER");
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "UNABLE TO LOCATE PRODUCT");
            //todo create wishlist through product relation
            $response = $customer->wishlists()->create(array_merge($request->all(),['wishlistStatus'=>'ACTIVE']));
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            return $this->SUCCESS_RESPONSE("WISHLIST CREATED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

//    public function update(UpdateWishlistRequest $request): JsonResponse
//    {
//        try {
//            //TODO VALIDATION
//            $request->validated($request);
//            //TODO ACTION
//            $wishList = Wishlist::where('wishlistId', $request['wishlistId'])->first();
//                 if (!$wishList) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "UNABLE TO LOCATE WISHLIST");
//            $response = $wishList->update(array_merge($request->except('wishlistId'),
//                ['wishlistStatus'=>'ACTIVE']));
//            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);
//            return  $this->SUCCESS_RESPONSE("WISHLIST UPDATED SUCCESSFUL");
//        }catch (Exception $ex){
//            return $this->ERROR_RESPONSE($ex->getMessage());
//        }
//    }

    public function read(): JsonResponse
    {
        try {
            $wishlists = Wishlist::all();
            if (!$wishlists)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($wishlists);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readById(ReadByWishlistIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            //todo action
            $wishlist = Wishlist::where('wishlistId', $request['wishlistId'])->first();
            if (!$wishlist) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            return  $this->BASE_RESPONSE($wishlist);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readWishlistByCustomerId(ReadWishlistByCustomerIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();
            //todo action
            $wishlists = Wishlist::where('wishlistCustomerId', $request['wishlistCustomerId'])->get();
            $products =[];
            foreach ($wishlists as $key=> $wishlist){
                $products[$key]  = $wishlist->products->all();
               // dd($wishlist->wishlistProductId);
            }
            if (!$wishlists) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =  $wishlists->toArray();
            return  $this->BASE_RESPONSE($response);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }


    public function delete(ReadByWishlistIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            $wishList = Wishlist::where('wishlistId', $request['wishlistId'])->first();
            if (!$wishList) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            if (!$wishList->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return  $this->SUCCESS_RESPONSE("WISHLIST DELETED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
}
