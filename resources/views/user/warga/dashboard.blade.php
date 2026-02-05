@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bioguard.css') }}">
<!-- Leaflet.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
<!-- BioGuard Map CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bioguard-map.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<!-- User Dashboard Welcome Section -->
<div class="user-dashboard-welcome">
    <div class="user-dashboard-container">
        <div class="user-welcome-content">
            <div class="user-welcome-badge">
                <span>🌿</span>
                <span>Dashboard Pengguna</span>
            </div>
            <h1 class="user-welcome-title">Selamat Datang, <span class="text-gradient">{{ Auth::user()->name ?? 'Pengguna' }}</span>!</h1>
            <p class="user-welcome-desc">
                Pantau dan jelajahi keanekaragaman hayati Indonesia melalui peta interaktif di bawah. 
                Klik pada marker provinsi untuk melihat detail spesies flora dan fauna yang terdapat di wilayah tersebut.
            </p>
        </div>
    </div>
</div>

<!-- Flora Interactive Map Section -->
<section class="bioguard-section bioguard-map-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:middle;margin-right:8px;"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>Peta Interaktif Habitat Flora</h2>
        <p class="bioguard-section-subtitle">Jelajahi sebaran habitat tumbuhan langka di Indonesia</p>

        <div class="bioguard-map-container">
            <div class="bioguard-map-wrapper">
                <div id="flora-map" class="bioguard-map-interactive flora"></div>
            </div>
            <div class="bioguard-habitat-list" id="floraHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon"><svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></div>
                    <p>Klik marker pada peta untuk melihat detail flora provinsi</p>
                </div>
            </div>
        </div>

        <!-- Flora Lainnya Section (ID sama dengan BioGuard) -->
        <div id="floraLainnyaContainer" class="flora-lainnya-wrapper"></div>
    </div>
</section>

<!-- Fauna Interactive Map Section -->
<section class="bioguard-section bioguard-map-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:middle;margin-right:8px;"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>Peta Interaktif Habitat Fauna</h2>
        <p class="bioguard-section-subtitle">Jelajahi sebaran habitat satwa liar di Indonesia</p>

        <div class="bioguard-map-container">
            <div class="bioguard-map-wrapper">
                <div id="fauna-map" class="bioguard-map-interactive fauna"></div>
            </div>
            <div class="bioguard-habitat-list" id="faunaHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon"><svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8"/><path d="M12 17a5 5 0 0 0 5-5c0-4-5-9-5-9s-5 5-5 9a5 5 0 0 0 5 5Z"/><path d="m9.5 14.5 5-5"/></svg></div>
                    <p>Klik marker pada peta untuk melihat detail fauna provinsi</p>
                </div>
            </div>
        </div>

        <!-- Fauna Lainnya Section (ID sama dengan BioGuard) -->
        <div id="faunaLainnyaContainer" class="fauna-lainnya-wrapper"></div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="user-stats-section">
    <div class="user-map-container">
        <div class="user-quick-stats">
            <div class="user-quick-stat-card flora">
                <div class="user-quick-stat-icon">🌿</div>
                <div class="user-quick-stat-number">30,000+</div>
                <div class="user-quick-stat-label">Spesies Tumbuhan</div>
            </div>
            <div class="user-quick-stat-card flora">
                <div class="user-quick-stat-icon">🌺</div>
                <div class="user-quick-stat-number">5,000+</div>
                <div class="user-quick-stat-label">Spesies Anggrek</div>
            </div>
            <div class="user-quick-stat-card fauna">
                <div class="user-quick-stat-icon">🦋</div>
                <div class="user-quick-stat-number">8,500+</div>
                <div class="user-quick-stat-label">Spesies Hewan</div>
            </div>
            <div class="user-quick-stat-card">
                <div class="user-quick-stat-icon">⚠️</div>
                <div class="user-quick-stat-number">2,500+</div>
                <div class="user-quick-stat-label">Spesies Terancam</div>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet.js Script -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!-- Pakai JS BioGuard langsung (sama dengan pages BioGuard Flora & Fauna) -->
<script src="{{ asset('assets/js/bioguard-flora-leaflet.js') }}"></script>
<script src="{{ asset('assets/js/bioguard-fauna-leaflet.js') }}"></script>

@endsection