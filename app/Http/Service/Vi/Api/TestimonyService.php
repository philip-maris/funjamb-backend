<?php

namespace App\Http\Service\Vi\Api;

use App\Http\Requests\V1\Api\Testimony\CreateTestimonyRequest;
use App\Http\Requests\V1\Api\Testimony\DeleteTestimonyRequest;
use App\Http\Requests\V1\Api\Testimony\ReadByTestimonyIdRequest;
use App\Models\V1\Customer;
use App\Models\V1\Testimony;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class TestimonyService
{
    use ResponseUtil;

    public function create(CreateTestimonyRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated($request);
            $customer = Customer::find($request['testimonyCustomerId']);
            if (!$customer) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID CUSTOMER ID");

            $testimony = Testimony::create(array_merge($request->all(),
                ['testimonyStatus'=>'ACTIVE']));

            //todo check its successful
            if (!$testimony) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function read(): JsonResponse
    {
        try {
            $testimony = Testimony::all();
            if (!$testimony)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($testimony);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByTestimonyIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $testimony = Testimony::where('testimonyId', $request['testimonyId'])->first();
            if (!$testimony) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($testimony);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function delete(DeleteTestimonyRequest $request){
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            $customer = Customer:: find($request['customerId']);
            if (!$customer | ($customer['isAdmin'])) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID CUSTOMER ID");
            if (!$customer['isAdmin']) throw new ExceptionUtil(ExceptionCase::UNAUTHORIZED, "CUSTOMER IS NOT AN ADMIN OR SUPER ADMIN");
            $testimony = Testimony::where('testimonyId', $request['testimonyId'])->first();
            if (!$testimony) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            if (!$testimony->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);
            //TODO send notification the admin deleted notification


            return  $this->SUCCESS_RESPONSE("COUPON DELETED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
}
