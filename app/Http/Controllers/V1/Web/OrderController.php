<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Models\V1\Order;
use App\Service\Vi\Web\OrderService;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {
        $this->middleware("auth");
    }

    public function index(){

        return $this->orderService->index();
    }

    public function edit(){
        return $this->orderService->edit();
    }
}
