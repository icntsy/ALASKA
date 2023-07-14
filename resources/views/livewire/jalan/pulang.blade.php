@php
$convert = json_decode($queue->medicalrecord->inap->physical_test, true);
@endphp

@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'PROCESS CHECKUP MEDICAL RECORD SELESAI')
@section('page_title_icon')
<i class="metismenu-icon fa fa-list"></i>
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
                            <table style="width: 100%">
                                <tr>
                                    <td style="font-weight: bold;">NIK</td>
                                    <td>:</td>
                                    <td>
                                        {{$queue->patient->nik}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Nama Lengkap</td>
                                    <td>:</td>
                                    <td>
                                        {{$queue->patient->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Sex / Umur</td>
                                    <td>:</td>
                                    <td>
                                        {{$queue->patient->gender}} / {{\Carbon\Carbon::parse($queue->patient->birth_date)
                                            ->diffInYears
                                            ()}}
                                            Thn
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Alamat</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->patient->address}}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Tanggal Masuk / Jam</td>
                                        <td>:</td>
                                        <td>
                                            {{\Carbon\Carbon::parse($queue->created_at)->format('d F Y / H:i')}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">No. Rekam Medis</td>
                                        <td>:</td>
                                        <td>
                                            001
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Dokter Pemeriksa</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->doctor->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Layanan</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->service->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Jenis Rawat</td>
                                        <td>:</td>
                                        <td>
                                            {{ $queue->jenis_rawat }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-header">
                            Data Pulang
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Pemeriksaan Penunjang</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['pemeriksaan_penunjang'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Terapi Pulang</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['terapi_pulang'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Terapi Tindakan</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['terapi_tindakan'] }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Keadaan</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['keadaan'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Cara Keluar</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['cara_keluar'] }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
