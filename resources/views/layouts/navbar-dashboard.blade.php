<nav id="navbar" class="navbar fixed-top navbar-expand-lg bg-transparent justify-content-center ">
    <div class="container-fluid">
        <a href="/" class="logo navbar-brand ms-4">
            <img src="{{ asset('assets/images/dinacom_notext.png') }}" class="d-none d-md-inline" style="width: 62px;"
            alt="BioGuard Logo">
            BIOGUARD
        </a>
        <button class="notification-btn ms-auto me-2 d-lg-none" onclick="showDemoNotification()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="notification-badge">5</span>
        </button>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
            
                {{-- Dashboard Navigation --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('observasi') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('observasi*') ? 'active' : '' }}">Observasi</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-capitalize">Spesies</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-capitalize">Laporan</a>
                </li>
                @if(Auth::check() && Auth::user()->role->role_name === 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link text-capitalize {{ request()->routeIs('admin.users') ? 'active' : '' }}">Pengguna</a>
                </li>
                @endif
            </ul>
            <button class="notification-btn me-6 d-none d-lg-flex" id="notificationBtnDesktop" onclick="showDemoNotification()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="notification-badge">5</span>
                </button>
            <div class="d-flex align-items-center gap-2">
                @php
                    $isLoggedIn = Auth::check() || session('is_authenticated');
                    $userName = Auth::user()->name ?? (session('admin_user.name') ?? 'User');
                    $userAvatar = session('admin_user.avatar') ?? null;
                @endphp

                @if ($isLoggedIn)
                    <div class="d-flex flex-row">
                    <!-- Notification Button -->
                    </div>
                    {{-- Logged in user --}}
                    <div class="user-dropdown dropdown">
                        <button class="btn btn-user-menu dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if ($userAvatar)
                                <img src="{{ asset('storage/' . $userAvatar) }}" alt="User" class="user-avatar-img">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=10b981&color=fff&size=32"
                                    alt="User" class="user-avatar-img">
                            @endif
                            <span class="user-name d-none d-md-inline">{{ $userName }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" class="me-2">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    Dashboard
                                </a></li>
                            @if(Auth::user()->role->role_name === 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.users') }}">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" class="me-2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Manajemen Pengguna
                                </a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('profile') }}">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" class="me-2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Profil
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" class="me-2">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline me-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary me-4">Daftar</a>
                @endif
            </div>
        </div>
    </div>
</nav>
