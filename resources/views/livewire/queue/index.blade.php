@section('meta_title', 'LAB')
@section('page_title', 'DATA ANTRIAN HARI INI')
@section('page_title_icon')
<i class="fa fa-clipboard fa-1x" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row d-flex justify-content-end">
                    @role('admin')
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('queue.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Tambah
                            Antrian</a>
                        </div>
                        @endrole
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
                    <div class="row mt-4" wire:poll>
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="mb-0 table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>No Antrian</th>
                                        <th>Selesai Checkup</th>
                                        <th>Selesai Obat</th>
                                        <th>
                                            @if ($role === 'dokter')
                                            Dokter
                                            @elseif ($role === 'bidan')
                                            Bidan
                                            @elseif ($role === 'admin' || $role === 'apoteker')
                                            Dokter / Bidan
                                            @endif
                                        </th>
                                        <th>Layanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($queues as $queue)
                                    <livewire:queue.single :queue="$queue" :key="time() . $queue->id" />
                                    @empty
                                    @include('layouts.empty', ['colspan' => 7])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="m-auto pt-3 pr-3">
                        {{ $queues->appends(request()->query())->links() }}
                    </div>
                    <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                </div>
            </div>
        </div>
    </div>
