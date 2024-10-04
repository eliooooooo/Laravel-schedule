<x-layout.front>
    <h1>Edit a course</h1>
    <form action="{{ route('course.update', ['course' => $course]) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="start">Start</label>
            <x-form.input name="start" type="datetime-local" value="{{ $course->start }}"></x-form.input>
        </div>
        <div>
            <label for="end">End</label>
            <x-form.input name="end" type="datetime-local" value="{{ $course->end }}"></x-form.input>
        </div>
        <div>
            <label for="name">Name</label>
            <x-form.input name="name" value="{{ $course->name }}"></x-form.input>
        </div>
        <div>
            <label for="room">Room</label>
            <x-form.input name="room" value="{{ $course->room }}"></x-form.input>
        </div>
        <div>
            <label for="formation_id">Formation</label>
            <x-form.select name="formation_id" :options="$formations->pluck('name', 'id')" value="{{ $course->formation_id }}"></x-form.select>
        </div>
        <button type="submit" >Edit</button>
    </form>
</x-layout.front>
