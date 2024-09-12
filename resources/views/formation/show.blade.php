@extends('app')

@section('title')
<title>{{ $formation->name }}</title>
@endsection

@section('contenu')
<a href="{{ route('formation.index') }}">Back to formation list</a>
<table>
    <thead>
        <tr>
            <th>name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $formation->name }}</td>
        </tr>
    </tbody>
</table>
@endsection
