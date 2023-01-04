<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Api\Delivery\CreateDeliveryRequest;
use App\Models\V1\Delivery;

class DeliveryService
{
 public function index(){
     $delivery = Delivery::all();
     return view("v1.dash.delivery.index", ['deliveries'=>$delivery]);
 }

 public function show(){
     return view("v1.dash.delivery.add");
 }

 public function store(CreateDeliveryRequest $createDeliveryRequest){
     $createDeliveryRequest->validated();

     $dalivery = Delivery::create($createDeliveryRequest->all());
     if (!$dalivery){
         alert("error", "delivery created not successful", "error");

         return back();
     }
     alert("success", "delivery created  successful", "success");

     return back();
 }

 public function edit($deliveryId){
     $delivery = Delivery::find($deliveryId);

     if (!$delivery){
         alert("", "can't find delivery", "error");
         return back();
     }
//     dd($delivery);
     return view("v1.dash.delivery.edit", compact("delivery"));
 }

}
