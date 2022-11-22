<?php

//todo cart route
use App\Http\Controllers\V1\Api\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::controller(CartController::class)->group(function () {
        Route::post('/create-cart', 'create');
        Route::post('/read-cart-by-customer', 'readByCustomerId');
        Route::get('/read-carts', 'read');
        Route::post('/update-cart', 'update');
        Route::post('/delete-cart', 'delete');
    });

});
