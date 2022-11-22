<?php

//todo transaction route
use App\Http\Controllers\V1\Api\TransactionController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/read-transactions', 'read');
        Route::post('/create-transaction', 'create');
        Route::post('/read-transaction-by-id', 'readById');
    });
});
