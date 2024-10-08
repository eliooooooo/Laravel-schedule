<x-layout.front title="Courses">
    @can('create', \App\Models\Course::class)
        <a href="{{ route('course.create') }}">Create a course</a>
    @endcan
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Room</th>
                <th>Group</th>
                <th>Formation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->start }}</td>
                    <td>{{ $course->end }}</td>
                    <td>{{ $course->room }}</td>
                    <td>
                        @if ($course->group)
                            <a href="{{ route('group.show', ['group' => $course->group]) }}">{{ $course->group->name }}</a>
                        @endif
                    </td>
                    <td><a href="{{ route('formation.show', ['formation' => $course->formation]) }}">{{ $course->formation->name }}</a></td>
                    <td><a href="{{ route('course.show', ['course' => $course]) }}">See details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.front>
