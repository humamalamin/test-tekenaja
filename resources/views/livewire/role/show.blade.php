<x-modal title="{{ __('View') }} {{ __('Role') }}" id="showModal">
    <form>
        <div class="form-group row">
            <x-forms.label :label="__('Name')" />
            <x-forms.label :label="$name" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Guard Name')" />
            <x-forms.label :label="$guard" class="col-md-9" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.close-modal />
    </x-slot>
</x-modal>
