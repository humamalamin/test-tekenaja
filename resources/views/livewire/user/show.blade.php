<x-modal title="{{ __('View') }} {{ __('User') }}" id="showModal">
    <form>
        <div class="form-group row">
            <x-forms.label :label="__('Name')" />
            <x-forms.label :label="$name" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Role')" />
            <x-forms.label :label="$role" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('E-mail')" />
            <x-forms.label :label="$email" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Password')" />
            <x-forms.label :label="$password" class="col-md-9" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.close-modal />
    </x-slot>
</x-modal>
