@extends('layouts.app')

@section('content')
@include('layouts.navbar-landing')
<!-- Peta Kelompok Tani Hutan (KTH) Interactive Map Page -->
<div class="bioguard-header">
    <div class="bioguard-header-content">
        <div class="bioguard-header-nav">
            <a href="{{ url('/') }}#features" class="bioguard-back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Kembali
            </a>
            <div class="bioguard-header-badge">
                <span>🌾</span>
                <span>EcoDetect - Peta Interaktif</span>
            </div>
        </div>
        <h1 class="bioguard-header-title">Peta Persebaran <span class="text-gradient">Kelompok Tani Hutan</span></h1>
        <p class="bioguard-header-desc">Jelajahi data persebaran Kelompok Tani Hutan (KTH) di setiap provinsi Indonesia.</p>
    </div>
</div>

<!-- Interactive Map Section -->
<section class="bioguard-section peta-map-section">
    <div class="bioguard-container">
        <div class="peta-layout">
            <!-- Map Container -->
            <div class="peta-map-wrapper">
                <div id="indonesia-map" class="peta-map-canvas"></div>
                <div class="peta-legend">
                    <div class="peta-legend-title">Jumlah Kelompok Tani Hutan</div>
                    <div class="peta-legend-items">
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #064e3b;"></span>
                            <span>Sangat Tinggi (>300 KTH)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #059669;"></span>
                            <span>Tinggi (200-300 KTH)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #34d399;"></span>
                            <span>Sedang (100-200 KTH)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #a7f3d0;"></span>
                            <span>Rendah (<100 KTH)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Province Detail Panel -->
            <div class="peta-detail-panel" id="provinceDetailPanel">
                <div class="peta-detail-placeholder" id="detailPlaceholder">
                    <div class="peta-detail-placeholder-icon">🗺️</div>
                    <h3>Pilih Provinsi</h3>
                    <p>Klik pada peta untuk melihat detail Kelompok Tani Hutan di setiap provinsi</p>
                </div>

                <div class="peta-detail-content" id="detailContent" style="display: none;">
                    <div class="peta-detail-header">
                        <div class="peta-detail-icon" id="provinceIcon">🌾</div>
                        <div>
                            <h3 class="peta-detail-title" id="provinceName">-</h3>
                            <p class="peta-detail-subtitle" id="provinceRegion">-</p>
                        </div>
                    </div>

                    <div class="peta-detail-stats">
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="kthCount">0</div>
                            <div class="peta-stat-label">Total KTH</div>
                        </div>
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="groupsCount">0</div>
                            <div class="peta-stat-label">Data Tercatat</div>
                        </div>
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="activePercent">0%</div>
                            <div class="peta-stat-label">Terverifikasi</div>
                        </div>
                    </div>

                    <div class="peta-species-section">
                        <h4 class="peta-species-title">🌾 Kelompok Tani Hutan Terdaftar</h4>
                        <div class="peta-kth-list" id="kthList">
                            <!-- KTH cards will be inserted here -->
                        </div>
                    </div>

                    <div class="peta-habitats-section">
                        <h4 class="peta-species-title">📍 Wilayah</h4>
                        <div class="peta-habitat-tags" id="regionTag">
                            <!-- Region tag will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="bioguard-section" style="background: white;">
    <div class="bioguard-container">
        <div class="peta-quick-stats">
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🌾</div>
                <div class="peta-quick-stat-number">5,000+</div>
                <div class="peta-quick-stat-label">Kelompok Tani Hutan</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">👥</div>
                <div class="peta-quick-stat-number">150,000+</div>
                <div class="peta-quick-stat-label">Anggota Terdaftar</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🌳</div>
                <div class="peta-quick-stat-number">2.5M</div>
                <div class="peta-quick-stat-label">Hektar Hutan Kelola</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🗺️</div>
                <div class="peta-quick-stat-number">34</div>
                <div class="peta-quick-stat-label">Provinsi Tercakup</div>
            </div>
        </div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<!-- External EcoDetect Map Script -->
<script src="{{ asset('assets/js/ecodetect-map.js') }}"></script>

<style>
/* KTH Card Styles */
.peta-kth-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    max-height: 350px;
    overflow-y: auto;
    padding-right: 0.5rem;
}

.peta-kth-list::-webkit-scrollbar {
    width: 5px;
}

.peta-kth-list::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.peta-kth-list::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.peta-kth-card {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.875rem;
    background: #f8fafc;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease;
}

.peta-kth-card:hover {
    background: #f0fdf4;
    border-color: #10b981;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
}

.peta-kth-number {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 600;
    flex-shrink: 0;
}

.peta-kth-info {
    flex: 1;
    min-width: 0;
}

.peta-kth-name {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.25rem 0;
}

.peta-kth-register {
    font-size: 0.75rem;
    color: #059669;
    margin: 0 0 0.25rem 0;
    word-break: break-all;
}

.peta-kth-alamat {
    font-size: 0.75rem;
    color: #6b7280;
    margin: 0;
    line-height: 1.4;
}

.peta-kth-more {
    text-align: center;
    padding: 0.75rem;
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    border-radius: 8px;
    color: #059669;
    font-size: 0.85rem;
    font-weight: 500;
}
</style>

@endsection