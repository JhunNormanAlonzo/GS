@props([
    'placeholder' => '',
    'name' => '',
    'options' => [],
    'selected' => null,
    'column' => '',
    'label' => ''
])
@php
    $error = $errors->has($name) ? 'is-invalid' : '';
@endphp
<div class="form-floating ">
    <select name="{{$name}}" id="{{$name}}" {{$attributes->merge(['class' => " form-select $error"])}}>
        <option value="" selected disabled>-- Select --</option>
        @foreach ($options as $option)
            <option value="{{ $option->$column }}"  {{ $option->$column == $selected ? 'selected' : '' }} > {{ $option->$label }}</option>
        @endforeach
    </select>
    <label for="{{$name}}">{{"Choose ".$placeholder}}</label>
    {{$slot}}
</div>


