<x-layout.front title="Edit a formation">
    <h1>Edit a formation ({{ $formation->name }})</h1>
    <form action="{{ route('formation.update', ['formation' => $formation]) }}" method="POST">
        @csrf {{-- Cross-Site Requests Forgery (Permet de limiter les requetes d'un formulaire externe) --}}
        @method('PUT')
        <div>
            <label for="name">Name<span style="color: red;">*</span></label>
            <x-form.input name="name" value="{{ $formation->name }}" />
        </div>
        <button type="submit">Create</button>
    </form>
</x-layout.front>
