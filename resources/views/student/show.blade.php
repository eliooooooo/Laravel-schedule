@extends('app')

@section('title')
<title>{{ $student->lastname }} {{ $student->firstname }}</title>
@endsection

@section('contenu')
<a href="{{ route('student.index') }}">Back to student list</a>
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
            <td><a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a></td>
            <td>
                @foreach ($student->groups as $group)
                    <a href="{{ route('group.show', ['group' => $group]) }}">{{ $group->name }}</a>
                @endforeach
            </td>
            <td>{{ $student->email }}</td>
        </tr>
    </tbody>
</table>
@endsection
