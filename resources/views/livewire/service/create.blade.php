@section('meta_title', 'Lab')
@section('page_title', 'TAMBAH DATA LAYANAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-server" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Layanan
            </div>
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='name' class='control-label'> {{ __('Nama Layanan') }}</label>
                        <input type='text' wire:model.lazy='name'
                        class="form-control @error('name') is-invalid @enderror" id='name'
                        placeholder="Contoh : Layanan">
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='study' class='control-label'> {{ __('Status') }}</label>
                        <select  id="status" class="form-control @error('status') is-invalid @enderror"
                        wire:model.lazy="status" name="status">
                        <option selected="selected" value="">--Pilih Status Layanan--</option>
                        <option value="1">dokter</option>
                        <option value="2">bidan</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
            </div>
        </form>
    </div>
</div>
</div>
