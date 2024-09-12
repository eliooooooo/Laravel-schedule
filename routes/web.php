<?php

use App\Http\Controllers\FormationController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/formation', [FormationController::class, 'index'])->name('formation.index');
Route::get('/formation/{formation}', [FormationController::class, 'show'])->name('formation.show');
