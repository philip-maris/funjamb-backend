<?php

//todo question route
use App\Http\Controllers\Prep\Api\QuestionController;
use Illuminate\Support\Facades\Route;


    Route::controller(QuestionController::class)->group(function () {
        Route::get('/read-questions', 'read');
        Route::post('/read-question-by-course', 'readQuestionByCourseCode');
        Route::post('/new-question', 'create');
        Route::post('/new-comprehension', 'createComprehension');
    });

