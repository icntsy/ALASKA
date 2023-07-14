@php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalRecordDrugs;
@endphp

@php
$cek = DB::table("medical_record_drugs")
->rightJoin("drugs", "medical_record_drugs.drug_id", "=", "drugs.id")
->where("medical_record_id", $transaksi->queue?->medicalrecord?->id)
->select("drugs.nama", "medical_record_drugs.instruction")
->get();
$drug_bidan = DB::table("drug_bidan")
->rightJoin("drugs", "drug_bidan.drug_id", "=", "drugs.id")
->where("pregnantmom_id", $transaksi->queue?->pregnantmom?->id)
->get();
@endphp
<tr>
    <td>{{$transaksiIndex}}.</td>
    <td>{{ $transaksi->queue->patient->name }}</td>
    <td>
        {!! Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->isoFormat('D MMMM Y') !!}
    </td>
    <td>Rp. {{ number_format(floatval($transaksi->payment)) }}</td>
    <td>
        @if (empty($transaksi->queue->pregnantmom))
        @foreach ($cek as $item)
        <ul>
            <li>
                {{ $item->nama }} ( {{ $item->instruction }} )
            </li>
        </ul>
        @endforeach
        @else
        @if (empty($transaksi->queue->pregnantmom->id))
        -
        @else
        <ul>
            @foreach ($drug_bidan as $item)
            <li>
                {{ $item->nama }} ( {{ $item->instruction }} )
            </li>
            @endforeach
        </ul>
        @endif
        @endif
    </td>
    {{-- <td>
        @foreach (json_decode($cek) as $item)
        <ul>
            @foreach ($item as $i => $key)
            <li>
                {{ $key }}
            </li>
            @endforeach
        </ul>
        @endforeach
    </td> --}}
    <td>
        {{ $transaksi->queue->doctor->name }}
    </td>
    <td>{{ $transaksi->queue->service->name }}</td>
    <td>
        @if ($queue->jenis_rawat == NULL)
        -
        @else
        {{$queue->jenis_rawat}}
        @endif
    </td>
    @if($transaksi->queue->doctor->role == 'dokter')
    {{-- <td> --}}
        {{-- <button class="btn btn-sm btn-primary" onclick="location.href='{{ route('nota.print', ['transaksi' => $transaksi, 'transaksiIndex' => $transaksiIndex]) }}'">
            Print
        </button> --}}
        {{-- <button class="btn btn-sm btn-primary" wire:click="nota_inap">
            Print
        </button>
    </td> --}}

    <td>
        @if ($transaksi->queue->jenis_rawat == 'Inap')
        <a href="{{ url('/nota/download/'.$transaksi->id) }}" target="_blank" class="btn btn-sm btn-primary">
            Print
        </a>
        @else
        <button class="btn btn-sm btn-primary" onclick="location.href='{{ route('nota.print', ['transaksi' => $transaksi, 'transaksiIndex' => $transaksiIndex]) }}'">
            Print
        </button>
        @endif
    </td>
    @endif

</tr>
