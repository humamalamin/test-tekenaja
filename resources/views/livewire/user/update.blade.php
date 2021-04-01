<x-modal title="{{ __('Update') }} {{ __('User') }}" id="editModal">
    <form id="edit" wire:submit.prevent="update({{ $userId }})">
        <div class="form-group row">
            <x-forms.input :label="__('Name')" type="text" wire:model="name" />
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="albums">{{ __('Role') }}</label>
            <x-forms.select-role :label="__('Role')" required wire:model="roleId" />
        </div>
        <div class="form-group row">
            <x-forms.input :label="__('E-mail')" required type="email" wire:model="email" />
        </div>
        <div class="form-group row">
            <x-forms.input :label="__('Password')" type="password" wire:model="password" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.save form="edit" />
    </x-slot>
</x-modal>
