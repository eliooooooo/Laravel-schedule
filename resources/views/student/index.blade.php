@extends('app')

@section('title')
<title>Student table</title>
@endsection

@section('contenu')
<table>
    <thead>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Number</th>
            <th>Email</th>
            <th>Formation</th>
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
                <td><a href="{{ route('formation.show', ['formation' => $student->formation]) }}">{{ $student->formation->name }}</a></td>
                <td><a href="{{ route('student.show', ['student' => $student]) }}">See details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
