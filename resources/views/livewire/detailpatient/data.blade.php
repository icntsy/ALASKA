<tr>
    <td>{{ $valueIndex }}.</td>
    <td>{{ $value["main_complaint"] }}</td>
    <td>{{ $value["service"]["name"] }}</td>
    <td>{{ $value["jenis_rawat"] }}</td>
    <td>{{\Carbon\Carbon::parse($value->created_at)->format('d F Y / H:i')}}</td>
    <td>
        <button class="btn btn-sm btn-success" wire:click="historydetail">History Pemeriksaan</button>
    </td>
</tr>
