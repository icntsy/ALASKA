@section('meta_title', 'LAB')
@section('page_title', 'DATA LAYANAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-server" aria-hidden="true"></i>
@endsection
<div class="row ">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row d-flex justify-content-end">
                    {{-- <div class="col-md-6 col-sm-12">
                        <a href="{{ route('service.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Tambah
                            Data</a>
                        </div> --}}
                        <div class="col-md-6 col-sm-12 d-flex justify-content-end">
                            <div class="input-group">
                                <input type="text" class="form-control form-control" wire:model.lazy="search"
                                placeholder="{{ __('Pencarian') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="mb-0 table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Layanan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $index => $service)
                                    <livewire:service.single :service="$service" :serviceIndex="$index + $services->firstItem()" :key="$service->id" />
                                    @empty
                                    @include('layouts.empty', ['colspan' => 2])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-auto pt-3 pr-3">
                        {{ $services->appends(request()->query())->links() }}
                    </div>
                    <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                </div>
            </div>
        </div>
    </div>
