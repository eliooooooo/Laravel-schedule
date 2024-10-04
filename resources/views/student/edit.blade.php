<x-layout.front>
    <h1>Edit a student ({{ $student->firstname }} {{ $student->lastname }})</h1>
    <form action="{{ route('student.update', ['student' => $student]) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="lastname">Lastname<span style="color: red;">*</span></label>
            <x-form.input name="lastname" :value="$student->lastname" />
        </div>
        <div>
            <label for="firstname">Firstname<span style="color: red;">*</span></label>
            <x-form.input name="firstname" :value="$student->firstname" />
        </div>
        <div>
            <label for="number">Number<span style="color: red;">*</span></label>
            <x-form.input name="number" type="number" :value="$student->number" />
        </div>
        <div>
            <label for="email">E-mail<span style="color: red;">*</span></label>
            <x-form.input name="email" type="email" :value="$student->email" />
        </div>
        <div>
            <label for="formation">Formation<span style="color: red;">*</span></label>
            <x-form.select name="formation_id" :options="$formations->pluck('name', 'id')" :value="$student->formation_id" />
        </div>
        <x-form.checkboxes name="groups" :value="$student->groups->pluck('id')" :options="$groups->pluck('name', 'id')" ></x-form.checkboxes>
        <button type="submit">Edit</button>
    </form>
</x-layout.front>
