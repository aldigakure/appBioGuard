@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bioguard.css') }}">
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
                Klik pada provinsi mana saja untuk melihat detail spesies flora dan fauna yang terdapat di wilayah tersebut.
            </p>
        </div>
    </div>
</div>

<!-- Flora Interactive Map Section -->
<section class="user-map-section">
    <div class="user-map-container">
        <div class="dashboard-map-header">
            <div class="dashboard-map-icon flora">🌿</div>
            <div>
                <h2 class="dashboard-map-title">Peta Interaktif Flora Indonesia</h2>
                <p class="dashboard-map-subtitle">Jelajahi sebaran habitat tumbuhan langka di setiap provinsi</p>
            </div>
        </div>
        <div class="bioguard-map-container">
            <!-- Map Container -->
            <div class="bioguard-map-wrapper">
                <div id="flora-map" class="bioguard-map-interactive flora"></div>
                <div class="dashboard-map-legend">
                    <div class="dashboard-legend-title">Tingkat Keanekaragaman Flora</div>
                    <div class="dashboard-legend-items">
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #064e3b;"></span>
                            <span>Sangat Tinggi (>500 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #059669;"></span>
                            <span>Tinggi (300-500 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #34d399;"></span>
                            <span>Sedang (150-300 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #a7f3d0;"></span>
                            <span>Rendah (<150 spesies)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flora Detail Panel -->
            <div class="bioguard-habitat-list" id="floraHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon">🌿</div>
                    <p>Klik provinsi pada peta untuk melihat detail flora</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fauna Interactive Map Section -->
<section class="user-map-section fauna-section">
    <div class="user-map-container">
        <div class="dashboard-map-header">
            <div class="dashboard-map-icon fauna">🦋</div>
            <div>
                <h2 class="dashboard-map-title">Peta Interaktif Fauna Indonesia</h2>
                <p class="dashboard-map-subtitle">Jelajahi sebaran habitat satwa liar di setiap provinsi</p>
            </div>
        </div>
        <div class="bioguard-map-container">
            <!-- Map Container -->
            <div class="bioguard-map-wrapper">
                <div id="fauna-map" class="bioguard-map-interactive"></div>
                <div class="dashboard-map-legend">
                    <div class="dashboard-legend-title">Tingkat Keanekaragaman Fauna</div>
                    <div class="dashboard-legend-items">
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #b45309;"></span>
                            <span>Sangat Tinggi (>100 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #f59e0b;"></span>
                            <span>Tinggi (50-100 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #fbbf24;"></span>
                            <span>Sedang (25-50 spesies)</span>
                        </div>
                        <div class="dashboard-legend-item">
                            <span class="dashboard-legend-color" style="background: #fef3c7;"></span>
                            <span>Rendah (<25 spesies)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fauna Detail Panel -->
            <div class="bioguard-habitat-list" id="faunaHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon">🦋</div>
                    <p>Klik provinsi pada peta untuk melihat detail fauna</p>
                </div>
            </div>
        </div>
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

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<!-- External Map Scripts -->
<script src="{{ asset('assets/js/dashboard-flora-map.js') }}"></script>
<script src="{{ asset('assets/js/dashboard-fauna-map.js') }}"></script>

@endsection