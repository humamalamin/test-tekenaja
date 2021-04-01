<x-forms.label :label="$label" :for="$attributes->get('wire:model')" />

<div class="col-md-9">
    <input id="{{ $attributes->get('wire:model') }}"
        {{ $attributes->merge(['class' => 'form-control', 'type' => 'text']) }}>
    @error($attributes->get('wire:model'))
    <span class="form-text text-danger">{{ $message }}</span>
    @enderror
</div>

