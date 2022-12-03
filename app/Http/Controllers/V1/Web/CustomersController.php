<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Models\V1\Customer;

class CustomersController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
        $customers = Customer::all();
        return view("v1.dash.customer.index", ["customers"=>$customers]);
    }
}
