<?php

namespace App\Http\Service;

use App\Http\Requests\Delivery\CreateDeliveryRequest;
use App\Http\Requests\Delivery\ReadByDeliveryIdRequest;
use App\Http\Requests\Delivery\UpdateDeliveryRequest;
use App\Models\Delivery;
use App\Util\baseUtil\IdVerificationUtil;
use App\Util\baseUtil\NotificationUtil;
use App\Util\baseUtil\ResponseUtil;
use App\Util\exceptionUtil\ExceptionCase;
use App\Util\exceptionUtil\ExceptionUtil;
use Exception;
use \Illuminate\Http\JsonResponse;


class DeliveryService
{
    use ResponseUtil;
    use IdVerificationUtil;
    use NotificationUtil;

    public function create(CreateDeliveryRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated($request);

            // verify adnin
            $customer = $this->VERIFY_ADMIN($request['customerId']);

            $testDelivery = Delivery::where('deliveryState', $request['deliveryState'])->first();
            //todo action
            $delivery = Delivery::create([
                'deliveryState'=>$request['deliveryState'],
                'deliveryStatus'=>$request['deliveryStatus'],
                'deliveryFee'=>$request['deliveryFee'],
                'deliveryDescription'=>$request['deliveryDescription']
            ]);

            //todo check its successful
            if (!$delivery) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            // SEND NOTIFICATION
            $this->SEND_CREATION_NOTIFICATION(
                "{$customer['customerFirstName']} " . "{$customer['customerLastName']}",
                $customer['customerId'],$delivery['deliveryState'],'Delivery'
            );
            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function update(UpdateDeliveryRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated($request);

            // verify adnin
            $customer = $this->VERIFY_ADMIN($request['customerId']);

             $delivery = Delivery::where('deliveryId', $request['deliveryId'])->first();
             if (!$delivery) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =    $delivery->update([
                'deliveryState'=>$request['deliveryState'],
                'deliveryStatus'=>$request['deliveryStatus'],
                'deliveryFee'=>$request['deliveryFee'],
                'deliveryDescription'=>$request['deliveryDescription']
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            // SEND NOTIFICATION
            $this->SEND_UPDATE_NOTIFICATION(
                "{$customer['customerFirstName']} " . "{$customer['customerLastName']}",
                $customer['customerId'],$delivery['deliveryState'],'Delivery'
            );

            return $this->SUCCESS_RESPONSE("UPDATE SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }



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
