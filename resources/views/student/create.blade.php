<x-layout.front>
    <h1>Create a student</h1>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div>
            <label for="lastname">Lastname<span style="color: red;">*</span></label>
            <x-form.input name="lastname" />
        </div>
        <div>
            <label for="firstname">Firstname<span style="color: red;">*</span></label>
            <x-form.input name="firstname" />
        </div>
        <div>
            <label for="number">Number<span style="color: red;">*</span></label>
            <x-form.input name="number" type="number" />
        </div>
        <div>
            <label for="email">E-mail<span style="color: red;">*</span></label>
            <x-form.input name="email" type="email" />
        </div>
        <div>
            <label for="formation">Formation<span style="color: red;">*</span></label>
            <select id="formation" name="formation_id">
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->name }}</option>
                @endforeach
            </select>
            @error('formation_id')
                <span style="display: block; color: red;">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
</x-layout.front>
