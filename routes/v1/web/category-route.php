<?php

use App\Http\Controllers\V1\Web\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoriesController::class)->group(function (){
    Route::get('/dashboard/categories', 'index')->name('categories');
    Route::get('/dashboard/create-category', 'show')->name('addCategory');
    Route::post('/dashboard/create-category', 'create')->name('addCategory');
    Route::get('/dashboard/edit-category/{categoryId}', 'edit')->name('editCategory');
    Route::post('/dashboard/edit-category', 'update')->name('updateCategory');
    Route::get('/dashboard/delete-category/{categoryId}', 'delete')->name('deleteCategory');
});

