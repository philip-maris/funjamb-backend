<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class DeliveriesController extends Controller
{
    public function index(){
        return view("v1.dash.delivery.index");
    }
}
