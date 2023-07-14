@section('meta_title', 'Pasien')
@section('page_title', 'UPDATE DATA PASIEN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-users"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-6'>
                        <label for='name' class='control-label'> {{ __('Nama Lengkap') }}</label>
                        <input type='text' wire:model.lazy='name'
                        class="form-control @error('name') is-invalid @enderror" id='name' autofocus placeholder="Nama Lengkap pasien">
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='birth_date' class='control-label'> {{ __('Tanggal Lahir') }}</label>
                        <input type='date' wire:model.lazy='birth_date'
                        placeholder="Harga" class="form-control @error('birth_date') is-invalid @enderror" id='birth_date'>
                        @error('birth_date')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='nik' class='control-label'> {{ __('NIK') }}</label>
                        <input type='text' wire:model.lazy='nik'
                        placeholder="NIK" class="form-control @error('birth_date') is-invalid @enderror" id='nik'>
                        @error('nik')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='address' class='control-label'> {{ __('Alamat Lengkap') }}</label>
                        <textarea class="form-control" wire:model="address" placeholder="Alamat Lengkap"></textarea>
                        @error('address')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='profession' class='control-label'> {{ __('Nama Pekerjaan') }}</label>
                        <input type='text' wire:model.lazy='profession'
                        class="form-control @error('pro') is-invalid @enderror" id='pro' placeholder="Nama Pekerjaan pasien">
                        @error('profession')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='phone_number' class='control-label'> {{ __('Nomer Handphone') }}</label>
                        <input type='text' wire:model.lazy='phone_number'
                        class="form-control @error('phone_number') is-invalid @enderror" id='phone_number' placeholder="Nomer Handphone pasien">
                        @error('phone_number')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='gender' class='control-label'> {{ __('Jenis Kelamin') }}</label>
                        <select  id="gender" class="form-control custom-select" wire:model="gender" name="gender">
                            <option selected="selected" value="">--Pilih Jenis Kelamin--</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='study' class='control-label'> {{ __('Pendidikan Terakhir') }}</label>
                        <select  id="study" class="form-control custom-select" wire:model="study" name="study">
                            <option selected="selected" value="">--Pilih Pendidikan--</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">Sekolah Dasar</option>
                            <option value="SMP">Sekolah Menengah Pertama</option>
                            <option value="SMA">Sekolah Menengah Atas</option>
                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='blood_type' class='control-label'> {{ __('Golongan Darah') }}</label>
                        <select  id="blood_type" class="form-control custom-select" wire:model="blood_type" name="blood_type">
                            <option selected="selected" value="">---Golongan Darah--</option>
                            <option value="A" >A</option>
                            <option value="B" >B</option>
                            <option value="AB" >AB</option>
                            <option value="O" >O</option>
                            <option value="Tidak Tahu" >Tidak Tahu</option>
                        </select>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='allergy' class='control-label'> {{ __('Alergi') }}</label>
                        <textarea class="form-control" wire:model="allergy" placeholder="List Alergi Yang di Derita"></textarea>
                        @error('allergy')
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
