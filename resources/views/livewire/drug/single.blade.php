@php
use App\Models\MedicalRecordDrugs;
$stok = MedicalRecordDrugs::where("drug_id", $drug["id"])->sum("quantity");

@endphp

<tr>
    <td>{{ $drugIndex }}.</td>
    <td>{{$drug->nama}}</td>
    <td>@rupiah($drug->harga)</td>
    <td class="d-flex">
        <span class="badge mr-3 @if($available) badge-primary @else badge-danger @endif">
            {{{$drug->stok}}} {{$available ? "Tersedia" : "Hampir Habis"}}
        </span>
        <form action="" class="d-flex" >
            <input type="number" name="stok" id="stok" class="form-control"
            placeholder="Stok" value="{{ $drug->stok }}" data-id="{{$drug->id}}" onkeyup="changeStok(event)">
            <i class="fa fa-plus-circle mr-1" onclick="addDrug(event)" data-id="{{$drug->id}}" data-stok="{{$drug->stok}}"></i>
        </form>
    </td>
    <td>
        <a wire:click="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </a>
        <a href="{{route('drug.update', ['drug' => $drug->id])}}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a>
    </td>
</tr>

@push('js')
<script>
    function changeStok(e) {
        ajax(e, "general")
    }

    function addDrug(e) {
        ajax(e, "add")
    }

    function minDrug(e) {
        ajax(e, "min")
    }

    function ajax(e, type) {
        let data = 0;

        if (type == "general") {
            data = e.target.value
        }

        if (type == "add") {
            data = parseInt(e.target.dataset.stok) + 1
        }

        if (type == "min") {
            data = parseInt(e.target.dataset.stok) - 1
        }

        $.ajax({
            url: '{{url("api/obat/update")}}/' + e.target.dataset.id,
            type: 'POST',
            data: {'stok': data},
            success: function (response) {
                window.location.reload()
            }
        })
    }
</script>
@endpush
