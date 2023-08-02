<?php


Route::prefix('v1')->group(function () {
    require "v1/api/auth-route.php";
    require "v1/api/user-route.php";
    require "v1/api/question-route.php";
    require "v1/api/test-route.php";
    require "v1/api/survey-route.php";
});

// prep routes
Route::prefix('prep')->group(function () {
    require "prep/api/auth-route.php";
    require "prep/api/user-route.php";
    require "prep/api/question-route.php";
});


