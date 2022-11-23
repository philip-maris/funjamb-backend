<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    public function index(){
        return view("v1.dash.customer.index");
    }
}
