<?php

//todo coupon route
use App\Http\Controllers\V1\Api\CouponController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::controller(CouponController::class)->group(function () {
        Route::get('/read-coupons', 'read');
        Route::post('/read-coupon-by-id', 'readById');
        Route::post('/create-coupon', 'create');
        Route::post('/read-by-coupon-code', 'readByCouponCode');
        Route::post('/update-coupon', 'update');
        Route::post('/delete-coupon', 'delete');
    });

});
