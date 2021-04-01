<x-modal title="{{ __('Create') }} {{ __('Role') }}" id="editModal">
    <form id="edit" wire:submit.prevent="update({{ $roleId }})">
        <div class="form-group row">
            <x-forms.input :label="__('Name')" type="text" wire:model="name" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.save form="edit" />
    </x-slot>
</x-modal>
