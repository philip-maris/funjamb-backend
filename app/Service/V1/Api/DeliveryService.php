<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\Delivery\CreateDeliveryRequest;
use App\Http\Requests\V1\Api\Delivery\ReadByDeliveryIdRequest;
use App\Http\Requests\V1\Api\Delivery\UpdateDeliveryRequest;
use App\Models\V1\Delivery;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class DeliveryService
{
    use ResponseUtil;

    public function read(): JsonResponse
    {
        try {
            $delivery = Delivery::all();
            if (!$delivery)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($delivery);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByDeliveryIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $delivery = Delivery::where('deliveryId', $request['deliveryId'])->first();
            if (!$delivery) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($delivery);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
