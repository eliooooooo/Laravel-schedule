<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
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
            @foreach ($students as $student)
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
</body>
</html>
