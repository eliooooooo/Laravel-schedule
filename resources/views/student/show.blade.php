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
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $student->lastname }}</td>
            <td>{{ $student->firstname }}</td>
            <td>{{ $student->number }}</td>
            <td>{{ $student->email }}</td>
        </tr>
    </tbody>
</table>
@endsection
