<div class="col-md-9">
    <select id="{{ $attributes->get('wire:model') }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="">--- {{__('Choose '.$attributes->get('label') )}} ---</option>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
    @error($attributes->get('wire:model'))
    <span class="form-text text-danger">{{ $message }}</span>
    @enderror
</div>
