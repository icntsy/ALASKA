@section('meta_title', 'OBAT')
@section('page_title', 'TAMBAH DATA USER')
@section('page_title_icon')
<i class="metismenu-icon fa fa-user" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-12'>
                        <label for='name' class='control-label'> {{ __('Nama Lengkap') }}</label>
                        <input type='text' autofocus wire:model.lazy='name' placeholder="Nama Lengkap"
                        class="form-control @error('name') is-invalid @enderror" id='name'>
                        @error('name')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='email' class='control-label'> {{ __('Email') }}</label>
                        <input type='email'  wire:model.lazy='email' placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" id='email'>
                        @error('email')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                    <div class='col-md-6 form-group'>
                        <label for='study' class='control-label'> {{ __('Type user') }}</label>
                        <select  id="gender" class="form-control @error('role') is-invalid @enderror"
                        wire:model.lazy="role" name="role">
                        <option selected="selected" value="">--Pilih Type User--</option>
                        <option value="admin">Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="bidan">Bidan</option>
                        <option value="apoteker">Apoteker</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='password' class='control-label'>{{ __('Password') }}</label>
                    <div class='input-group'>
                        <input type='{{ $passwordVisible ? "text" : "password" }}' wire:model.lazy='password' placeholder="Masukkan password"
                        class="form-control @error('password') is-invalid @enderror" id='password'>
                        <div class='input-group-append'>
                            <span class='input-group-text' id='password-toggle' wire:click="togglePasswordVisibility">
                                <i class='fa fa-eye{{ $passwordVisible ? "-slash" : "" }}'></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                    <div class='invalid-feedback'>{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='password_confirmation' class='control-label'>{{ __('Password Confirmation') }}</label>
                    <div class='input-group'>
                        <input type='{{ $passwordConfirmationVisible ? "text" : "password" }}' wire:model.lazy='password_confirmation' placeholder="Ulangi Password"
                        class="form-control @error('password_confirmation') is-invalid @enderror" id='password_confirmation'>
                        <div class='input-group-append'>
                            <span class='input-group-text' id='password-confirmation-toggle' wire:click="togglePasswordConfirmationVisibility">
                                <i class='fa fa-eye{{ $passwordConfirmationVisible ? "-slash" : "" }}'></i>
                            </span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <div class='invalid-feedback'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="image" class="control-label">{{ __('Image') }}</label>
                    <input type="file" wire:model="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($image)
                    <div class="mt-2">
                        <label></label>
                        <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="200" height="200">
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ __('Simpan Data') }}</button>
            </div>
        </form>
    </div>
</div>
</div>
