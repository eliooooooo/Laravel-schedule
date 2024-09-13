@extends('app')

@section('title')
<title>{{ $group->name }}</title>
@endsection

@section('contenu')
<a href="{{ route('group.index') }}">Back to groups list</a>
<h1>{{ $group->name }}</h1>
<table>
    <thead>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Number</th>
            <th>Email</th>
            <th>Formations</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($group->students()->with('formation')->orderBy('formation_id')->get() as $student)
            <tr>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->number }}</td>
                <td>{{ $student->email }}</td>
                <td><a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a></td>
                <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
