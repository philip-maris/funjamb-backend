<?php

use App\Http\Controllers\V1\Web\CategoriesController;

Route::controller(CategoriesController::class)->group(function (){
    Route::get('/dashboard/categories', 'index')->name('categories');
});
