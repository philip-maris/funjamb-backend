<?php


use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\OrderController::class)->group(function (){
    Route::get('/dashboard/orders', 'index')->name('orders');
    Route::get('/dashboard/edit-order/{orderId}', 'edit')->name('editOrder');
    Route::post('/dashboard/edit-order', 'update')->name('editOrder');
    Route::get('/dashboard/delete-order/{orderId}', 'delete')->name('deleteOrder');
});

