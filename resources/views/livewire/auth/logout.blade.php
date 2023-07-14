<div class="app-header-right">
    <div class="header-btn-lg pr-0">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                            @if (Auth::user()->image)
                            <img src="{{ asset('storage/images/'.Auth::user()->image) }}" alt="Avatar" class="img-fluid profile-image rounded-circle" style="width: 42px; height: 42px;">
                            @else
                            <p>No image available</p>
                            @endif
                            {{ Auth::user()->name . ' (' . Auth::user()->role . ')' }}
                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                        </a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile.index') }}" class="dropdown-item">
                                <i class="pe-7s-users"></i>
                                User Account
                            </a>
                            <button wire:click="logout" type="button" tabindex="0" class="dropdown-item" ><i class="fa fa-fw" aria-hidden="true" title="fa-power-off">        </i>Logout</button>
                        </div>
                    </div>
                </div>
                <div class="widget-content-left  ml-3 header-user-info">
                    <div class="widget-heading">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="widget-subheading">
                        {{ Auth::user()->role }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
