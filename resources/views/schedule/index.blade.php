<x-layout.front title="Schedule">

    <form action="{{ route('schedule.index') }}" method="GET">
        <p>
            <x-form.input name="start" type="date" :value="$filters['start'] ?? null" />
        </p>
        <p>
            <x-form.input name="end" type="date" :value="$filters['end'] ?? null" />
        </p>
        <p>
            <x-form.select name="formation" :options="$formations->pluck('name', 'id')" :value="$filters['formation'] ?? null" />
        </p>
        <p>
            <x-form.checkboxes name="groups" :options="$groups->pluck('name', 'id')" :value="$filters['groups'] ?? null" />
        </p>
        <p>
            <x-form.select name="student" :options="$students->mapWithKeys(
                fn($student) => [$student->id => $student->lastname . ' ' . $student->firstname],
            )" :value="$filters['student'] ?? null" />
        </p>
        <p><button class="p-1 text-white bg-green-600" type="submit">Search</button></p>
    </form>

    @if ($courses->isNotEmpty())
        <ul>
            @foreach ($courses as $course)
                <li class="my-3 border">
                    <p class="my-1">from {{ $course->start->isoFormat('L LT') }} to
                        {{ $course->end->isoFormat('L LT') }}</p>
                    <p class="my-1">formation: {{ $course->formation->name }}</p>
                    <p class="my-1">group: {{ $course->group->name }}</p>
                </li>
            @endforeach
        </ul>
    @endif


</x-layout.front>
