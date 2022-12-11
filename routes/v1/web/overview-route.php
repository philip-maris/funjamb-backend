<?php


use App\Http\Controllers\V1\Web\OverviewsController;
use Illuminate\Support\Facades\Route;

Route::controller(OverviewsController::class)->group(function (){
    Route::get('/dashboard/overview', 'index')->name('overview');
});
