@extends('layouts.front')

@section('title', 'Group list')

@section('main')
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td><a href="{{ route('group.show', ['group' => $group]) }}">See details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
