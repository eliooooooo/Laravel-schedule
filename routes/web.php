<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return view('test');
});

Route::get('/greeting/{name}', function(string $name){
    return view('greeting', ['name' => $name]);
});
