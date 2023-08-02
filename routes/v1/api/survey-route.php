<?php

//todo test route
use App\Http\Controllers\V1\Api\SurveyController;
use Illuminate\Support\Facades\Route;

    Route::controller(SurveyController::class)->group(function () {
        Route::post('/submit-survey', 'create');
//        Route::post('/upload-mock', 'create');
//        Route::get('/read-tests', 'read');
//        Route::post('/read-test-by-id', 'readById');
//        Route::post('/read-test/user', 'readByUserId');
    });

