<tr>

    <td>{{$recordIndex}}.</td>
    <td>{{$record->patient->no_rekam_medis}}</td>
    <td>{{$record->patient->name}}</td>
    <td>{{\Carbon\Carbon::parse($record->created_at)->format('d F Y ')}}</td>
    <td>{{$record->main_complaint}}</td>
    {{-- <td>
        <ul>
            @foreach($record->labs as $lab)
            <li>{{$lab->nama}} ({{$lab->pivot->result ?? "-"}} {{$lab->satuan}})</li>
            @endforeach
        </ul>
    </td> --}}
    <td><ul>
        @foreach($record->diagnoses as $diagnosis)
        <li>{{$diagnosis->indonesian_name }} ({{$diagnosis->pivot->description ?? "-"}})</li>
        @endforeach
    </ul>
</td>
<td>
    <ul>
        @foreach($record->drugs as $drug)
        <li>{{$drug->nama }}</li>
        @endforeach
    </ul>
</td>
<td>{{$record->queue->jenis_rawat ?? ''}}</td>

{{-- <td>
    <livewire:medical-record.detail-medial-record :record="$record->physical_test" />
</td> --}}
</tr>
