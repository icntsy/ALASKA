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
            Nota Pembayaran
        </a>
    </li>
    <li class="app-sidebar__heading">Setting</li>
    <li>
        <a href="{{ route('jasa.index') }}" class="@if (Request::is('jasa*')) mm-active @endif">
            <i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
            Harga Jasa
        </a>
    </li>
</ul>
