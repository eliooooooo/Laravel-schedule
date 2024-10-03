@props([
    'name',
    'type' => 'text',
])

<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old('$name') }}">
@error($name)
    <span style="display: block; color: red;">{{ $message }}</span>
@enderror
