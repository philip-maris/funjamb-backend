<?php


use App\Http\Controllers\V1\Api\ProductsController;
use App\Http\Controllers\V1\Web\DeliveriesController;
use Illuminate\Support\Facades\Route;

Route::controller(DeliveriesController::class)->group(function (){
    Route::get('/dashboard/deliveries', 'deliveries')->name('deliveries');
    Route::get('/dashboard/add-delivery', 'addDelivery')->name('addDelivery');
});
