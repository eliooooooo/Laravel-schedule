<x-layout.front title="Student table">
    @can('create', \App\Models\Student::class)
        <a href="{{ route('student.create') }}">Create a student</a>
    @endcan
    <table>
        <thead>
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Number</th>
                <th>Email</th>
                <th>Formation</th>
                <th>Group</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @if ($student->formation)
                            <a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a>
                        @endif
                    </td>
                    <td>
                        @foreach ($student->groups as $group)
                            <a href="{{ route('group.show', ['group' => $group]) }}">{{ $group->name }}</a>
                        @endforeach
                    </td>
                    <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.front>
