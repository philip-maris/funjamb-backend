<?php

//todo question route
use App\Http\Controllers\V1\Api\QuestionController;
use Illuminate\Support\Facades\Route;


    Route::controller(QuestionController::class)->group(function () {
        Route::get('/read-questions', 'read');
        Route::post('/read-question-by-type', 'readQuestionByType');
        Route::post('/new-question', 'create');
        Route::post('/new-comprehension', 'createComprehension');
    });

