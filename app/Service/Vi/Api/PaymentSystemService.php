<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\PaymentSytem\CreatePaymentSystemRequest;
use App\Http\Requests\V1\Api\PaymentSytem\ReadByPaymentSystemIdRequest;
use App\Http\Requests\V1\Api\PaymentSytem\UpdatePaymentSystemRequest;
use App\Models\V1\PaymentSystem;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;

class PaymentSystemService
{
    use ResponseUtil;

    public function create(CreatePaymentSystemRequest $createPaymentSystemRequest){
        try{
            //validated
            $validate = $createPaymentSystemRequest->validated();

            //action
            $paymentSystem = PaymentSystem::create($validate);
            if (!$paymentSystem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            return $this->SUCCESS_RESPONSE("Created successful");
        }catch (Exception $ex){
            return  $this->ERROR_RESPONSE($ex->getMessage());
        }
//        dd();
    }

    public function update(UpdatePaymentSystemRequest $updatePaymentSystemRequest){
        try{
            //validated
            $validate = $updatePaymentSystemRequest->validated();

            //action

            $paymentSystem = PaymentSystem::where("paymentSystemId", $validate['paymentSystemId']);
            if (!$paymentSystem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            $response = $paymentSystem->update($validate);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);
            return $this->SUCCESS_RESPONSE("Updated successful");
        }catch (Exception $ex){
            return  $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function read(){
        try{

            //action

            $paymentSystem = PaymentSystem::latest()->get();
            if (!$paymentSystem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            return $this->BASE_RESPONSE($paymentSystem);
        }catch (Exception $ex){
            return  $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readById(ReadByPaymentSystemIdRequest $readByPaymentSystemIdRequest){
        try{
            //validated
            $validate = $readByPaymentSystemIdRequest->validated();

            //action
            $paymentSystem = PaymentSystem::where("paymentSystemId", $validate['paymentSystemId'])->first();
            if (!$paymentSystem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            return $this->BASE_RESPONSE($paymentSystem);
        }catch (Exception $ex){
            return  $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function delete(ReadByPaymentSystemIdRequest $readByPaymentSystemIdRequest){
        try{
            //validated
            $validate = $readByPaymentSystemIdRequest->validated();

            //action
            $paymentSystem = PaymentSystem::where("paymentSystemId", $validate['paymentSystemId'])->first();
            if (!$paymentSystem) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

            if (!$paymentSystem->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);
            return $this->SUCCESS_RESPONSE("Deleted successful");
        }catch (Exception $ex){
            return  $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
}
