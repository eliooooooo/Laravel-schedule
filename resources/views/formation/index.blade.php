<x-layout.front title="Formation list">
    <a href="{{ route('formation.create') }}">Create a formation</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formations as $formation)
                <tr>
                    <td>{{ $formation->name }}</td>
                    <td><a href="{{ route('formation.show', ['formation' => $formation]) }}">See details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.front>

