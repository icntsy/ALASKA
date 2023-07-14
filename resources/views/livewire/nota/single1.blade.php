<tr>
    
    <td>{{ $transaction->id }}</td>
    <td>{{ $transaction->payment }}</td>
    <td>
        @if ($transaction->role != 'apoteker')
        <button wire:click.prevent="delete" class="btn text-danger">
            <i class="fa fa-trash fa-1x"></i>
        </button>
        @endif
        <!-- <a href="{{ route('user.update', ['transaction' => $transaction->id]) }}" class="btn text-warning">
            <i class="fa fa-edit fa-1x"></i>
        </a> -->
    </td>
</tr>
