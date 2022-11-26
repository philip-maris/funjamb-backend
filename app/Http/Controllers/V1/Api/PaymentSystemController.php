<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\PaymentSytem\CreatePaymentSystemRequest;
use App\Http\Requests\V1\Api\PaymentSytem\ReadByPaymentSystemIdRequest;
use App\Http\Requests\V1\Api\PaymentSytem\UpdatePaymentSystemRequest;
use App\Service\Vi\Api\PaymentSystemService;

class PaymentSystemController extends Controller
{
    public function __construct(protected PaymentSystemService $paymentSystemService){

    }

    public function create(CreatePaymentSystemRequest $request){
        return $this->paymentSystemService->create($request);
    }

    public function update(UpdatePaymentSystemRequest $request){
        return  $this->paymentSystemService->update($request);
    }

    public function read(){
        return $this->paymentSystemService->read();
    }

    public function readById(ReadByPaymentSystemIdRequest $request){
       return $this->paymentSystemService->readById($request);
    }

    public function delete(ReadByPaymentSystemIdRequest $request){
        return $this->paymentSystemService->delete($request);
    }
}
