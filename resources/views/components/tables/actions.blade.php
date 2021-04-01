<span style="overflow: visible; position: relative; width: 125px;">
    @if (Auth::user()->hasRole('super administrator'))
        <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('View') }}" data-toggle="modal"
                data-target="#showModal" wire:click="showModal({{ $model->id }})">
            <span class="fa fa-eye"></span>
        </button>
    @endif
    @if (Auth::user()->hasRole('super administrator'))
        <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('Edit') }}" data-toggle="modal"
                data-target="#editModal" wire:click="editModal({{ $model->id }})">
            <span class="fa fa-book"></span>
        </button>
    @endif
    @if (Auth::user()->hasRole('super administrator'))
        <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('Delete') }}"
                wire:click="destroyConfirm({{ $model->id }})">
            <span class="fa fa-trash"></span>
        </button>
    @endif
</span>
