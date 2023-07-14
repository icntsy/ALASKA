<tr>
    <td>{{$progresIndex}}.</td>
    <td>{{$queue->patient->name}}</td>
    <td>{{$queue->patient->nik}}</td>
    <td>{{$queue->patient->address}}</td>
    <td>{{$queue->doctor->name}}</td>
    <td>{{$queue->jenis_rawat}}</td>
    <td>
        <button class="btn btn-sm btn-info" wire:click="history">History</button>
    </td>
</tr>
