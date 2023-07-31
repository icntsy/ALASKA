@section('meta_title', 'Poliklinik')
@section('page_title', 'UPDATE DATA LAYANAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-server" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='name' class='control-label'> {{ __('Nama Layanan') }}</label>
                        <input type='text' autofocus wire:model.lazy='name' placeholder="Nama Layanan"
                        class="form-control @error('name') is-invalid @enderror" id='name'>
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='study' class='control-label'> {{ __('Status') }}</label>
                        <select  id="status" class="form-control custom-select" name="status">
                            <option value="">--Pilih Type User--</option>
                            @if ($service->status == 1)
                            <option value="1" selected>Dokter</option>
                            <option value="2">Bidan</option>
                            @elseif ($service->status == 2)
                            <option value="1" >Dokter</option>
                            <option value="2" selected>Bidan</option>
                            @else
                            <option value="1" >Dokter</option>
                            <option value="2">Bidan</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
