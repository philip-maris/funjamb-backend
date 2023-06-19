<?php



//todo public user route
use App\Http\Controllers\V1\Api\PrepUsersController;
use Illuminate\Support\Facades\Route;



    Route::controller(PrepUsersController::class)->group(function () {
        Route::get('/read-user', 'read');
        Route::post('/read-user-by-id', 'readById');
    });


//todo protected routes
//    Route::middleware('auth:sanctum')->group(function () {
//        //todo user protected route
        Route::controller(PrepUsersController::class)->group(function () {
            Route::post('/update-user', 'update');
            Route::post('/read-user-revalidate', 'revalidate');
        });

//    });


