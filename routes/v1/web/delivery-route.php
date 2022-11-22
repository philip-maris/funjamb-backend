<?php


use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/admin/dashboard/deliveries', 'deliveries')->name('deliveries');
    Route::get('/admin/dashboard/add-delivery', 'addDelivery')->name('addDelivery');
});
