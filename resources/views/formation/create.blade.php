<x-layout.front title="Create a formation">
    <h1>Create a formation</h1>
    <form action="{{ route('formation.store') }}" method="POST">
        @csrf {{-- Cross-Site Requests Forgery (Permet de limiter les requetes d'un formulaire externe) --}}
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <button type="submit">Create</button>
    </form>
</x-layout.front>
