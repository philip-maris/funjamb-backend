<?php

use App\Http\Controllers\V1\Web\BannerController;
use Illuminate\Support\Facades\Route;

Route::controller(BannerController::class)->group(function (){
    Route::get('/dashboard/banners', 'index')->name('banners');
    Route::get('/dashboard/add-banner', 'create')->name('addBanner');
    Route::post('/dashboard/add-banner', 'store')->name('storeBanner');
    Route::get('/dashboard/edit-banner/{bannerId}', 'edit')->name('editBanner');
    Route::post('/dashboard/edit-banner', 'update')->name('editBanner');
    Route::get('/dashboard/delete-banner/{bannerId}', 'add-banner')->name('deleteBanner');
});
