@extends('layouts.admin.app')
@section('meta_title', 'Lab')
@section('page_title', 'STATISTIK')
@section('page_title_icon')
<i class="metismenu-icon fa fa-chart-bar"></i>
@endsection

@php
use Illuminate\Support\Facades\DB;
use App\Models\Queue;
$max_number = Queue::whereDate('created_at', \Carbon\Carbon::today())->count();
@endphp

@section('content')
@role('admin')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Pasien</div>
                        <div class="widget-subheading">Jumlah Pasien</div>
                        <div class="widget-numbers">{{\App\Models\Patient::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-success">
                            <i class="fa fa-3x fa fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Dokter</div>
                        <div class="widget-subheading">Jumlah Dokter</div>
                        <div class="widget-numbers">{{\App\Models\User::where('role', 'dokter')->count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-primary">
                            <i class="fa fa-3x fa fa-user-md"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Obat</div>
                        <div class="widget-subheading">Jumlah obat</div>
                        <div class="widget-numbers">{{\App\Models\Drug::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-danger">
                            <i class="fa fa-3x fa-prescription-bottle-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Rekam Medis</div>
                        <div class="widget-subheading">Jumlah Rekam Medis</div>
                        <div class="widget-numbers">{{\App\Models\MedicalRecord::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-warning">
                            <i class="fa fa-3x fa fa-medkit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elserole('apoteker')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">List Antrian Obat</div>
                        <div class="widget-subheading">Jumlah Pasien</div>
                        <div class="widget-numbers">{{ $max_number }}</div>
                        {{-- <div class="widget-numbers">{{\App\Models\Queue::count()}}</div> --}}
                    </div>
                    <div class="widget-content-right">
                        <div class="text-success">
                            <i class="fa fa-3x fa fa-clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Obat</div>
                        <div class="widget-subheading">Jumlah obat</div>
                        <div class="widget-numbers">{{\App\Models\Drug::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-primary">
                            <i class="fa fa-3x fa-prescription-bottle-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Nota Obat</div>
                        <div class="widget-subheading">Jumlah Nota Obat</div>
                        <div class="widget-numbers">{{\App\Models\Transaction::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-danger">
                            <i class="fa fa-3x fa fa-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Harga Jasa</div>
                        <div class="widget-subheading">Jumlah Harga Jasa</div>
                        <div class="widget-numbers">{{\App\Models\User::where('role', 'dokter')->count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-warning">
                            <i class="fa fa-3x fa fa-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elserole('dokter')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">List Antrian Hari Ini</div>
                        <div class="widget-subheading">Jumlah Pasien</div>
                        <div class="widget-numbers">{{ $max_number }}</div>
                        {{-- <div class="widget-numbers">{{\App\Models\Queue::count()}}</div> --}}
                    </div>
                    <div class="widget-content-right">
                        <div class="text-success">
                            <i class="fa fa-3x fa fa-clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Pasien</div>
                        <div class="widget-subheading">Jumlah Pasien</div>
                        <div class="widget-numbers">{{\App\Models\Patient::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-primary">
                            <i class="fa fa-3x fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Rekam Medis</div>
                        <div class="widget-subheading">Jumlah Rekam Medis</div>
                        <div class="widget-numbers">{{\App\Models\MedicalRecord::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-danger">
                            <i class="fa fa-3x fa-medkit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Diagnosis</div>
                        <div class="widget-subheading">Jumlah Diagnosis</div>
                        <div class="widget-numbers">{{\App\Models\Diagnosis::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-warning">
                            <i class="fa fa-3x fa fa-info-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elserole('bidan')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Keluarga Berencana</div>
                        <div class="widget-subheading">Jumlah Data KB</div>
                        <div class="widget-numbers">{{\App\Models\Familyplanning::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-warning">
                            <i class="fa fa-3x fa fa-child"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Pemeriksaan ANC</div>
                        <div class="widget-subheading">Jumlah Data Pemeriksaan ANC</div>
                        <div class="widget-numbers">{{\App\Models\Gravida::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-primary">
                            <i class="fa fa-3x fa fa-medkit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elserole('dokumentasi')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Dokumentasi</div>
                        <div class="widget-subheading">Jumlah Dokumentasi</div>
                        <div class="widget-numbers">{{\App\Models\Documentation::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-primary">
                            <i class="fa fa-3x fa-file-medical"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Parameter</div>
                        <div class="widget-subheading">Jumlah Parameter</div>
                        <div class="widget-numbers">{{\App\Models\Parameter::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-danger">
                            <i class="fa fa-3x fa-file-medical"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Data Response</div>
                        <div class="widget-subheading">Jumlah Response</div>
                        <div class="widget-numbers">{{\App\Models\Response::count()}}</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="text-success">
                            <i class="fa fa-3x fa-file-medical-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection


@push('scripts')
<script>
    var max_number = {{ \App\Models\Queue::whereDate('created_at', \Carbon\Carbon::today())->count() }};
</script>
@endpush
