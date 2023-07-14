@section('meta_title', 'Mediical Record')
@section('page_title', 'DATA REKAM MEDIS')
@section('page_title_icon')
<i class="fa fa-medkit" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                    </div>
                    <div class="col-md-6 col-sm-12">
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
                        <form class="mb-3" wire:submit.prevent="filterByDate">
                            <div class="form-row align-items-end">
                                <div class="col-md-3">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" wire:model.defer="startDate">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="end_date" wire:model.defer="endDate">
                                </div>
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                                </div>
                            </div>
                        </form>

                        <table class="mb-0 table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Keluhan Utama</th>
                                    {{-- <th>Lab</th> --}}
                                    <th>Diagnosis</th>
                                    <th>Obat</th>
                                    <th>Jenis Rawat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $index => $record)
                                <livewire:medical-record.single :record="$record" :recordIndex="$index + $records->firstItem()" :key="$record->id" />
                                @empty
                                @include('layouts.empty', ['colspan' => 7])
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-auto pt-3 pr-3">
                    {{ $records->appends(request()->query())->links() }}
                </div>
                <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
            </div>
        </div>
    </div>
</div>
