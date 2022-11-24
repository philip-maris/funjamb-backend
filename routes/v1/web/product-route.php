<?php

use App\Http\Controllers\V1\Web\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/dashboard/products', 'index')->name('products');
    Route::get('/dashboard/add-product', 'create')->name('addProduct');
    Route::post('/dashboard/store-product', 'store')->name('storeProduct');
    Route::get('/dashboard/update-product/{id}', 'edit')->name('editProduct');
    Route::get('/dashboard/update-product/', 'update')->name('editProduct');
});
