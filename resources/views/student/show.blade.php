<x-layout.front title="{{ $student->lastname }} {{ $student->firstname }}">
    <a href="{{ route('student.index') }}">Back to student list</a>
    @can('update', $student)
        <a href="{{ route('student.edit', ['student' => $student]) }}">Edit student</a>
    @endcan
    <table>
        <thead>
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Number</th>
                <th>Formation</th>
                <th>Group</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->number }}</td>
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
                <td>{{ $student->email }}</td>
            </tr>
        </tbody>
    </table>
    @can('delete', $student)
        <form action="{{ route('student.destroy', ['student' => $student]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    @endcan
</x-layout.front>
