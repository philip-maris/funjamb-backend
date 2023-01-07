<?php


Route::prefix('v1')->group(function () {
    require "v1/api/auth-route.php";
    require "v1/api/customer-route.php";
    require "v1/api/product-route.php";
    require "v1/api/brand-route.php";
    require "v1/api/banner-route.php";
    require "v1/api/category-route.php";
    require "v1/api/cart-route.php";
    require "v1/api/delivery-route.php";
    require "v1/api/order-route.php";
    require "v1/api/testimony-route.php";
    require "v1/api/review-route.php";
    require "v1/api/subscription-route.php";
    require "v1/api/wishlist-route.php";
    require "v1/api/payment-route.php";
    require "v1/api/payment-system-route.php";
    require "v1/api/coupon-route.php";
});


