<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::orderBy('start')
        ->with('formation', 'group')
        ->get();
        return view('course.index', ['courses' => $courses]);
    }

    public function show(Course $course) {
        return view('course.show', ['course' => $course]);
    }
}
