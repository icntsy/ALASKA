<ul class="vertical-nav-menu">
    <li class="app-sidebar__heading">Dashboard</li>
    <li>
        <a href="{{ route('home') }}" class="@if (Request::is('/')) mm-active @endif">
            <i class="metismenu-icon fa fa-home" aria-hidden="true"></i>
            Home
        </a>
    </li>
    <li class="app-sidebar__heading">Data Antrian</li>
    <li>
        <a href="{{ route('queue.index') }}" class="@if (Request::is('antrian*')) mm-active @endif">
            <i class="metismenu-icon fa fa-clipboard fa-1x" aria-hidden="true"></i>
            Antrian Periksa
        </a>
    </li>
    <li class="app-sidebar__heading">Data Transaksi</li>
    <li>
        <a href="{{ route('queue.drug') }}" class="@if (Request::is('antri/*')) mm-active @endif">
            <i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
            Proses Pembayaran
        </a>
    </li>
    <li class="app-sidebar__heading">Data Pemeriksaan</li>
    <li>
        <a href="{{ route('progres.index') }}" class="@if (Request::is('progres*')) mm-active @endif">
            <i class="metismenu-icon fa fa-spinner" aria-hidden="true"></i>
            Progres Rawat Inap
        </a>
    </li>
    <li>
        <a href="{{ route('jalan.index') }}" class="@if (Request::is('jalan*')) mm-active @endif">
            <i class="metismenu-icon fa fa-history" aria-hidden="true"></i>
            History Rawat Jalan
        </a>
    </li>
    <li class="app-sidebar__heading">Data Master</li>
    <li>
        <a href="{{ route('medicalrecord.index') }}" class="@if (Request::is('rekam-medis*')) mm-active @endif">
            <i class="metismenu-icon fa fa-medkit" aria-hidden="true"></i>
            Data Rekam Medis
        </a>
    </li>
    <li>
        <a href="{{ route('detailpatient.index') }}" class="@if (Request::is('detail*')) mm-active @endif">
            <i class="metismenu-icon fa fa-users" aria-hidden="true"></i>
            Detail Pasien
        </a>
    </li>
    <li>
        <a href="{{ route('patient.index') }}" class="@if (Request::is('pasien*')) mm-active @endif">
            <i class="metismenu-icon fa fa-user-plus" aria-hidden="true"></i>
            Data Pasien
        </a>
    </li>
    <li>
        <a href="{{ route('diagnosis.index') }}" class="@if (Request::is('diagnosis*')) mm-active @endif">
            <i class="metismenu-icon fa fa-file-alt" aria-hidden="true"></i>
            Data Diagnosis
        </a>
    </li>
</ul>
