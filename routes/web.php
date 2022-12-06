<?php

require "v1/web/auth-route.php";
require "v1/web/customer-route.php";
require "v1/web/staff-route.php";
require "v1/web/payment-system-route.php";
require "v1/web/brand-route.php";
require "v1/web/product-route.php";
require "v1/web/delivery-route.php";
require "v1/web/artisan-command-route.php";
require "v1/web/order-route.php";
require "v1/web/overview-route.php";
require "v1/web/category-route.php";

\Illuminate\Support\Facades\Route::get('/test', function (){
    return view('v1.layout.email-layout');
});
