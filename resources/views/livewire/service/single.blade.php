<tr>
    <td>{{$serviceIndex}}.</td>
    <td>{{$service->name}}</td>
    <td>
        @if ($service->status == 1)
        dokter
        @elseif ($service->status == 2)
        bidan
        @else
        @endif
    </td>
    <td>
        {{-- <button wire:click.prevent="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </button> --}}
        <a href="{{route('service.update', ['service' => $service->id])}}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a>
    </td>
</tr>
