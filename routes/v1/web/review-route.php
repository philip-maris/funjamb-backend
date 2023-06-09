<?php


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\ReviewController::class)->group(function (){
    Route::get('/dashboard/banners', 'banners')->name('banners');
    Route::get('/dashboard/add-banner', 'add-banner')->name('addBanner');
    Route::get('/dashboard/edit-banner/{bannerId}', 'add-banner')->name('addBanner');
    Route::get('/dashboard/delete-banner/{bannerId}', 'add-banner')->name('addBanner');
});
