@php
use Carbon\Carbon;
@endphp
@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'HISTORY PEMERIKSAAN DATA KB')
@section('page_title_icon')
<i class="metismenu-icon fa fa-history" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="card col-md-12">
        <div class="card-body row">
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Data KB
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <table width="100%">
                                <tbody><tr>
                                    <td style="font-weight: bold;" width="35%">Nama</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{$antrian->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;" width="35%">Umur</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{$this->getAge()}} Thn
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;" width="35%">Nama Suami</td>
                                    <td>:</td>
                                    <td>
                                        {{ $antrian->husbands_name }}
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <div class="col-md-6">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{ $antrian->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Tgl. Masuk</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{\Carbon\Carbon::parse($antrian->entry_date)->format('d F Y')}}
                                            {{-- {{ $antrian->entry_date }} --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Data Pemeriksaan KB
                    </div>
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table width="100%" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tgl. Datang</th>
                                        <th>Berat Badan (KG)</th>
                                        <th>Tensi (mmHG)</th>
                                        <th>Tgl. Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($antrian->familyPlanningExaminations()->orderByDesc('created_at')->paginate(1) as $index => $value) --}}
                                     @forelse ($paginate = $antrian->familyPlanningExaminations()->paginate(10) as $index => $value)
                                    <tr>
                                        {{-- <td>{{ $index + 1 }}.</td> --}}
                                        <td>{{ ($paginate->currentPage() - 1 ) * $paginate->perPage() + $index + 1}}.</td>
                                        <td> {{\Carbon\Carbon::parse($value->arrival_date)->format('d F Y')}}</td>
                                        <td>{{ $value["body_weight"] }}</td>
                                        <td>{{ $value["blood_pressure"] }}</td>
                                        <td> {{\Carbon\Carbon::parse($value->return_date)->format('d F Y')}}</td>
                                    </tr>
                                    @empty
                                    @include('layouts.empty', ['colspan' => 7])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <hr>
                    </div>
                    <div class="m-auto pt-3 pr-3">
                        {{ $antrian->familyPlanningExaminations()->paginate(10)->appends(request()->query())->links() }}
                    </div>
                    <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="card-main">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
