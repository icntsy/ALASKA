<div class="app-container">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-4">
            <div class="modal-dialog w-100 mx-auto">
                <form class="" method="post" wire:submit.prevent="login">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="h5 modal-title text-center">
                                <style>
                                    h4.mt-2 {
                                        font-size: 18px; /* Ganti dengan ukuran font yang diinginkan */
                                    }

                                    div.mt-3 {
                                        font-size: 18px; /* Ganti dengan ukuran font yang diinginkan */
                                    }
                                </style>

                                <h4 class="mt-2">
                                    <img src="{{asset('images/zyro-image (2).png')}}" alt="">
                                    <div class="mt-3">Aplikasi Pelayanan Kesehatan Klinik <p>Laa Tachzan (ALASKA)</p></div>
                                </h4>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="email" class="control-label">Email Address</label>
                                        <input wire:model="email" name="email" id="email"
                                        placeholder="name@example.com" type="email" autofocus
                                        class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <div class='invalid-feedback'>{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="input-group">
                                            <input wire:model="password" name="password" id="password"
                                            placeholder="Masukan Password" type="{{ $passwordVisible ? 'text' : 'password' }}"
                                            class="form-control @error('password') is-invalid @enderror">
                                            <div class="input-group-append">
                                                <span wire:click="togglePasswordVisibility" class="input-group-text">
                                                    <i class="fa {{ $passwordVisible ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="position-relative form-check">
                                <input name="check" wire:model="keeplogin" id="exampleCheck" type="checkbox"
                                class="form-check-input">
                                <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                            </div> --}}
                        </div>
                        <div class="modal-footer clearfix">
                            {{-- <div class="float-left">
                                <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                            </div> --}}
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary btn-lg">Login
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
