<?php


use App\Http\Controllers\V1\Api\ProductsController;
use App\Http\Controllers\V1\Web\DeliveriesController;
use Illuminate\Support\Facades\Route;

Route::controller(DeliveriesController::class)->group(function (){
    Route::get('/dashboard/deliveries', 'index')->name('deliveries');
    Route::get('/dashboard/add-delivery', 'show')->name('addDelivery');
    Route::post('/dashboard/add-delivery', 'store')->name('addDelivery');
    Route::get('/dashboard/edit-delivery/{deliveryId}', 'edit')->name('editDelivery');
    Route::post('/dashboard/edit-delivery', 'addDelivery')->name('editDeliver');
    Route::get('/dashboard/delete-delivery/{deliveryId}', 'deleteDelivery')->name('deleteDelivery');
});
