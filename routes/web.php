<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Models\Formation;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.front');
})->name('front');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/formation', [FormationController::class, 'index'])->name('formation.index');
Route::get('/formation/create', [FormationController::class, 'create'])->name('formation.create');
Route::post('/formation/store', [FormationController::class, 'store'])->name('formation.store');
Route::get('/formation/{formation}', [FormationController::class, 'show'])->name('formation.show');

Route::get('/group', [GroupController::class, 'index'])->name('group.index');
Route::get('/group/{group}', [GroupController::class, 'show'])->name('group.show');

Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');
