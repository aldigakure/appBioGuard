<nav id="navbar" class="navbar fixed-top navbar-expand-lg bg-transparent justify-content-center ">
    <div class="container-fluid">
        <a href="/" class="logo navbar-brand ms-4">
            <img src="{{ asset('assets/images/dinacom_notext.png') }}" class="d-none d-md-inline" style="width: 62px;"
                alt="BioGuard Logo">
            BIOGUARD
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @php
            $isBioGuardPage = request()->is('bioguard/*') || request()->is('peta');
            $baseUrl = $isBioGuardPage ? url('/') : '';
            @endphp
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 navbar-user gap-3" data-bioguard-page="{{ $isBioGuardPage ? 'true' : 'false' }}">
                {{-- Landing Page Navigation --}}
                <li class="nav-item">
                    <a href="{{ $baseUrl }}#home" class="nav-link text-capitalize">
                        <svg class="mobile-nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-capitalize dropdown-toggle {{ request()->is('bioguard/*') || request()->is('peta') ? 'active' : '' }}"
                        href="#" role="button" id="fitur-dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Fitur
                    </a>
                    <ul class="dropdown-menu dropdown-menu-features">
                        <li>
                            <a class="dropdown-item {{ request()->is('bioguard/*') ? 'active' : '' }}" href="{{ $baseUrl }}#features">
                                <span class="dropdown-item-icon">🔍</span>
                                <span class="dropdown-item-text">
                                    <span class="dropdown-item-title">BioGuard</span>
                                    <span class="dropdown-item-desc">Identifikasi spesies dengan AI</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ $baseUrl }}#bioaiCard">
                                <span class="dropdown-item-icon">🌳</span>
                                <span class="dropdown-item-text">
                                    <span class="dropdown-item-title">Bio-Ai</span>
                                    <span class="dropdown-item-desc">Dashboard analitik real-time</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('peta') ? 'active' : '' }}" href="{{ route('peta') }}">
                                <span class="dropdown-item-icon">🗺️</span>
                                <span class="dropdown-item-text">
                                    <span class="dropdown-item-title">EcoDetect</span>
                                    <span class="dropdown-item-desc">Peta interaktif habitat</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ $baseUrl }}#plantIdCard">
                                <span class="dropdown-item-icon">🤖</span>
                                <span class="dropdown-item-text">
                                    <span class="dropdown-item-title">PlantId</span>
                                    <span class="dropdown-item-desc">Identifikasi tumbuhan</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ $baseUrl }}#stats" class="nav-link text-capitalize">
                        <svg class="mobile-nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="20" x2="18" y2="10" />
                            <line x1="12" y1="20" x2="12" y2="4" />
                            <line x1="6" y1="20" x2="6" y2="14" />
                        </svg>
                        Statistik
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ $baseUrl }}#entities" class="nav-link text-capitalize">
                        <svg class="mobile-nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        Entitas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ $baseUrl }}#about" class="nav-link text-capitalize">
                        <svg class="mobile-nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="16" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                        </svg>
                        Tentang
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                @php
                    $isLoggedIn = Auth::check() || session('is_authenticated');
                    $userName =   $userName = auth()->user()->name ?? null;
                    $userAvatar =   $userAvatar = auth()->user()->avatar ?? null;
                @endphp

                @if ($isLoggedIn)
                {{-- Logged in user --}}
                <div class="user-dropdown dropdown me-4">
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
                <a href="{{ route('login') }}" class="btn btn-primary me-4">Masuk</a>
               
                @endif
            </div>
        </div>
    </div>
</nav>