@php
$convert = json_decode($queue->medicalrecord->physical_test, true);
@endphp

@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'HISTORY PEMERIKSAAN RAWAT JALAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-history"></i>
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
                                    <tr>
                                        <td style="font-weight: bold;">Gol. Darah</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->patient->blood_type}}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Tanggal Periksa / Jam</td>
                                        <td>:</td>
                                        <td>
                                            {{\Carbon\Carbon::parse($queue->created_at)->format('d F Y / H:i')}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">No. Rekam Medis</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->patient->no_rekam_medis}}
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
                            Data Pemeriksaan Rawat Jalan
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Alasan Masuk (Anamnesa)</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->medicalrecord->anamnesis}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Riwayat Alergi</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->patient->allergy}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Keluhan Utama</td>
                                        <td>:</td>
                                        <td>
                                            {{$queue->medicalrecord->main_complaint}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Riwayat Penyakit</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['history_disease'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Tinggi Badan (CM)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['height'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Berat Badan (KG)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['weight'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Komplikasi</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['komplikasi'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Kepala</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['kepala'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Mata</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['mata'] }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="font-weight: bold;">Suhu (C)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['temperature'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Nadi (X/Menit)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['pulse'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Respirasi (X/Menit)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['respiration'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Tekanan Darah (mmHg)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['blood_pressure'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Kelenjar Getah Bening Ka/Ki</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['leher'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Thoraks</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['thoraks'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Pulmo</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['pulmo'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Abdomen</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['abdomen'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Ekstremitas</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['ekstremitas'] }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td style="font-weight: bold;">Keterangan</td>
                                        <td>:</td>
                                        <td>
                                            {{ $convert['keterangan'] }}
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td style="font-weight: bold; vertical-align: top;">Keterangan</td>
                                        <td style="font-weight: bold; vertical-align: top;">:</td>
                                        <td>
                                            <p>
                                                {!! nl2br(e($convert['keterangan'])) !!}
                                            </p>
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
