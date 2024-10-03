<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>@yield('title', 'Laravel schedule')</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="{{ route('front') }}">Home</a>
                <a href="{{ route('student.index') }}">Students</a>
                <a href="{{ route('formation.index') }}">Formations</a>
                <a href="{{ route('group.index') }}">Groups</a>
                <a href="{{ route('course.index') }}">Courses</a>
            </nav>
        </header>
        <main>
            @yield('main')
            <div>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </main>
        <footer></footer>
    </body>
</html>
