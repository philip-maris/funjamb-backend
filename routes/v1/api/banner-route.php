<?php

//todo banner route
use App\Http\Controllers\V1\Api\BannerController;
use Illuminate\Support\Facades\Route;


    Route::controller(BannerController::class)->group(function () {
        Route::get('/read-banners', 'read');
        Route::post('/create-banner', 'create');
        Route::post('/read-banner-by-id', 'readById');
        Route::post('/update-banner', 'update');
    });

