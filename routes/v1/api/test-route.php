<?php

//todo test route
use App\Http\Controllers\V1\Api\TestController;
use Illuminate\Support\Facades\Route;

    Route::controller(TestController::class)->group(function () {
        Route::post('/upload-result', 'create');
        Route::get('/read-tests', 'read');
        Route::post('/read-test-by-id', 'readById');
        Route::post('/read-test/user', 'readByUserId');
    });

