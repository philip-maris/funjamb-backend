<?php

//todo public authentication route
use App\Http\Controllers\Prep\Api\AuthenticationsController;
use Illuminate\Support\Facades\Route;


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
        //todo authentication protected route
        Route::controller(AuthenticationsController::class)
            ->group(function () {
                Route::post('/change-password', 'changePassword');
                Route::post('/change-password', 'changePassword');
            });

//    });


