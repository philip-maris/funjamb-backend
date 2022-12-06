<?php


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\V1\Web\StaffController::class)->group(function (){
    Route::get('/dashboard/staffs', 'index')->name('staffs');
    Route::get('/dashboard/create-staff', 'show')->name('createStaff');
    Route::post('/dashboard/create-staff', 'create')->name('createStaff');
    Route::get('/dashboard/edit-Staff/{staffId}', 'edit')->name('editStaff');
    Route::get('/dashboard/delete-Staff/{staffId}', 'delete')->name('deleteStaff');
});

