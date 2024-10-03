@props([
    'name',
    'value' => null,
    'options' => [],
    'null_option' => true
])

<select id="{{ $name }}" name="{{ $name }}">
    @if ($null_option == true)
        <option></option>
    @endif
    @foreach ($options as $option_value => $text)
        <option value="{{ $option_value }}" @if (old($name, $value) == $option_value) selected @endif>{{ $text }}</option>
    @endforeach
</select>
@error('formation_id')
    <span style="display: block; color: red;">{{ $message }}</span>
@enderror
