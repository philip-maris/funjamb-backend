<?php


use App\Http\Controllers\V1\Api\ProductsController;
use App\Http\Controllers\V1\Web\DeliveriesController;
use Illuminate\Support\Facades\Route;

Route::controller(DeliveriesController::class)->group(function (){
    Route::get('/dashboard/deliveries', 'index')->name('deliveries');
    Route::get('/dashboard/add-delivery', 'show')->name('addDelivery');
    Route::post('/dashboard/add-delivery', 'store')->name('addDelivery');
    Route::get('/dashboard/edit-delivery/{deliveryId}', 'addDelivery')->name('editDelivery');
    Route::get('/dashboard/edit-delivery', 'addDelivery')->name('editDelivery');
    Route::get('/dashboard/delete-delivery/{deliveryId}', 'deleteDelivery')->name('deleteDelivery');
});
