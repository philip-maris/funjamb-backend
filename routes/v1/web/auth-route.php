<?php


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\AuthenticationsController::class)->group(function (){
    Route::get('/login', 'view_login')->name('login');
    Route::post('/login', 'login')->name('login');
});

Route::get("/", function (){
    return redirect("/login");
});
