<nav id="navbar" class="navbar fixed-top navbar-expand-lg bg-transparent nav-dashboard">

    <div class="container-fluid flex-nowrap">
        <a href="/" class="logo navbar-brand ms-2 ms-md-4">
            <img src="{{ asset('assets/images/dinacom_notext.png') }}" class="d-none d-md-inline" style="width: 42px;"
                alt="BioGuard Logo">
            BIOGUARD
        </a>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                {{-- navbar --}}
                @if (auth()->user()->role->role_name == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('observasi') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('observasi*') ? 'active' : '' }}">Observasi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('spesies') }}" class="nav-link text-capitalize {{ request()->routeIs('spesies') ? 'active' : '' }}">Spesies</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.laporan') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">Laporan</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('admin.users') ? 'active' : '' }}">Pengguna</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('warga.dashboard') || request()->routeIs('jagawana.dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>


                <li class="nav-item">
                    <a href="{{ auth()->user()->role->role_name == 'jagawana' ? route('jagawana.laporan') : route('warga.laporan') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('warga.laporan') || request()->routeIs('jagawana.laporan') ? 'active' : '' }}">
                        Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('spesies') }}"
                        class="nav-link text-capitalize {{ request()->routeIs('spesies') ? 'active' : '' }}">
                        Spesies
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quiz.index') }}"
                        class="nav-link text-capitalize {{ request()->is('quiz*') ? 'active' : '' }}">
                        Permainan
                    </a>
                </li>
                @endif

            </ul>



        </div>

        <div class="d-flex w-auto align-items-center gap-2 flex-nowrap" id="btn-group">

            <div class=" dropdown">
                <a class="notification-btn" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="notification-badge">3</span>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2">
                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                        <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                    </div>
                    <div class="message-body" data-simplebar>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                <span class="d-block">Congratulate him</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-2.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">New message</h6>
                                <span class="d-block">Salma sent you new message</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-3.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                <span class="d-block">Check your earnings</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-4.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                <span class="d-block">Assign her new tasks</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-5.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">John received payment</h6>
                                <span class="d-block">$230 deducted from account</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48" />
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                <span class="d-block">Congratulate him</span>
                            </div>
                        </a>
                    </div>
                    <div class="py-6 px-7 mb-1">
                        <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                    </div>
                </div>
            </div>

            @php
            $isLoggedIn = Auth::check() || session('is_authenticated');
            $userName = Auth::user()->name ?? (session('user.name') ?? 'User');
            $userAvatar = Auth::user()->avatar ?? (session('user.avatar') ?? null);
            @endphp

            @if ($isLoggedIn)

            {{-- Logged in user --}}
            <div class="user-dropdown dropdown">
                <button class="btn btn-user-menu dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if ($userAvatar)
                    <img src="{{ asset('storage/' . $userAvatar) }}" alt="User"
                        class="user-avatar-img">
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
            <a href="{{ route('login') }}" class="btn btn-outline me-2">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-primary me-4">Daftar</a>
            @endif

            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </div>
</nav>