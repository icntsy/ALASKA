@section('meta_title', 'USER')
@section('page_title', 'MASTER DATA USER')
@section('page_title_icon')
<i class="metismenu-icon fa fa-user" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Data</a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control form-control" wire:model.lazy="search"
                                placeholder="{{ __('Pencarian') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="mb-0 table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lengkap User</th>
                                        <th>Email User</th>
                                        <th>Type User</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 0 @endphp
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{  ($users->currentPage() - 1) * $users->perPage() + $loop->iteration   }}.</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @if ($user->image)
                                            <img src="{{ asset('storage/images/' . $user->image) }}"
                                            alt="{{ $user->name }}" class="img-thumbnail" width="80" height="80">
                                            @else
                                            No image available.
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->role != 'admin')
                                            <button wire:click="delete({{ $user->id }})" class="btn text-danger">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>
                                            @endif
                                            <a href="{{ route('user.update', ['user' => $user->id]) }}" class="btn text-warning">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-auto pt-3 pr-3">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                    <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                </div>
            </div>
        </div>
    </div>
