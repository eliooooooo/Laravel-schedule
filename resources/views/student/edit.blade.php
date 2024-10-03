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
            <select id="formation" name="formation_id">
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}" @if ($student->formation_id == $formation->id) selected @endif>
                        {{ $formation->name }}</option>
                @endforeach
            </select>
            @error('formation_id')
                <span style="display: block; color: red;">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Edit</button>
    </form>
</x-layout.front>
