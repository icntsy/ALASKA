<tr>
    <td>1</td>
    <td>
        {{ $users->name }}
    </td>
    <td>
        @if ($users->harga_jasa == NULL)
        <span class="text-danger">
            <i>
                <b>
                    Belum Ada Harga
                </b>
            </i>
        </span>
        @else
        Rp. {{ number_format($users->harga_jasa) }}
        @endif
    </td>
</tr>
