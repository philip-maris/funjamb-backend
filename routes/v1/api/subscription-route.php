<?php

//todo subscription route
use App\Http\Controllers\V1\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('/read-subscriptions', 'read');
        Route::post('/create-subscription', 'create');
        Route::post('/read-subscription-by-id', 'readById');
        Route::post('/read-customer-subscription', 'readByCustomerId');
    });
});
