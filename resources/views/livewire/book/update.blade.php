<x-modal title="{{ __('Update') }} {{ __('Book') }}" id="editModal">
    <form id="edit" wire:submit.prevent="update({{ $bookId }})">
        <div class="form-group row">
            <x-forms.input :label="__('Title')" type="text" wire:model="title" />
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="albums">{{ __('Album') }}</label>
            <x-author.select-author :label="__('Author')" required wire:model="authorId" />
        </div>
        <div class="form-group row">
            <x-forms.input :label="__('Synopsis')" type="text" wire:model="synopsis" />
        </div>
        <div class="form-group row">
            <x-forms.textarea :label="__('Description')" wire:model="description" />
        </div>
        <div class="form-group row">
            <x-forms.input :label="__('Publication Year')" type="year" min="1900" max="2099" wire:model="publicationYear" placeholder="2010"/>
        </div>
        <div class="form-group row">
            <x-forms.input :label="__('Cover')" type="file" wire:model="cover" />
            <div class="col-md-6">
                <p>Preview:</p>
                @if($cover)
                    <img src="{{ $cover->temporaryUrl() }}" class="img-thumbnail" width="300">
                @endif
            </div>
            <div class="col-md-6">
                @if($coverPreview)
                    <img src="{{ asset('storage/'.$coverPreview) }}" width="400" class="img-thumbnail">
                @endif
            </div>
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.save form="edit" />
    </x-slot>
</x-modal>
