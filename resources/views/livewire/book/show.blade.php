<x-modal title="{{ __('View') }} {{ __('Book') }}" id="showModal">
    <form>
        <div class="form-group row">
            <x-forms.label :label="__('Title')" />
            <x-forms.label :label="$title" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Author')" />
            <x-forms.label :label="$author" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Synopsis')" />
            <x-forms.label :label="$synopsis" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Description')" />
            <x-forms.label :label="$description" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Publication Year')" />
            <x-forms.label :label="$publicationYear" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Title')" />
            <x-forms.label :label="$title" class="col-md-9" />
        </div>
        <div class="form-group row">
            <x-forms.label :label="__('Cover')" />
            <img src="{{ asset('storage/'.$cover) }}" width="400" class="img-responsive">
        </div>
    </form>

    <x-slot name="footer">
        <x-buttons.close-modal />
    </x-slot>
</x-modal>
