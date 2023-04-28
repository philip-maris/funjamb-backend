<?php


Route::prefix('v1')->group(function () {
    require "v1/api/auth-route.php";
    require "v1/api/user-route.php";
    require "v1/api/question-route.php";
    require "v1/api/test-route.php";
});


