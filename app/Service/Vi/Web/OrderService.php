<?php

namespace App\Service\Vi\Web;

use App\Models\V1\Order;

class OrderService
{
    public function index(){
        $order = Order::all();
//        dd($order);
        return view("v1.dash.order.index", ["orders"=>$order]);
    }

    public function edit(){
        return view("v1.order.edit");
    }
}
