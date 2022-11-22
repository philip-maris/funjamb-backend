<?php


//todo order route
use App\Http\Controllers\V1\Api\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::controller(OrderController::class)->group(function () {
        Route::get('/read-orders', 'read');
        Route::post('/create-order', 'create');
        Route::post('/read-order-by-id', 'readById');
        Route::post('/update-order', 'update');
    });
});
