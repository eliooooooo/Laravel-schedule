<x-layout.front title="{{ $formation->name }}">
    <a href="{{ route('formation.index') }}">Back to formation list</a>
    <h1>{{ $formation->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Number</th>
                <th>Email</th>
                <th>Group</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formation->students as $student)
                <tr>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->email }}</td>
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

    <a href="{{ route('formation.edit', ['formation' => $formation]) }}">Edit</a>
    <form action="{{ route('formation.destroy', ['formation'=> $formation]) }}" method="POST">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>
</x-layout.front>
