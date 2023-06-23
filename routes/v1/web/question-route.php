<?php


use App\Http\Controllers\V1\Web\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::controller(QuestionsController::class)->group(function (){
    Route::get('/dashboard/questions', 'index')->name('questions');
    Route::get('/dashboard/add-question', 'show')->name('addQuestion');
    Route::post('/dashboard/create-question', 'create')->name('createQuestion');
    Route::get('/dashboard/get-question/{questionId}', 'edit')->name('editQuestion');
    Route::post('/dashboard/edit-question', 'update')->name('updateQuestion');
    Route::get('/dashboard/delete-question/{questionId}', 'delete')->name('deleteQuestion');
});

