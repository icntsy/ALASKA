<tr>
    <td>{{$immunizationIndex}}.</td>
    <td>{{$immunization->name ?? "-"}}</td>
    <td>{{$immunization->age}}</td>
    <td>{{$immunization->address}}</td>
    <td>{{$immunization->birth_place. ", ".$immunization->birth_date}}</td>
    <td>{{$immunization->weight}}</td>
    <td>
        <a wire:click="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </a>
        <a href="{{route('immunization.update', ['immunization' => $immunization->id])}}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a>
        <a href="{{route('immunization.show', ['immunization' => $immunization->id])}}" class="btn text-success">
            <i class="fa fa-eye fa-1x"></i>
        </a>
    </td>
</tr>
