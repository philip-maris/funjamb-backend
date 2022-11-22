<?php


use App\Http\Controllers\V1\Api\BrandsController;
use Illuminate\Support\Facades\Route;


//todo public brand route


Route::prefix('v1')->group(function () {
    Route::controller(BrandsController::class)
        ->group(function () {
            Route::post('/create-brand', 'create')->name('createBrand');
            Route::post('/update-brand', 'update')->name('updateBrand');
            Route::get('/read-brands', 'read')->name('readBrand');
            Route::post('/read-brand-by-id', 'readById')->name('readByIdBrand');
            Route::post('/delete-brand', 'delete')->name('deleteBrand');
        });
});
