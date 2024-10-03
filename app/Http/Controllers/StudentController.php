<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        $data = $request->validate([
            "lastname" => "required|string",
            "firstname" => "required|string",
            "number" => "required|numeric",
            "email" => "required|email",
            "formation_id" => "required|numeric"
        ]);

        $student = new Student();
        $student->fill($data);
        // $student->lastname = $data["lastname"];
        // $student->firstname = $data["firstname"];
        // $student->number = $data["number"];
        // $student->email = $data["email"];
        // $student->formation_id = $data["formation_id"];
        $student->save();

        return redirect()->route('student.create');
    }

    public function show(Student $student) {
        return view('student.show', ['student' => $student]);
    }
}
