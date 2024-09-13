@extends('app')

@section('title')
<title>{{ $course->name }}</title>
@endsection

@section('contenu')
<div>
    <h1>Course : {{ $course->name }}</h1>
    <p>{{ $course->start }} - {{ $course->end }}</p>
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
        @foreach ($course->group->students as $student)
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
                <td><a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a></td>
                <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
