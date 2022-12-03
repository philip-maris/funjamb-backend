<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Service\Vi\Web\PaymentSystemService;

class PaymentSystemController extends Controller
{
    public function __construct(protected PaymentSystemService $paymentSystemService){
        $this->middleware("auth");
    }

    public function index(){
        return $this->paymentSystemService->index();
    }

    public function show(){
        return $this->paymentSystemService->show();
    }
}
