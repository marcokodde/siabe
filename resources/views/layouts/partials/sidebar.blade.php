<div class="dlabnav">
    <div class="dlabnav-scroll">
        <div class="dropdown header-profile2 ">
            <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                <div class="header-info2 d-flex align-items-center">
                    <img src="{{ url('/images/profile/user.png') }}" alt="">
                    <div class="d-flex align-items-center sidebar-info">
                        <div>
                            <span class="font-w400 d-block">{{ Auth::user()->name }}</span>
                            <small class="text-end font-w400">{{ Auth::user()->email }}</small>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="app-profile.html" class="dropdown-item ai-icon ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18"
                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                </a>
                <a href="email-inbox.html" class="dropdown-item ai-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18"
                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span class="ms-2">Inbox </span>
                </a>
                <a href="{{ route('login') }}" class="dropdown-item ai-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18"
                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Cerrar Sesión </span>
                </a>
            </div>
        </div>
        <ul class="dashboard" id="menu">
            <li><a href="{{ route('dashboard') }}">
                <i class="flaticon-025-dashboard"></i>
                <span class="nav-text">Inicio</span>
                </a>
            </li>
            <li><a href="{{ route('users') }}">
                <i class="fas fa-users aws"></i>
                <span class="nav-text">User</span>
                </a>
            </li>
            <li><a href="{{route('benchmark.dashboard')}}">
                <i class="fas fa-key aws"></i>
                <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{route('periods.user')}}">
                <i class="fas fa-percent aws"></i>
                <span class="nav-text">Ingresar Indicadores</span>
                </a>
            </li>
            <li><a href="{{ route('thermometer') }}">
                <i class="fas fa-temperature-high aws"></i>
                <span class="nav-text">Termómetro de Cartera</span>
                </a>
            </li>
            {{-- 
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="flaticon-043-menu"></i>
                <span class="nav-text">Catálogos</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('cat.periods') }}">Periodos</a></li>
                </ul>
            </li>
            <li><a href="{{ route('periods') }}">
                <i class="flaticon-093-waving"></i>
                <span class="nav-text">Benchmark</span>
                </a>
            </li> --}}
        </ul>
        <div class="plus-box">
            <p class="fs-14 font-w600 mb-2">ICM<br>Consultoría y Capacitación<br></p>
            {{-- <p>Lorem ipsum dolor sit amet</p> --}}
        </div>
        <div class="copyright">
            <p><strong>ICM Credit</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by ICM Credit</p>
        </div>
    </div>
</div>
