<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('lastname')->orderBy('firstname')
        ->with('formation', 'groups')
        ->get();
        return view('student.index', ['students' => $students]);
    }

    public function show(Student $student) {
        return view('student.show', ['student' => $student]);
    }
}
