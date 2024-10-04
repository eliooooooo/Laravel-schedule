<x-layout.front>
    <h1>Create a course</h1>
    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <div>
            <label for="start">Start</label>
            <x-form.input type="datetime-local" name="start" ></x-form.input>
        </div>
        <div>
            <label for="end">End</label>
            <x-form.input type="datetime-local" name="end" ></x-form.input>
        </div>
        <div>
            <label for="name">Name</label>
            <x-form.input name="name" ></x-form.input>
        </div>
        <div>
            <label for="room">Room</label>
            <x-form.input name="room" ></x-form.input>
        </div>
        <div>
            <label for="formation_id">Formation</label>
            <x-form.select name="formation_id" :options="$formations->pluck('name', 'id')"></x-form.select>
        </div>
        <button type="submit" >Create</button>
    </form>
</x-layout.front>
