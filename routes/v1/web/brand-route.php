<?php


use App\Http\Controllers\V1\Api\ProductsController;
use App\Http\Controllers\V1\Web\BrandsController;
use Illuminate\Support\Facades\Route;

Route::controller(BrandsController::class)->group(function (){
    Route::get('/dashboard/brands', 'index')->name('brands');
});

