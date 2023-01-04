<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\Subscription\CreateSubscriptionRequest;
use App\Http\Requests\V1\Api\Subscription\ReadBySubscriptionIdRequest;
use App\Models\V1\Subscription;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class SubscriptionService
{
    use ResponseUtil;


    public function create(CreateSubscriptionRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated();
            $testSubscription = Subscription::where('subscriptionCustomerEmail',strtolower($request["subscriptionCustomerEmail"]))->first();
            if ($testSubscription) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE,"CUSTOMER HAS ALREADY SUBSCRIBED");

//            dd(strtolower($request["subscriptionCustomerEmail"]));
            $subscription = Subscription::create([
                "subscriptionCustomerEmail"=>strtolower($request["subscriptionCustomerEmail"])
            ]);
            //todo check its successful
            if (!$subscription) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }


    public function read(): JsonResponse
    {
        try {
            $subscription = Subscription::all();
            if (!$subscription) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($subscription);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadBySubscriptionIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $subscription = Subscription::where('subscriptionId', $request['subscriptionId'])->first();
            if (!$subscription) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($subscription);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

}
