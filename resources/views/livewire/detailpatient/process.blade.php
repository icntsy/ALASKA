@php
use Carbon\Carbon;
@endphp
@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'DETAIL PASIEN')
@section('page_title_icon')
<i class="fa fa-users" aria-hidden="true"></i>
@endsection
<div class="row">
    <div class="card col-md-12">
        <div class="card-body row">
            <div class="col-md-12">
                <div class="main-card">
                    <div class="card-header">
                        Data Pasien
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <table width="100%">
                                <tbody><tr>
                                    <td style="font-weight: bold;" width="35%">NIK</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{ $patient->nik  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;" width="35%">Nama Lengkap</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{$patient->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;" width="35%">Sex / Umur</td>
                                    <td>:</td>
                                    <td>{{$patient->gender}} / {{\Carbon\Carbon::parse($patient->birth_date)
                                        ->diffInYears
                                        ()}}
                                        Thn</td>
                                    </tr>
                                </tbody></table>
                            </div>
                            <div class="col-md-6">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">No. Rekam Medis</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$patient->no_rekam_medis}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Alamat</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$patient->address}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Gol. Darah</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$patient->blood_type}}
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
                            Data Keluhan
                        </div>
                        <div class="card-body row">
                            <div class="col-md-12">
                                <table width="100%" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Keluhan Utama</th>
                                            <th>Layanan</th>
                                            <th>Jenis Rawat</th>
                                            <th>Tanggal Periksa / Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($antrian as $index => $value)
                                        <livewire:detailpatient.data :value="$value" :valueIndex="$index + $antrian->firstItem()" :key="$value->id" />
                                        @empty
                                        @include('layouts.empty', ['colspan' => 7])
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        </div>
                        <div class="m-auto pt-3 pr-3">
                            {{ $antrian->appends(request()->query())->links() }}
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
