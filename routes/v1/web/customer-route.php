<?php

use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function (){
    Route::get('/admin/dashboard/customers', 'customers')->name('customers');
});
