<?php

//todo banner route
use App\Http\Controllers\V1\Api\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(BannerController::class)->group(function () {
        Route::get('/read-banners', 'read');
        Route::post('/create-banner', 'create');
        Route::post('/read-banner-by-id', 'readById');
        Route::post('/update-banner', 'update');
    });
});
