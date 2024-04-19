@props(['name', 'type' => 'text', 'placeholder', 'record' => null])

<div class="mt-3">
    <x-form.label :name="$name"/>

    <input id="vertical-form-2" type="text" class="form-control"
               type="{{ $type }}" name="{{ $name ?? $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? $name }}"  value="{{ $record }}">
</div>
