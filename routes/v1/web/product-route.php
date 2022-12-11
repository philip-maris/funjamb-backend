<?php

use App\Http\Controllers\V1\Web\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/dashboard/products', 'index')->name('products');
    Route::get('/dashboard/add-product', 'create')->name('addProduct');
    Route::post('/dashboard/store-product', 'store')->name('storeProduct');
    Route::get('/dashboard/update-product/{productId}', 'edit')->name('editProduct');
    Route::post('/dashboard/update-product', 'update')->name('updateProduct');
    Route::get('/dashboard/delete-product/{id}', 'delete')->name('deleteProduct');
});
