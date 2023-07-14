<tr>
    <td>{{$familyplanningIndex}}.</td>
    <td>{{$familyplanning->name ?? "-"}}</td>
    <td>{{$this->getAge()}} Thn</td>
    <td>{{$familyplanning->husbands_name}}</td>
    <td>
        <button class="btn btn-sm btn-primary" wire:click="pemeriksaan">History</button>
    </td>
</tr>

