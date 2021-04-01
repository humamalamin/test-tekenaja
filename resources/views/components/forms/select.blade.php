<x-forms.label :label="$label" :for="$attributes->get('wire:model')" />

<div class="col-md-9">
    <select id="{{ $attributes->get('wire:model') }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="">--- {{__('Choose '.$attributes->get('label') )}} ---</option>
        @foreach ($items as $key => $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error($attributes->get('wire:model'))
    <span class="form-text text-danger">{{ $message }}</span>
    @enderror
</div>
