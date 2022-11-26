<?php



//todo public category route
use App\Http\Controllers\V1\Api\CategoriesController;
use Illuminate\Support\Facades\Route;



    Route::controller(CategoriesController::class)
        ->group(function () {
            Route::post('/create-category', 'create')->name('createCategory');
            Route::post('/update-category', 'update')->name('updateCategory');
            Route::get('/read-categories', 'read')->name('readCategory');
            Route::post('/read-category-by-id', 'readById')->name('readByIdCategory');
            Route::post('/delete-category', 'delete')->name('deleteCategory');
        });
