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
<h1>test bidan</h1>
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
@endsection


@push('scripts')
<script>
    var max_number = {{ \App\Models\Queue::whereDate('created_at', \Carbon\Carbon::today())->count() }};
</script>
@endpush
