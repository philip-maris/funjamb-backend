<?php



//todo public user route
use App\Http\Controllers\V1\Api\UsersController;
use Illuminate\Support\Facades\Route;



    Route::controller(UsersController::class)->group(function () {
        Route::get('/read-user', 'read');
        Route::post('/read-user-by-id', 'readById');
        Route::post('/extra-points', 'addPoint');
    });


//todo protected routes
    Route::middleware('auth:sanctum')->group(function () {
        //todo user protected route
        Route::controller(UsersController::class)->group(function () {
            Route::post('/update-user', 'update');
            Route::post('/read-user-revalidate', 'revalidate');
        });

    });


