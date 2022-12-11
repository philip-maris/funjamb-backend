<?php

namespace App\Service\Vi\Web;

use App\Models\V1\PaymentSystem;

class PaymentSystemService
{
    public function index(){

        $paymentSystem = PaymentSystem::all();
        return view("v1.dash.paymentSystem.index",["paymentSystems"=>$paymentSystem]);
    }

    public function show(){
        return view("v1.dash.paymentSystem.add");
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
