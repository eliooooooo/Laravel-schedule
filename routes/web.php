<?php

use App\Models\Student;
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

Route::get('/student', function(){
    $students = Student::orderBy('lastname')->orderBy('firstname')->get();
    return view('student.index', ['students' => $students]);
});
