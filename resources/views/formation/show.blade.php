@extends('app')

@section('title')
<title>{{ $formation->name }}</title>
@endsection

@section('contenu')
<a href="{{ route('formation.index') }}">Back to formation list</a>
<h1>{{ $formation->name }}</h1>
<table>
    <thead>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Number</th>
            <th>Email</th>
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
                <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
