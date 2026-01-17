<nav id="navbar" class="navbar fixed-top navbar-expand-lg bg-transparent justify-content-center ">
    <div class="container-fluid">
        <a href="/" class="logo navbar-brand ms-4">
            <img src="{{ asset('assets/images/dinacom_notext.png') }}" class="d-none d-md-inline" style="width: 62px;"
                alt="BioGuard Logo">
            BIOGUARD
        </a>
        <!-- Mobile Notification Dropdown -->
        <div class="dropdown ms-auto me-2 d-lg-none">
            <button class="notification-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="notification-badge">3</span>
            </button>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown notification-dropdown-mobile p-0 border-0 shadow-lg">
                <div class="notification-header border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold">Notifikasi</h6>
                    <a href="#" class="text-decoration-none text-success small fw-semibold">Tandai dibaca</a>
                </div>
                <div class="notification-list" style="max-height: 80vh; overflow-y: auto;">
                    <a href="#" class="notification-item d-flex align-items-start p-3 border-bottom text-decoration-none text-dark bg-light-subtle">
                        <div class="notification-icon rounded-3 bg-primary-subtle text-primary p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            🌿
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 fw-semibold text-sm">Observasi Terverifikasi</p>
                            <p class="mb-1 text-muted small text-xs">Laporan "Anggrek Hitam" Anda telah disetujui.</p>
                            <span class="text-muted text-xs tiny">2 jam yang lalu</span>
                        </div>
                    </a>
                    <a href="#" class="notification-item d-flex align-items-start p-3 border-bottom text-decoration-none text-dark">
                        <div class="notification-icon rounded-3 bg-warning-subtle text-warning p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            ⚠️
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 fw-semibold text-sm">Peringatan Habitat</p>
                            <p class="mb-1 text-muted small text-xs">Area konservasi A-12 mendeteksi aktivitas ilegal.</p>
                            <span class="text-muted text-xs tiny">5 jam yang lalu</span>
                        </div>
                    </a>
                    <a href="#" class="notification-item d-flex align-items-start p-3 text-decoration-none text-dark">
                        <div class="notification-icon rounded-3 bg-info-subtle text-info p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            📢
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 fw-semibold text-sm">Pengumuman Sistem</p>
                            <p class="mb-1 text-muted small text-xs">Pemeliharaan sistem terjadwal malam ini.</p>
                            <span class="text-muted text-xs tiny">1 hari yang lalu</span>
                        </div>
                    </a>
                </div>
                <div class="notification-footer p-2 text-center border-top">
                    <a href="#" class="d-block py-1 text-decoration-none text-success fw-semibold small">Lihat Semua Notifikasi</a>
                </div>
            </div>
        </div>

        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                {{-- navbar --}}
                @if (auth()->user()->role->role_name == 'admin')
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
                        <a href="{{ route('admin.laporan') }}"
                            class="nav-link text-capitalize {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">Laporan</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}"
                            class="nav-link text-capitalize {{ request()->routeIs('admin.users') ? 'active' : '' }}">Pengguna</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('user.dashboard') }}"
                            class="nav-link text-capitalize {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Dashboard</a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link text-capitalize">Menu Lainnya</a>
                    </li>
                @endif

            </ul>
            <!-- Desktop Notification Dropdown -->
            <div class="dropdown me-6 d-none d-lg-block">
                <button class="notification-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="notification-badge">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown p-0 border-0 shadow-lg">
                    <div class="notification-header border-bottom p-3 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold">Notifikasi</h6>
                        <a href="#" class="text-decoration-none text-success small fw-semibold">Tandai dibaca</a>
                    </div>
                    <div class="notification-list" style="max-height: 300px; overflow-y: auto;">
                        <a href="#" class="notification-item d-flex align-items-start p-3 border-bottom text-decoration-none text-dark bg-light-subtle">
                            <div class="notification-icon rounded-3 bg-primary-subtle text-primary p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                🌿
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 fw-semibold text-sm">Observasi Terverifikasi</p>
                                <p class="mb-1 text-muted small text-xs">Laporan "Anggrek Hitam" Anda telah disetujui.</p>
                                <span class="text-muted text-xs tiny">2 jam yang lalu</span>
                            </div>
                        </a>
                        <a href="#" class="notification-item d-flex align-items-start p-3 border-bottom text-decoration-none text-dark">
                            <div class="notification-icon rounded-3 bg-warning-subtle text-warning p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                ⚠️
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 fw-semibold text-sm">Peringatan Habitat</p>
                                <p class="mb-1 text-muted small text-xs">Area konservasi A-12 mendeteksi aktivitas ilegal.</p>
                                <span class="text-muted text-xs tiny">5 jam yang lalu</span>
                            </div>
                        </a>
                        <a href="#" class="notification-item d-flex align-items-start p-3 text-decoration-none text-dark">
                            <div class="notification-icon rounded-3 bg-info-subtle text-info p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                📢
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 fw-semibold text-sm">Pengumuman Sistem</p>
                                <p class="mb-1 text-muted small text-xs">Pemeliharaan sistem terjadwal malam ini.</p>
                                <span class="text-muted text-xs tiny">1 hari yang lalu</span>
                            </div>
                        </a>
                    </div>
                    <div class="notification-footer p-2 text-center border-top">
                        <a href="#" class="d-block py-1 text-decoration-none text-success fw-semibold small">Lihat Semua Notifikasi</a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                @php
                    $isLoggedIn = Auth::check() || session('is_authenticated');
                    $userName = Auth::user()->name ?? (session('user.name') ?? 'User');
                    $userAvatar = Auth::user()->avatar ?? (session('user.avatar') ?? null);
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
                            <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">
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
            </div>
        </div>
    </div>
</nav>

<script>
    // Placeholder for mobile button if it still calls this
    function showDemoNotification() {
        console.log('Notification clicked');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // "Mark as read" demo functionality
        const markReadBtns = document.querySelectorAll('.dropdown-menu .text-success');
        
        markReadBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Hide ALL badges
                const badges = document.querySelectorAll('.notification-badge');
                badges.forEach(badge => badge.style.display = 'none');

                // Visual feedback on ALL items in ALL dropdowns
                const items = document.querySelectorAll('.notification-item');
                items.forEach(item => {
                    item.style.opacity = '0.6';
                });
            });
        });
    });
</script>
