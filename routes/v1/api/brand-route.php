<?php


use App\Http\Controllers\V1\Api\BrandsController;
use Illuminate\Support\Facades\Route;


//todo public brand route



    Route::controller(BrandsController::class)
        ->group(function () {
            Route::post('/create-brand', 'create');
            Route::post('/update-brand', 'update');
            Route::get('/read-brands', 'read');
            Route::post('/read-brand-by-id', 'readById');
            Route::post('/delete-brand', 'delete');
        });

