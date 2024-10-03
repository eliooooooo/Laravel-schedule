<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Formation;
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

    public function create(){
        $formations = Formation::get();
        return view('student.create', ['formations' => $formations]);
    }

    public function store(StudentRequest $request){
        $data = $request->validated();

        $student = new Student();
        $student->fill($data);
        $student->save();

        return redirect()->route('student.create');
    }

    public function show(Student $student) {
        return view('student.show', ['student' => $student]);
    }

    public function edit(Student $student){
        $formations = Formation::get();
        return view('student.edit', ['student' => $student, 'formations' => $formations]);
    }

    public function update(StudentRequest $request, Student $student){
        $data = $request->validated();

        $student->fill($data);
        $student->save();

        return redirect()->route('student.show', ['student' => $student]);
    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('student.index');
    }
}
