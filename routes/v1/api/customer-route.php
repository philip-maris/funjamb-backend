<?php



//todo public customer route
use App\Http\Controllers\V1\Api\CustomersController;
use Illuminate\Support\Facades\Route;



    Route::controller(CustomersController::class)->group(function () {
        Route::get('/read-customer', 'read');
        Route::post('/read-customer-by-id', 'readById');


    });


//todo protected routes
    Route::middleware('auth:sanctum')->group(function () {
        //todo customer protected route
        Route::controller(CustomersController::class)->group(function () {
            Route::post('/update-customer', 'update');
            Route::post('/read-customer-revalidate', 'revalidate');
        });

    });


