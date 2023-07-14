@section('meta_title', 'Lab')
@section('page_title', 'UPDATE DATA RUANGAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-bed" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Ubah Data Rungan
            </div>
            <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-12'>
                        <label for='name' class='control-label'> {{ __('Nama Ruangan') }}</label>
                        <input type='text' wire:model.lazy='name'
                        class="form-control @error('name') is-invalid @enderror" id='name' placeholder="Nama Ruangan">
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    {{-- <div class='form-group col-md-6'>
                        <label for='price' class='control-label'> {{ __('Harga Sewa Ruangan') }}</label>
                        <input type='number' wire:model.lazy='price'
                        class="form-control @error('price') is-invalid @enderror" id='price' placeholder="Satuan">
                        @error('price')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div> --}}
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
