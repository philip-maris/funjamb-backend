<?php

//todo testimony route
use App\Http\Controllers\V1\Api\TestimonyController;
use Illuminate\Support\Facades\Route;



    Route::controller(TestimonyController::class)->group(function () {
        Route::get('/read-testimonies', 'read');
        Route::post('/create-testimony', 'create');
        Route::post('/read-testimony-by-id', 'readById');
    });

