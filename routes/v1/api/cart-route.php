<?php

//todo cart route
use App\Http\Controllers\V1\Api\CartController;
use Illuminate\Support\Facades\Route;





    //todo protected routes
    Route::middleware('auth:sanctum')->group(function () {

        Route::controller(CartController::class)
            ->group(function () {
                Route::post('/create-cart', 'create');
                Route::post('/delete-cart', 'delete');
                Route::post('/update-cart', 'update');
                Route::post('/read-cart-by-customer', 'readByCustomerId');
                Route::get('/read-carts', 'read');
            });

    });

