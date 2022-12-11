<?php

//todo run command
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/artisan/{command}', function($command){
    //todo check if its migrate  command
    if($command == 'migrate')
        $output = ['--force'=>true];
    else
        $output = [];

    Artisan::call($command, $output);
    dd(Artisan::output());
});
