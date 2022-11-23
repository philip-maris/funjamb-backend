<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(){
        return view("v1.dash.product.index");
    }
}
