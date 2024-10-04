@props([
    'name',
    'value' => null,
    'options' => []
])

<div id="{{ $name }}" name="{{ $name }}">
    @foreach ($options as $option_value => $text)
        <input name="{{ $name }}[]" type="checkbox" value="{{ $option_value }}" @if (collect(old($name, $value))->contains($option_value)) checked @endif>{{ $text }}</input>
    @endforeach
</div>
@error($name)
    <span style="display: block; color: red;">{{ $message }}</span>
@enderror
