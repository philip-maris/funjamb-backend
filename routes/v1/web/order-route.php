<?php


use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/dashboard/orders', 'index')->name('orders');
});

