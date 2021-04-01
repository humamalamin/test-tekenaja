<div>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Author') }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Author') }}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Author') }}</h6>
                        <x-buttons.create :title="__('Author')" data-toggle="modal" data-target="#createModal" />
                    </div>
                    <livewire:author.table/>
                </div>
            </div>
        </div>
    </div>
</div>
@push('modal')
    <livewire:author.create />
    <livewire:author.show />
    <livewire:author.update />
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
