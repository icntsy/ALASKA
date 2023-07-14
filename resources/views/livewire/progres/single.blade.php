<tr>
    <td>{{$progresIndex}}.</td>
    <td>{{$queue->patient->name}}</td>
    <td>{{$queue->patient->nik}}</td>
    <td>{{$queue->patient->address}}</td>
    <td>{{$queue->doctor->name}}</td>
    <td>{{$queue->jenis_rawat}}</td>
    <td>
        @role('admin')
        <a wire:click="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </a>
        @elserole('dokter')
        @if ($queue->inap)
        <button class="btn btn-sm btn-warning" wire:click="pulang">Data Pulang</button>
        @else
        <button class="btn btn-sm btn-danger" wire:click="selesai">Boleh Pulang</button>
        <button class="btn btn-sm btn-primary" wire:click="processCheckup">Proses</button>
        @endif
        @elserole("bidan")
        <button class="btn btn-sm btn-primary" wire:click="processCheckup">Proses</button>
        @elserole('staff')
        <button class="btn btn-sm btn-primary" wire:click="processCheckup">Proses</button>
        @endrole
        <button class="btn btn-sm btn-info" wire:click="history">History</button>
    </td>
</tr>
