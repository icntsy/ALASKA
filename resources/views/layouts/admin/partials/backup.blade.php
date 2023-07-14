<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            {{ Auth::user()->role }}
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{ route('home') }}" class="@if (Request::is('/')) mm-active @endif">
                        <i class="metismenu-icon fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                </li>
                @role('admin|dokter')
                <li class="app-sidebar__heading">Data Antrian</li>
                <li>
                    <a href="{{ route('queue.index') }}" class="@if (Request::is('antrian*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard fa-1x" aria-hidden="true"></i>
                        Antrian Periksa
                    </a>
                </li>
                @role('admin|dokter')
                <li class="app-sidebar__heading">Data Pemeriksaan</li>
                <li>
                    <a href="{{ route('progres.index') }}" class="@if (Request::is('progres*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-spinner" aria-hidden="true"></i>
                        Progres Rawat Inap
                    </a>
                </li>
                <li>
                    <a href="{{ route('medicalrecord.index') }}" class="@if (Request::is('rekam-medis*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-medkit" aria-hidden="true"></i>
                        Data Rekam Medis
                    </a>
                </li>
                <li class="app-sidebar__heading">Data Transaksi</li>
                <li>
                    <a href="{{ route('queue.drug') }}" class="@if (Request::is('antri/*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard" aria-hidden="true"></i>
                        Proses Pembayaran
                    </a>
                </li>
                @endrole
                <li class="app-sidebar__heading">Data Master</li>
                <li>
                    <a href="{{ route('patient.index') }}" class="@if (Request::is('pasien*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-users" aria-hidden="true"></i>
                        Data Pasien
                    </a>
                </li>
                <li>
                    <a href="{{ route('medicalrecord.index') }}" class="@if (Request::is('rekam-medis*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-medkit" aria-hidden="true"></i>
                        Data Rekam Medis
                    </a>
                </li>
                <li>
                    <a href="{{ route('diagnosis.index') }}" class="@if (Request::is('diagnosis*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-file-alt" aria-hidden="true"></i>
                        Data Diagnosis
                    </a>
                </li>
                @unlessrole('dokter')
                <li>
                    <a href="{{ route('drug.index') }}" class="@if (Request::is('obat*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-prescription-bottle-alt"></i>
                        Data Obat
                    </a>
                </li>
                <li>
                    <a href="{{ route('lab.index') }}" class="@if (Request::is('lab*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-file-medical-alt"></i>
                        Data Laboratorium
                    </a>
                </li>
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
                @endrole
                @role('admin')
                <li class="app-sidebar__heading">DATA USERS</li>
                <li>
                    <a href="{{ route('user.index') }}" class="@if (Request::is('user*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-user-plus" aria-hidden="true"></i>
                        Data User
                    </a>
                </li>
                @endrole
                @role('bidan')
                <li class="app-sidebar__heading">Data Antrian</li>
                <li>
                    <a href="{{ route('queue.index') }}" class="@if (Request::is('antrian*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard" aria-hidden="true"></i>
                        Antrian Periksa
                    </a>
                </li>
                <li class="app-sidebar__heading">Data Bidan</li>
                <li>
                    <a href="{{ route('history.index') }}" class="@if (Request::is('history*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-medkit" aria-hidden="true"></i>
                        Pemeriksaan ANC
                    </a>
                </li>
                <li>
                    <a href="{{ route('immunization.index') }}" class="@if (Request::is('imunisasi*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard"></i>
                        Data Imunisasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('familyplanning.index') }}" class="@if (Request::is('keluargaberencana*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard-list"></i>
                        Data Keluarga Berencana
                    </a>
                </li>
                @role('apoteker')
                <li class="app-sidebar__heading">Data Antrian</li>
                <li>
                    <a href="{{ route('queue.drug') }}" class="@if (Request::is('antri/*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-clipboard" aria-hidden="true"></i>
                        Antrian Obat
                    </a>
                </li>
                <li class="app-sidebar__heading">Data Master</li>
                <li>
                    <a href="{{ route('drug.index') }}" class="@if (Request::is('obat*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-prescription-bottle-alt"></i>
                        Data Obat
                    </a>
                </li>
                <li>
                    <a href="{{ route('nota.index') }}" class="@if (Request::is('nota*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
                        Nota Obat
                    </a>
                </li>
                <li class="app-sidebar__heading">Setting</li>
                <li>
                    <a href="{{ route('jasa.index') }}" class="@if (Request::is('jasa*')) mm-active @endif">
                        <i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
                        Harga Jasa
                    </a>
                </li>
                @endrole
            </ul>
            <footer class="text-center text-white" style="background-color: #fff;  height: 75px; position: relative; bottom:0; left: 0; width: 280px">
                <!-- Grid container -->
                <div class="container p-0 pb-0">
                </div>
                <!-- Grid container -->
                <div class="text-center p-0" style="background-color: #fff; ">
                    <p class="d-flex justify-content-center align-items-center"></p>
                    <p class="big"><span>KLINIK LAA TACHZAN</span></p>
                    <p class="big"><span>© 2023 Copyright</span></p>
                </div>
            </footer>
        </div>
    </div>
</div>
