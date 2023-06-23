<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\UsersController::class)->group(function (){
    Route::get('/dashboard/users', 'index')->name('users');
    Route::get('/dashboard/edit-user/{userId}', 'index')->name('editUser');
    Route::get('/dashboard/delete-user/{userId}', 'index')->name('deleteUser');
});
