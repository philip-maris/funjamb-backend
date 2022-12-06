<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\BannerTypeController::class)->group(function (){
    Route::get('/dashboard/type-banners', 'banners')->name('banner-type');
    Route::get('/dashboard/add-type-banners', 'add-banner')->name('add-banner-type');
    Route::get('/dashboard/edit-type-banners/{type-bannerId}', 'add-banner')->name('add-banner-type');
    Route::get('/dashboard/delete-type-banners/{type-bannerId}', 'add-banner')->name('add-banner-type');
});
