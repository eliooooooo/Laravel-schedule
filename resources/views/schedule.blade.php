<x-layout.front>
    <div class="filters">
        <form action="{{ route('schedule.index') }}" method="GET">
            <label for="formation">Formation</label>
            <x-form.select name="formation_id" :options="$formations->pluck('name', 'id')" />
            <label for="group">Group</label>
            <x-form.select name="group_id" :options="$groups->pluck('name', 'id')" />
            <label for="room">Room</label>
            <x-form.input name="room" />
            <label for="start">Start</label>
            <x-form.input name="start" type="datetime-local" />
            <button type="submit">Filter</button>
        </form>
    </div>
    <div>
        <h1>Schedule</h1>
        <table>
            <thead>
                <tr>
                    <th>Start</th>
                    <th>End</th>
                    <th>Name</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->start }}</td>
                        <td>{{ $course->end }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->room }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout.front>
