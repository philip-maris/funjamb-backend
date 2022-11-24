<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\Customer\ReadByCustomerIdRequest;
use App\Http\Requests\V1\Api\Customer\UpdateCustomerRequest;
use App\Models\V1\Customer;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class CustomerService
{
    use ResponseUtil;

    public function update(UpdateCustomerRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated($request);
            //todo action
             $customer = Customer::where('customerEmail', $request['customerEmail'])->first();
             if (!$customer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =    $customer->update([
                'customerFirstName'=>$request['customerFirstName'],
                'customerLastName'=>$request['customerLastName'],
                'customerPhoneNo'=>$request['customerPhoneNo'],
                'customerEmail'=>$request['customerEmail'],
                'customerAddress'=>$request['customerAddress'],
                'customerState'=>$request['customerState'],
                'customerStatus'=>"Active"
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            return $this->SUCCESS_RESPONSE("UPDATE SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }



    public function read(): JsonResponse
    {
        try {
            $customer = Customer::all();
            if (!$customer)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($customer);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function revalidate(): JsonResponse
    {
        try {
            $customer = Customer::where('customerId', auth('sanctum')->user()["customerId"])->first();
//            dd($customer);
            if (!$customer)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($customer);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByCustomerIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $customer = Customer::where('customerId', $request['customerId'])->first();
            if (!$customer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($customer);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
