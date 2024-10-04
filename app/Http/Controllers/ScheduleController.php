<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\ScheduleRequest;
use App\Models\Course;
use App\Models\Formation;
use App\Models\Group;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index($filters = [])
    {
        if(count($filters) > 0) {
            $courses = Course::where('start', '>=', $filters['start'])
                ->where('formation_id', $filters['formation_id'])
                ->where('group_id', $filters['group_id'])
                ->where('room', 'like', "%{$filters['room']}%")
                ->orderBy('start')
                ->get();
        } else {
            $start = now();
            $end = now()->addDays(7);

            $courses = Course::whereBetween('start', [$start, $end])
            ->orderBy('start')
            ->get();
        }

        $formations = Formation::get();
        $groups = Group::get();


        return view('schedule', ['courses' => $courses, 'formations' => $formations, 'groups' => $groups]);
    }

    public function store(ScheduleRequest $request)
    {
        $data = $request->validated();

        return redirect()->route('schedule.index', ['filters' => $data]);
    }

    public function show(Course $course)
    {
        return view('schedule.show', ['course' => $course]);
    }
}
