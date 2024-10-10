<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Formation;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'start' => 'nullable|date',
            'end'   => 'nullable|date|after_or_equal:start',
            'formation'      => 'nullable|integer|exists:formations,id',
            'groups'     => 'nullable|array',
            'groups.*'   => 'integer|exists:groups,id',
            'student'    => 'nullable|integer|exists:students,id',
        ]);

        $courses = Course::with(['formation', 'group'])
            ->orderBy('start')
            ->orderBy('end')
            ->when(
                $filters['start'] ?? null,
                fn(Builder $query): Builder => $query
                    ->where(fn(Builder $query) => $query
                        ->whereDate('start', '>=', $filters['start'])
                        ->orWhere(
                            fn(Builder $query): Builder => $query->whereDate('end', '>=', $filters['start'])
                                ->whereDate('start', '<=', $filters['start'])
                        ))
            )
            ->when(
                $filters['end'] ?? null,
                fn(Builder $query): Builder => $query
                    ->where(
                        fn(Builder $query): Builder => $query
                            ->whereDate('end', '<=', $filters['end'])
                            ->orWhere(
                                fn(Builder $query): Builder => $query->whereDate('end', '>=', $filters['end'])
                                    ->whereDate('start', '<=', $filters['end'])
                            )
                    )
            )
            ->when(
                $filters['formation'] ?? null,
                fn(Builder $query): Builder => $query
                    ->where('formation_id', '=', $filters['formation'])
            )
            ->when(
                !empty($filters['groups']),
                fn(Builder $query): Builder => $query
                    ->whereIn('group_id', $filters['groups'])
            )
            ->when(
                $filters['student'] ?? null,
                fn(Builder $query): Builder => $query
                    ->whereHas(
                        'group.students',
                        fn(Builder $query): Builder => $query
                            ->where('id', '=', $filters['student']),
                    )
                    ->whereHas(
                        'formation.students',
                        fn(Builder $query): Builder => $query
                            ->where('id', '=', $filters['student']),
                    )
            )
            ->get();

        return view('schedule.index', [
            'formations' => Formation::orderBy('name')->get(),
            'groups'  => Group::orderBy('name')->get(),
            'students'  => Student::orderBy('lastname')->orderBy('firstname')->get(),
            'filters' => $filters,
            'courses' => $courses,
        ]);
    }
}
