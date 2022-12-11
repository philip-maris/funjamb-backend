<?php


use App\Http\Controllers\V1\Api\PaymentSystemController;
use Illuminate\Support\Facades\Route;

Route::controller(PaymentSystemController::class)
    ->group(function () {
        Route::post('/create-payment-system', 'create');
        Route::post('/update-payment-system', 'update');
        Route::post('/read-by-payment-system-id', 'readById');
        Route::get('/read-payment-systems', 'read');
        Route::post('/delete-payment-system', 'delete');
    });
