<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('title')
    </head>
    <body>
        <nav>
            <a href="{{ route('app') }}">Home</a>
            <a href="{{ route('student.index') }}">Students</a>
            <a href="{{ route('formation.index') }}">Formations</a>
        </nav>
        @yield('contenu')
    </body>
</html>
