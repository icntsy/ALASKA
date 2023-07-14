<tr>
    <td>{{ $patientIndex }}.</td>
    <td>{{$patient->no_rekam_medis}}</td>
    <td>{{$patient->nik ?? "-"}}</td>
    <td>{{$patient->name}}</td>
    <td>{{$patient->birth_date}}</td>
    <td>{{$patient->gender}}</td>
    <td>{{$patient->blood_type}}</td>
    <td>{{$patient->address}}</td>
    <td>{{$patient->phone_number}}</td>
    <td>
        <button class="btn btn-sm btn-primary" wire:click="detail">Detail</button>
    </td>
</tr>

