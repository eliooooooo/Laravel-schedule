<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function index() {
        Gate::authorize('viewAny', Course::class);

        $courses = Course::orderBy('start')
        ->with('formation', 'group')
        ->get();
        return view('course.index', ['courses' => $courses]);
    }

    public function create(){
        Gate::authorize('create', Course::class);

        $formations = Formation::get();
        return view('course.create', ['formations' => $formations]);
    }

    public function store(CourseRequest $request){
        Gate::authorize('create', Course::class);

        $data = $request->validated();

        $course = new Course();
        $course->fill($data);
        $course->save();
        return redirect()->route('course.show', ['course' => $course]);
    }

    public function show(Course $course) {
        Gate::authorize('view', $course);

        return view('course.show', ['course' => $course]);
    }

    public function edit(Course $course){
        Gate::authorize('update', $course);

        $formations = Formation::get();
        return view('course.edit', ['formations' => $formations, 'course' => $course]);
    }

    public function update(CourseRequest $request, Course $course){
        Gate::authorize('update', $course);

        $data = $request->validated();

        $course->fill($data);
        $course->save();
        return redirect()->route('course.show', ['course' => $course]);
    }

    public function destroy(Course $course){
        Gate::authorize('delete', $course);

        $course->delete();
        return redirect()->route('course.index');
    }
}
