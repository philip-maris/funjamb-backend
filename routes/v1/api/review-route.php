<?php

//todo review route
use App\Http\Controllers\V1\Api\ReviewController;
use Illuminate\Support\Facades\Route;


    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(ReviewController::class)->group(function () {
            Route::get('/read-reviews', 'read');
            Route::post('/create-review', 'create');
            Route::post('/read-review-by-id', 'readById');
            Route::post('/read-product-review', 'readByProductId');
        });
    });

