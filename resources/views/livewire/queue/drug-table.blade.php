@php
    use App\Models\MedicalRecordInap;
@endphp

@php
    $cek = MedicalRecordInap::where("medical_record_id", $queue->medical_record_id)->first();
@endphp
<tr>
    <td>{{$queue->patient->name}}</td>
    <td>{{$queue->queue_number}}</td>
    <td>{{$queue->has_check ? "Selesai" : "Belum"}}</td>
    <td>{{$queue->has_drug ? "Selesai" : "Belum"}}</td>
    <td>{{$queue->doctor->name}}</td>
    <td>{{$queue->service->name}}</td>
    <td>
        @if ($queue->doctor->role === 'bidan')
        {{ '-' }}
        @else
        {{ $queue->jenis_rawat }}
        @endif
    </td>
    <td class="text-center">
        @role('admin')
        {{-- <a wire:click="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </a>
        <a href="{{route('queue.update', ['queue' => $queue->id])}}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a> --}}
        @if ($cek)
        <button class="btn btn-sm btn-primary" wire:click="processDrug">Proses</button>
    @else
        @if ($queue->jenis_rawat == "Inap")
        <button class="btn btn-sm btn-danger">
            Pasien Belum Pulang
        </button>
        @elseif($queue->jenis_rawat == "Jalan" || $queue->jenis_rawat == NULL)
        <button class="btn btn-sm btn-primary" wire:click="processDrug">Proses</button>
        @endif
    @endif
        @elserole('staff|apoteker|dokter')
            @if ($cek)
                <button class="btn btn-sm btn-primary" wire:click="processDrug">Proses</button>
            @else
                @if ($queue->jenis_rawat == "Inap")
                <button class="btn btn-sm btn-danger">
                    Pasien Belum Pulang
                </button>
                @elseif($queue->jenis_rawat == "Jalan" || $queue->jenis_rawat == NULL)
                <button class="btn btn-sm btn-primary" wire:click="processDrug">Proses</button>
                @endif
            @endif
        @endrole
    </td>
</tr>
