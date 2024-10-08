<x-layout.front title="{{ $course->name }}">
    <div>
        <h1>Course : {{ $course->name }}</h1>
        <p>The {{ $course->start->format('D n M Y') }} from {{ $course->start->format('H:i') }} to {{ $course->end->format('H:i') }}</p>
        <p>Room : {{ $course->room }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Number</th>
                <th>Email</th>
                <th>Group</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course->students() as $student)
                <tr>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('group.show', ['group' => $course->group]) }}">{{ $course->group->name }}</a>
                    </td>
                    <td><a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a></td>
                    <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @can('update', $course)
        <a href="{{ route('course.edit', ['course' => $course]) }}">Edit</a>
    @endcan
    @can('delete', $course)
        <form action="{{ route('course.destroy', ['course'=> $course]) }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endcan
</x-layout.front>
