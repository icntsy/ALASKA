<div wire:ignore.self class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update Harga Jasa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('/jasa') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">  Pilih Dokter / Bidan</label>
                    <select name="id" class="form-control" id="id">
                        <option value="">- Pilih Dokter / Bidan-</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga_jasa">  Harga Jasa </label>
                    <input type="number" class="form-control" name="harga_jasa" placeholder="0" min="1000">
                    @error('file')
                    <div class='invalid-feedback'>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
</div>
