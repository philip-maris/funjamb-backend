<?php


use App\Http\Controllers\V1\Api\PaymentsController;
use Illuminate\Support\Facades\Route;

Route::controller(PaymentsController::class)
    ->group(function () {
        Route::post('/create-payment', 'create');
        Route::post('/update-payment', 'update');
        Route::get('/read-payments', 'read');
        Route::post('/delete-payment', 'delete');
    });
