<?php

//todo public authentication route
use App\Http\Controllers\V1\Api\AuthenticationsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthenticationsController::class)
        ->group(function () {
            Route::post('/initiate-enrollment', 'initiateEnrollment');
            Route::post('/complete-enrollment', 'completeEnrollment');
            Route::post('/initiate-forgotten-password', 'initiateForgottenPassword');
            Route::post('/complete-forgotten-password', 'completeForgottenPassword');
            Route::post('/login', 'login');
            Route::post('/resend-otp', 'resendOtp');
        });


//todo protected routes
    Route::middleware('auth:sanctum')->group(function () {
        //todo authentication protected route
        Route::controller(AuthenticationsController::class)
            ->group(function () {
                Route::post('/change-password', 'changePassword');
                Route::post('/change-password', 'changePassword');
            });

    });

});
