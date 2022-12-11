<?php



//todo public category route
use App\Http\Controllers\V1\Api\CategoriesController;
use Illuminate\Support\Facades\Route;



    Route::controller(CategoriesController::class)
        ->group(function () {
            Route::post('/create-category', 'create');
            Route::post('/update-category', 'update');
            Route::get('/read-categories', 'read');
            Route::post('/read-category-by-id', 'readById');
            Route::post('/delete-category', 'delete');
        });
