<x-modal title="{{ __('Update') }} {{ __('Author') }}" id="editModal">
    <form id="edit" wire:submit.prevent="update({{ $authorId }})">
        <div class="form-group row">
            <x-forms.input :label="__('Name')" type="text" wire:model="name" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.save form="edit" />
    </x-slot>
</x-modal>
