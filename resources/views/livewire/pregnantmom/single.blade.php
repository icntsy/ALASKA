<tr>
    <?php $no= 1;?>
    <td>{{$pregnantmom->id}}</td>
    <td>{{$pregnantmom->name ?? "-"}}</td>
    <td>{{$pregnantmom->age}}</td>
    <td>{{$pregnantmom->address}}</td>
    <td>{{$pregnantmom->anak_ke}}</td>
    <td>
        <a wire:click="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </a>
        <a href="{{route('pregnantmom.update', ['pregnantmom' => $pregnantmom->id])}}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a>
        <a href="{{route('pregnantmom.update', ['pregnantmom' => $pregnantmom->id])}}" class="btn text-success">
            <i class="fa fa-eye fa-1x"></i>
        </a>
    </td>
</tr>
