<div>
    <div class="section-menu-left">
        <div class="box-logo">
            <a href="index.html" id="site-logo-inner">
                <img class="" id="logo_header" alt="" src="{{ asset('images/logo/logo.png') }}" data-light="images/logo/logo.png" data-dark="{{ asset('images/logo/logo-dark.png')}}">
            </a>
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
        </div>
        <div class="center">
            <div class="center-item">
                <div class="center-heading">Main Home</div>
                <ul class="menu-list">
                    <li class="menu-item @if(request()->is('home')) has-children active @endif">
                        <a wire:navigate href="/home" class="menu-item-button">
                            <div class="icon"><i class="icon-grid"></i></div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="center-item">
                <div class="center-heading">All page</div>
                <ul class="menu-list">
                    <li class="menu-item @if(request()->is('reservation')||request()->is('new-reservation')) has-children active @endif">
                        <a wire:navigate href="/reservation" class="menu-item-button">
                            <div class="icon"><i class="fa-solid fa-bag-shopping"></i></div>
                            <div class="text">Reservations</div>
                        </a>
                    </li>
                    <li class="menu-item @if(request()->is('client')) has-children active @endif">
                        <a wire:navigate href="/client" class="menu-item-button">
                            <div class="icon"><i class="fa-solid fa-mug-hot"></i></div>
                            <div class="text">Clients</div>
                        </a>
                    </li>
                    <li class="menu-item @if(request()->is('room')) has-children active @endif">
                        <a wire:navigate href="/room" class="menu-item-button">
                            <div class="icon"><i class="fas fa-fw fa-box"></i></div>
                            <div class="text">Rooms</div>
                        </a>
                    </li>
                    <li class="menu-item @if(request()->is('room-category')) has-children active @endif">
                        <a wire:navigate href="/room-category" class="menu-item-button">
                            <div class="icon"><i class="icon-layers"></i></div>
                            <div class="text">Room Categories</div>
                        </a>
                    </li>


                    @if (auth()->user()->type == 'admin')
                    <li class="menu-item  @if(request()->is('user')) has-children active @endif">
                        <a wire:navigate href="/user" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">Users</div>
                        </a>
                    </li>

                    <li class="menu-item @if(request()->is('reports')) has-children active @endif">
                        <a wire:navigate href="/reports" class="menu-item-button">
                            <div class="icon"><i class="fa-solid fa-scroll"></i></div>
                            <div class="text">Report</div>
                        </a>
                    </li>
                    @endif
                    <li class="menu-item">
                        <a wire:navigate href="/logout" class="">
                            <div class="icon"><i class="fa-solid fa-power-off"></i></div>
                            <div class="text">Logout</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>