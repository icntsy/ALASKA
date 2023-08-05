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
    <li class="app-sidebar__heading">Data Master</li>
    <li>
        <a href="{{ route('queue.drug') }}" class="@if (Request::is('antri/*')) mm-active @endif">
            <i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
            Proses Pembayaran
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
    <li>
        <a href="{{ route('drug.index') }}" class="@if (Request::is('obat*')) mm-active @endif">
            <i class="metismenu-icon fa fa-prescription-bottle-alt"></i>
            Data Obat
        </a>
    </li>
    {{-- <li>
        <a href="{{ route('lab.index') }}" class="@if (Request::is('lab*')) mm-active @endif">
            <i class="metismenu-icon fa fa-file-medical-alt"></i>
            Data Laboratorium
        </a>
    </li> --}}
    <li>
        <a href="{{ route('room.index') }}" class="@if (Request::is('ruangan*')) mm-active @endif">
            <i class="metismenu-icon fa fa-bed" aria-hidden="true"></i>
            Data Ruangan
        </a>
    </li>
    <li>
        <a href="{{ route('service.index') }}" class="@if (Request::is('layanan*')) mm-active @endif">
            <i class="metismenu-icon fa fa-server" aria-hidden="true"></i>
            Data Layanan
        </a>
    </li>
    <li>
        <a href="{{ route('medicalrecord.index') }}" class="@if (Request::is('rekam-medis*')) mm-active @endif">
            <i class="metismenu-icon fa fa-medkit" aria-hidden="true"></i>
            Data Rekam Medis
        </a>
    </li>
    <li class="app-sidebar__heading">DATA USERS</li>
    <li>
        <a href="{{ route('user.index') }}" class="@if (Request::is('user*')) mm-active @endif">
            <i class="metismenu-icon fa fa-user" aria-hidden="true"></i>
            Data User
        </a>
    </li>
</ul>
