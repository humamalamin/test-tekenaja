<div>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Role') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Role') }}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Role') }}</h6>
                        <x-buttons.create :title="__('Role')" data-toggle="modal" data-target="#createModal" />
                    </div>
                    <livewire:role.table/>
                </div>
            </div>
        </div>
    </div>
</div>
@push('modal')
    <livewire:role.create />
    <livewire:role.show />
    <livewire:role.update />
@endpush

@push('js')
    <script>
        window.addEventListener('reload-page', event => {
            location.reload()
        });

        window.addEventListener('closeModals', event => {
            $('.modal').modal('hide');
        });
    </script>
@endpush
