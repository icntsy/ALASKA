@section('meta_title', 'Keluarga Berencana')
@section('page_title', 'TAMBAH DATA KELUARGA BERENCANA')
@section('page_title_icon')
<i class="metismenu-icon fa fa-child" aria-hidden="true"></i>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='name' class='control-label'> {{ __('Nama Lengkap') }}</label>
                        <input type='text' wire:model.lazy='name'
                        class="form-control @error('name') is-invalid @enderror" id='name' autofocus placeholder="Nama Lengkap Pasien">
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='age' class='control-label'> {{ __('Tgl. Lahir') }}</label>
                        <input type='date' wire:model.lazy='age'
                        class="form-control @error('age') is-invalid @enderror" id='age' autofocus placeholder="Usia">
                        @error('age')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='husbands_name' class='control-label'> {{ __('Nama Suami') }}</label>
                        <input type='text' wire:model.lazy='husbands_name'
                        class="form-control @error('husbands_name') is-invalid @enderror" id='husbands_name' autofocus placeholder="Nama Lengkap Pasien">
                        @error('husbands_name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='address' class='control-label'> {{ __('Alamat') }}</label>
                        <input type='text' wire:model.lazy='address'
                        class="form-control @error('address') is-invalid @enderror" id='address' autofocus placeholder="Alamat lengkap">
                        @error('address')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='entry_date' class='control-label'> {{ __('Tgl. Masuk KB') }}</label>
                        <input type='date' wire:model.lazy='entry_date'
                        class="form-control @error('entry_date') is-invalid @enderror" id='entry_date' autofocus placeholder="Usia">
                        @error('entry_date')
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
