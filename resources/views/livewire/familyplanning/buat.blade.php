@section('meta_title', 'Keluarga Berencana')
@section('page_title', 'TAMBAH DATA PEMERIKSAAN KB')
@section('page_title_icon')
<i class="metismenu-icon fa fa-child" aria-hidden="true"></i>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='arrival_date' class='control-label'> {{ __('Tgl. Datang') }}</label>
                        <input type='date' wire:model.lazy='arrival_date'
                        class="form-control @error('arrival_date') is-invalid @enderror" id='arrival_date' autofocus placeholder="Tgl. datang">
                        @error('arrival_date')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='body_weight' class='control-label'> {{ __('Berat Badan (KG)') }}</label>
                        <input type='text' wire:model.lazy='body_weight'
                        class="form-control @error('body_weight') is-invalid @enderror" id='body_weight' autofocus placeholder="Berat Badan">
                        @error('body_weight')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='blood_pressure' class='control-label'> {{ __('Tensi (mmHG)') }}</label>
                        <input type='text' wire:model.lazy='blood_pressure'
                        class="form-control @error('blood_pressure') is-invalid @enderror" id='blood_pressure' autofocus placeholder="Tensi">
                        @error('blood_pressure')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='return_date' class='control-label'> {{ __('Tgl. Kembali') }}</label>
                        <input type='date' wire:model.lazy='return_date'
                        class="form-control @error('return_date') is-invalid @enderror" id='return_date' autofocus placeholder="Tgl. Kembali">
                        @error('return_date')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
