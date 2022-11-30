<?php


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\AuthenticationsController::class)->group(function (){
    Route::get('/dashboard/auth', 'index')->name('categories');
});

