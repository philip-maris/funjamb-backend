<?php


//todo delivery route
use App\Http\Controllers\V1\Api\DeliveryController;
use Illuminate\Support\Facades\Route;



    Route::controller(DeliveryController::class)->group(function () {
        Route::get('/read-delivery', 'read');
        Route::post('/create-delivery', 'create');
        Route::post('/read-delivery-by-id', 'readById');
        Route::post('/update-delivery', 'update');
    });

