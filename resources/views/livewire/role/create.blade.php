<x-modal title="{{ __('Create') }} {{ __('Role') }}" id="createModal">
    <form id="create" wire:submit.prevent="store">
        <div class="form-group row">
            <x-forms.input :label="__('Name')" type="text" wire:model="name" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.save form="create" />
    </x-slot>
</x-modal>
