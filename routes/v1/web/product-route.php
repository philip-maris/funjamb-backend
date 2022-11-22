<?php

use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/admin/dashboard/products', 'products')->name('products');
    Route::get('/admin/dashboard/add-product', 'addProduct')->name('addProduct');
});
