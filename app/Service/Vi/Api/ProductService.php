<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\Product\CreateProductRequest;
use App\Http\Requests\V1\Api\Product\FilterProductBySellingPrice;
use App\Http\Requests\V1\Api\Product\ReadByProductIdRequest;
use App\Http\Requests\V1\Api\Product\ReadByProductVariationIdRequest;
use App\Http\Requests\V1\Api\Product\ReadProductByBrandId;
use App\Http\Requests\V1\Api\Product\ReadProductByCategoryId;
use App\Http\Requests\V1\Api\Product\UpdateProductRequest;
use App\Models\V1\Brand;
use App\Models\V1\Category;
use App\Models\V1\Product;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProductService
{
    use ResponseUtil;

    public function create(CreateProductRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $validated =  $request->validated();

            // verify admin
          //  $customer = $this->VERIFY_ADMIN($request['productCustomerId']);

            $category = Category::find($request['productCategoryId']);
            if (!$category) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Unable to locate category");

            $brand = Brand::find($request['productBrandId']);
            if (!$brand) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Unable to locate brand");

          /*todo check if file exist */
            if (!$request->hasFile('productImage'))
                throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "Invalid image");

            $productImage = $request->file('productImage');
            $fileName = time().'_'.$productImage->getClientOriginalName();

            $productImage->move(public_path('storage/uploads'), $fileName);

            //calculate product discount
            $productDiscount = 0;
            //dd((integer)$validated['productSellingPrice'] !== 0);
            if ((integer)$validated['productOfferPrice'] !== 0 ){
                if ((integer)$validated['productSellingPrice'] == 0)
                    throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG, "selling price is required");

                $cal = (($validated['productSellingPrice'] - $validated['productOfferPrice']) / $validated['productSellingPrice']) * 100;
                $productDiscount =  $cal;
            }
            $response = $category->products()->create(array_merge($request->all(), [
                'productImage'=> URL::asset("storage/uploads/$fileName"),
                "productSlug"=> Str::slug($request['productName'], "_"),
                "productDiscount"=> $productDiscount
            ]));
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, 'unable to create product');

            // SEND NOTIFICATION


            return $this->SUCCESS_RESPONSE("PRODUCT CREATED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function update(UpdateProductRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request);


            $product = Product::find($request['productId']);
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "UNABLE TO LOCATE PRODUCT");
            $response = $product->update(array_merge($request->except('productId'),
                ['productStatus'=>'ACTIVE']));
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            // SEND NOTIFICATION


            return  $this->SUCCESS_RESPONSE("PRODUCT UPDATED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
    public function read(): JsonResponse
    {
        try {
            $products = Product::where("productStatus", "Active")->get();
            if (!$products)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($products);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
    public function readProductOfferPrice(): JsonResponse
    {
        try {
            $products = Product::where('productOfferPrice', '!=', 'NULL')->get();
            if (!$products)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($products);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readById(ReadByProductIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            //todo action
            $product = Product::where('productId', $request['productId'])->first();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($product);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readProductByBrandId(ReadProductByBrandId $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();
            //todo action
            $product = Product::where('productBrandId', $request['productBrandId'])->get();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($product);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readProductByCategoryId(ReadProductByCategoryId $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();
            //todo action
            $product = Product::where('productCategoryId', $request['productCategoryId'])->get();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($product);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function filterProductBySellingPrice(FilterProductBySellingPrice $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();
            //todo action
            $product = Product::where('productSellingPrice', '>' ,$request['productMinSellingPrice'])
                                ->orWhere('productSellingPrice', '<' ,$request['productMinSellingPrice'])->get();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($product);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readByProductVariationId(ReadByProductVariationIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();
            //todo action
            $product = Product::where('productVariationId', $request['productVariationId'])->get();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($product);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function delete(ReadByProductIdRequest $request){
        try {
            //TODO VALIDATION
            $request->validated();

            // verify admin
            $customer = $this->VERIFY_ADMIN($request['productCustomerId']);

            $product = Product::where('productId', $request['productId'])->first();
            if (!$product) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            if (!$product->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);



            return  $this->SUCCESS_RESPONSE("PRODUCT DELETED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

}
