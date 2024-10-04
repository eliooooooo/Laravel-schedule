<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('layouts.front');
})->name('front');

Route::resource('student', StudentController::class);
Route::resource('formation', FormationController::class);
Route::resource('course', CourseController::class);

Route::get('/group', [GroupController::class, 'index'])->name('group.index');
Route::get('/group/{group}', [GroupController::class, 'show'])->name('group.show');

// Route::get('/course', [CourseController::class, 'index'])->name('course.index');
// Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
// Route::post('/course', [CourseController::class, 'store'])->name('course.store');
// Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');
// Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
// Route::put('/course/{course}', [CourseController::class, 'update'])->name('course.update');

