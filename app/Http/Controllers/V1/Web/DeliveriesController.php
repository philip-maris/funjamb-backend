<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Delivery\CreateDeliveryRequest;
use App\Http\Requests\V1\Api\Delivery\UpdateDeliveryRequest;
use App\Service\V1\Web\DeliveryService;

class DeliveriesController extends Controller
{
    public function __construct(protected DeliveryService $deliveryService){
        $this->middleware("auth");
    }
    public function index(){
        return $this->deliveryService->index();
    }

    public function show(){
        return $this->deliveryService->show();
    }

    public function store(CreateDeliveryRequest $createDeliveryRequest){
        return $this->deliveryService->store($createDeliveryRequest);
    }

    public function edit($deliveryId){
        return $this->deliveryService->edit($deliveryId);
    }

    public function update(UpdateDeliveryRequest $updateDeliveryRequest){
        return $this->deliveryService->update($updateDeliveryRequest);
    }

}
