<?php


use App\Http\Controllers\V1\Api\ProductsController;
use App\Http\Controllers\V1\Web\BrandsController;
use Illuminate\Support\Facades\Route;

Route::controller(BrandsController::class)->group(function (){
    Route::get('/dashboard/brands', 'index')->name('brands');
    Route::get('/dashboard/add-brand', 'show')->name('addBrand');
    Route::post('/dashboard/add-brand', 'create')->name('addBrand');
    Route::get('/dashboard/edit-brand/{brandId}', 'edit')->name('editBrand');
    Route::post('/dashboard/edit-brand', 'update')->name('updateBrand');
    Route::get('/dashboard/delete-brand/{brandId}', 'delete')->name('deleteBrand');
});

