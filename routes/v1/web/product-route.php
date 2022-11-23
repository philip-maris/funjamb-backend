<?php

use App\Http\Controllers\V1\Web\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/dashboard/products', 'index')->name('products');
    Route::get('/dashboard/add-product', 'addProduct')->name('addProduct');
});
