@section('meta_title', 'JASA')
@section('page_title', 'HARGA JASA')

@section('page_title_icon')
<i class="metismenu-icon fa fa-prescription-bottle-alt"></i>
@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class='form-group col-md-4'>
                        <label for='harga' class='control-label'> {{ __('Harga Jasa') }}</label>
                        <input type='number' wire:model.lazy='harga' placeholder="Harga Obat"
                        class="form-control @error('harga') is-invalid @enderror" id='harga'>
                        @error('harga')
                        <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">{{ __('Simpan Data') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
