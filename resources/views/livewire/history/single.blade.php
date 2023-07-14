<tr>
    <td>{{$recordIndex}}.</td>
    <td>{{$record->patient->name}}</td>
    <td>{{$record->patient->nik}}</td>
    <td>{{$record->patient->address}}</td>
    <td>{{$record->patient->gender}}</td>
    <td>{{$record->patient->phone_number}}</td>
    <td>
        <button class="btn btn-sm btn-primary"  onclick="location.href='{{ route('history.update', ['history' => $record->id]) }}'">
            History Pemeriksaan
        </button>
    </td>
</td>
</tr>

