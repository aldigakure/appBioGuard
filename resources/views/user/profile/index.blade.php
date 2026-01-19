@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/observasi.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/profile-badges.css') }}">
@endsection


@section('content')

@php
    $userName = auth()->user()->name ?? null;
    $userEmail = auth()->user()->email ?? null;
    $userExpertise =  auth()->user()->expertise ?? null;
    $userAvatar = auth()->user()->avatar ?? null;
    $userPhone = auth()->user()->phone ?? null;
    $userLocation = auth()->user()->location ?? null;
    $userBio = auth()->user()->bio ?? null;

   
@endphp
    @include('layouts.navbar-dashboard')
    <main class="dashboard-main" style="padding-top: 6rem;">
        <div class="dashboard-container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="d-flex align-items-center justify-content-between p-4 flex-wrap gap-4 ">
                    <div class="d-flex align-items-center gap-4">
                        <div class="profile-avatar">
                            @if ($userAvatar)
                                <img src="{{ asset('storage/' . $userAvatar) }}" alt="Avatar" id="profileAvatarImg"
                                    class="object-fit-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=10b981&color=fff&size=120"
                                    alt="Avatar" id="profileAvatarImg">
                            @endif
                        </div>
                        <div class="profile-details">
                            <h1 class="profile-name">{{ $userName }}</h1>
                            <p class="profile-email">{{ $userEmail }}</p>
                            <div class="profile-badges">
                            @php
                                $userRole = auth()->user()->role->role_name ?? 'warga';
                                $roleConfig = match($userRole) {
                                    'admin' => [
                                        'class' => 'role-admin', 
                                        'label' => 'Administrator', 
                                        'icon' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" fill="url(#adminGlass)" stroke="currentColor" stroke-width="1.2"/>
                                            <path d="M12 7V17M12 7L9 10M12 7L15 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 14C8 14 9.5 16 12 16C14.5 16 16 14 16 14" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                                            <defs>
                                                <linearGradient id="adminGlass" x1="12" y1="2" x2="12" y2="22" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="currentColor" stop-opacity="0.2"/>
                                                    <stop offset="1" stop-color="currentColor" stop-opacity="0.05"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>'
                                    ],
                                    'jagawana' => [
                                        'class' => 'role-jagawana', 
                                        'label' => 'Jagawana', 
                                        'icon' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 3L14.5 9.5L21 12L14.5 14.5L12 21L9.5 14.5L3 12L9.5 9.5L12 3Z" fill="url(#jagaGlass)" stroke="currentColor" stroke-width="1.2"/>
                                            <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.2"/>
                                            <defs>
                                                <linearGradient id="jagaGlass" x1="12" y1="3" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="currentColor" stop-opacity="0.2"/>
                                                    <stop offset="1" stop-color="currentColor" stop-opacity="0.05"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>'
                                    ],
                                    'warga' => [
                                        'class' => 'role-warga', 
                                        'label' => 'Warga Lokal', 
                                        'icon' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="4" y="4" width="16" height="16" rx="5" fill="url(#wargaGlass)" stroke="currentColor" stroke-width="1.2"/>
                                            <path d="M9 14.5C9 14.5 10 16 12 16C14 16 15 14.5 15 14.5M12 8V12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                            <defs>
                                                <linearGradient id="wargaGlass" x1="12" y1="4" x2="12" y2="20" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="currentColor" stop-opacity="0.2"/>
                                                    <stop offset="1" stop-color="currentColor" stop-opacity="0.05"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>'
                                    ],
                                    default => [
                                        'class' => 'role-warga', 
                                        'label' => 'Warga Lokal', 
                                        'icon' => '🏡'
                                    ],
                                };
                            @endphp
                            <span class="role-badge {{ $roleConfig['class'] }}">
                                {!! $roleConfig['icon'] !!} {{ $roleConfig['label'] }}
                            </span>
                            <span class="badge text-success badge-volunteer">{{ $userExpertise }}</span>
                            <span class="badge text-primary badge-verified">✓ Terverifikasi</span>
                        </div>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary align-self-start me-2 mt-3">Edit Profil</a>
                </div>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="profile-stats">
            <div class="profile-stat-card">
                <div class="stat-number">127</div>
                <div class="stat-desc">Total Observasi</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">89</div>
                <div class="stat-desc">Terverifikasi</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">45</div>
                <div class="stat-desc">Spesies Unik</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">2,450</div>
                <div class="stat-desc">Poin Gamifikasi</div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="profile-content-grid">
            <!-- Left Column -->
            <div class="profile-left">
                <!-- About Section -->
                <div class="profile-card">
                    <h3 class="card-title mb-3">📋 Tentang Saya</h3>
                    <p class="profile-bio">{{ $userBio }}</p>
                    <div class="profile-info-list">
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>{{ $userLocation }}</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>Bergabung Jan 2024</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72">
                                </path>
                            </svg>
                            <span>{{ $userPhone }}</span>
                        </div>
                    </div>
                </div>

                <!-- Achievements -->
                <div class="profile-card">
                    <h3 class="card-title mb-3">🏆 Pencapaian</h3>
                    <div class="achievements-grid">
                        <div class="achievement-item">
                            <div class="achievement-icon">🌟</div>
                            <span>First Observer</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">🦋</div>
                            <span>Species Hunter</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">📸</div>
                            <span>Photo Expert</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">🌍</div>
                            <span>Explorer</span>
                        </div>
                        <div class="achievement-item locked">
                            <div class="achievement-icon">🔒</div>
                            <span>Master</span>
                        </div>
                        <div class="achievement-item locked">
                            <div class="achievement-icon">🔒</div>
                            <span>Legend</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="profile-right">
                <!-- Recent Activity -->
                <div class="profile-card">
                    <h3 class="card-title mb-3">📊 Aktivitas Terbaru</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon icon-green">🦧</div>
                            <div class="activity-content">
                                <span class="activity-title">Mengamati Orangutan Kalimantan</span>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-cyan">📸</div>
                            <div class="activity-content">
                                <span class="activity-title">Mengunggah 5 foto Harimau Sumatera</span>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-amber">🏆</div>
                            <div class="activity-content">
                                <span class="activity-title">Memperoleh badge "Photo Expert"</span>
                                <span class="activity-time">3 hari yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-violet">🌱</div>
                            <div class="activity-content">
                                <span class="activity-title">Ikut Program Reboisasi Kalimantan</span>
                                <span class="activity-time">1 minggu yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Observations -->
                <div class="profile-card">
                    <div class="card-header-flex">
                        <h3 class="card-title">🔭 Observasi Saya</h3>
                        <a href="{{ route('observasi') }}" class="see-all-link">Lihat Semua →</a>
                    </div>
                    <div class="mini-observations">
                        @foreach ([['icon' => '🦧', 'name' => 'Orangutan Kalimantan', 'status' => 'verified'], ['icon' => '🐅', 'name' => 'Harimau Sumatera', 'status' => 'pending'], ['icon' => '🦜', 'name' => 'Kakatua Raja', 'status' => 'verified']] as $obs)
                            <div class="mini-obs-item">
                                <div class="mini-obs-icon">{{ $obs['icon'] }}</div>
                                <span class="mini-obs-name">{{ $obs['name'] }}</span>
                                <span
                                    class="status-badge status-{{ $obs['status'] }}">{{ $obs['status'] == 'verified' ? 'Verified' : 'Pending' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection