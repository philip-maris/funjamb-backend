<?php


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\AuthenticationsController::class)->group(function (){
    Route::get('/login', 'view_login')->name('login');
    Route::post('/login', 'login')->name('login');
//    Route::get('/funjamb/policy', 'view_policy')->name('policy');
});
Route::controller(\App\Http\Controllers\V1\Web\AdminsController::class)->group(function (){
    Route::get('/funjamb/policy', 'view_policy')->name('policy');
    Route::get('/funjamb/delete-request', 'view_delete')->name('delete');
});

Route::get("/", function (){
    return redirect("/login");
});
