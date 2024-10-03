@props([
    'name',
    'type' => 'text',
    'value' => old($name)
])

<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">
@error($name)
    <span style="display: block; color: red;">{{ $message }}</span>
@enderror
