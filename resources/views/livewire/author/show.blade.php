<x-modal title="{{ __('View') }} {{ __('Author') }}" id="showModal">
    <form>
        <div class="form-group row">
            <x-forms.label :label="__('Name')" />
            <x-forms.label :label="$name" class="col-md-9" />
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.close-modal />
    </x-slot>
</x-modal>
