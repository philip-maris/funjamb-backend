<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\CustomersController::class)->group(function (){
    Route::get('/dashboard/customers', 'index')->name('customers');
});
