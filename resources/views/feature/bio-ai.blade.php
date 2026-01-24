@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/bioai.css') }}">
@endsection

@section('content')
@include('layouts.navbar-landing')
<!-- Bio-AI Reforestation Impact Dashboard -->
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
                <span>🌲</span>
                <span>Bio-AI Analytics</span>
            </div>
        </div>
        <h1 class="bioguard-header-title">Dashboard Dampak <span class="text-gradient">Reboisasi Indonesia</span></h1>
        <p class="bioguard-header-desc">Analisis real-time dampak reboisasi menggunakan citra satelit, kelembapan tanah, dan tingkat deforestasi untuk memetakan area prioritas restorasi.</p>
    </div>
</div>

<!-- Stats Overview Section -->
<section class="bioguard-section" style="background: #ffffff; padding-top: 2rem;">
    <div class="bioguard-container">
        <div class="bioai-stats-grid">
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0);">🌳</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number" id="stat-pohon">Loading...</div>
                    <div class="bioai-stat-label">Pohon Ditanam</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span id="stat-pohon-trend">+12.5% dari tahun lalu</span>
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #cffafe, #a5f3fc);">📏</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number" id="stat-hektar">Loading...</div>
                    <div class="bioai-stat-label">Hektar Direstorasi</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span id="stat-hektar-trend">+8.2% dari tahun lalu</span>
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #cffafe, #a5f3fc);">🏝️</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number" id="stat-provinsi">Loading...</div>
                    <div class="bioai-stat-label">Provinsi Tercakup</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span id="stat-provinsi-trend">Seluruh Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">📍</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number" id="stat-prioritas">Loading...</div>
                    <div class="bioai-stat-label">Area Prioritas Tinggi</div>
                    <div class="bioai-stat-trend trend-neutral">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span id="stat-prioritas-trend">Perlu perhatian khusus</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="bioguard-section bioai-map-section">
    <div class="bioguard-container">
        <div class="bioai-section-header">
            <h2 class="bioguard-section-title">🗺️ Peta Dampak Reboisasi Indonesia</h2>
            <p class="bioguard-section-subtitle">Klik provinsi untuk melihat detail data reboisasi dan lingkungan</p>
        </div>

        <div class="bioai-map-container">
            <div class="bioai-map-wrapper">
                <div id="reforestation-map" class="bioai-map-canvas"></div>
                <div class="bioai-map-legend">
                    <div class="bioai-legend-title">Tingkat Reboisasi</div>
                    <div class="bioai-legend-items">
                        <div class="bioai-legend-item">
                            <span class="bioai-legend-color" style="background: #064e3b;"></span>
                            <span>Sangat Tinggi (>100k pohon)</span>
                        </div>
                        <div class="bioai-legend-item">
                            <span class="bioai-legend-color" style="background: #059669;"></span>
                            <span>Tinggi (50k-100k pohon)</span>
                        </div>
                        <div class="bioai-legend-item">
                            <span class="bioai-legend-color" style="background: #34d399;"></span>
                            <span>Sedang (20k-50k pohon)</span>
                        </div>
                        <div class="bioai-legend-item">
                            <span class="bioai-legend-color" style="background: #a7f3d0;"></span>
                            <span>Rendah (<20k pohon)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Province Detail Panel -->
            <div class="bioai-detail-panel" id="provinceDetailPanel">
                <div class="bioai-detail-placeholder" id="detailPlaceholder">
                    <div class="bioai-detail-placeholder-icon">🌲</div>
                    <h3>Pilih Provinsi</h3>
                    <p>Klik pada peta untuk melihat detail reboisasi dan data lingkungan</p>
                </div>

                <div class="bioai-detail-content" id="detailContent" style="display: none;">
                    <div class="bioai-detail-header">
                        <div class="bioai-detail-icon" id="provinceIcon">🌲</div>
                        <div>
                            <h3 class="bioai-detail-title" id="provinceName">-</h3>
                            <p class="bioai-detail-subtitle" id="provinceRegion">-</p>
                        </div>
                        <span class="bioai-priority-badge" id="priorityBadge">Prioritas</span>
                    </div>

                    <div class="bioai-detail-stats">
                        <div class="bioai-detail-stat-item">
                            <div class="bioai-detail-stat-number" id="treesPlanted">0</div>
                            <div class="bioai-detail-stat-label">Pohon Ditanam</div>
                        </div>
                        <div class="bioai-detail-stat-item">
                            <div class="bioai-detail-stat-number" id="areaRestored">0</div>
                            <div class="bioai-detail-stat-label">Ha Direstorasi</div>
                        </div>
                        <div class="bioai-detail-stat-item">
                            <div class="bioai-detail-stat-number" id="soilMoisture">0%</div>
                            <div class="bioai-detail-stat-label">Kelembapan Tanah</div>
                        </div>
                    </div>

                    <div class="bioai-env-data">
                        <h4 class="bioai-env-title">📊 Data Lingkungan</h4>
                        <div class="bioai-env-grid">
                            <div class="bioai-env-item">
                                <span class="bioai-env-label">Tingkat Deforestasi</span>
                                <div class="bioai-progress-bar">
                                    <div class="bioai-progress-fill deforestation" id="deforestationBar" style="width: 0%;"></div>
                                </div>
                                <span class="bioai-env-value" id="deforestationRate">0%</span>
                            </div>
                            <div class="bioai-env-item">
                                <span class="bioai-env-label">Tutupan Hutan</span>
                                <div class="bioai-progress-bar">
                                    <div class="bioai-progress-fill forest" id="forestBar" style="width: 0%;"></div>
                                </div>
                                <span class="bioai-env-value" id="forestCoverage">0%</span>
                            </div>
                            <div class="bioai-env-item">
                                <span class="bioai-env-label">Indeks Kesehatan Tanah</span>
                                <div class="bioai-progress-bar">
                                    <div class="bioai-progress-fill soil" id="soilBar" style="width: 0%;"></div>
                                </div>
                                <span class="bioai-env-value" id="soilHealth">0%</span>
                            </div>
                        </div>
                    </div>

                    <div class="bioai-recommendation">
                        <h4 class="bioai-rec-title">🤖 Rekomendasi AI</h4>
                        <p class="bioai-rec-text" id="aiRecommendation">-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Charts Section -->
<section class="bioguard-section" style="background: #f8fafc;">
    <div class="bioguard-container">
        <div class="bioai-section-header">
            <h2 class="bioguard-section-title">📈 Tren & Analitik Reboisasi</h2>
            <p class="bioguard-section-subtitle">Visualisasi data reboisasi dan dampak lingkungan secara real-time</p>
        </div>

        <div class="bioai-charts-grid">
            <div class="bioai-chart-card">
                <div class="bioai-chart-header">
                    <h3>Tren Penanaman Pohon (2020-2025)</h3>
                    <span class="bioai-chart-badge">Live Data</span>
                </div>
                <div id="treesTrendChart" class="bioai-chart-canvas"></div>
            </div>
        </div>
    </div>
</section>

<!-- Priority Areas Table -->
<section class="bioguard-section" style="background: white;">
    <div class="bioguard-container">
        <div class="bioai-section-header">
            <h2 class="bioguard-section-title">📍 Area Prioritas Restorasi</h2>
            <p class="bioguard-section-subtitle">Rekomendasi AI untuk area yang membutuhkan perhatian khusus</p>
        </div>

        <div class="bioai-table-card">
            <div class="bioai-table-header">
                <div class="bioai-table-filters">
                    <select class="bioai-filter-select" id="regionFilter">
                        <option value="">Semua Wilayah</option>
                        <option value="sumatera">Sumatera</option>
                        <option value="kalimantan">Kalimantan</option>
                        <option value="sulawesi">Sulawesi</option>
                        <option value="papua">Papua</option>
                    </select>
                    <select class="bioai-filter-select" id="priorityFilter">
                        <option value="">Semua Prioritas</option>
                        <option value="high">Prioritas Tinggi</option>
                        <option value="medium">Prioritas Sedang</option>
                        <option value="low">Prioritas Rendah</option>
                    </select>
                </div>
                <button class="bioai-export-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Export Data
                </button>
            </div>

            <div class="bioai-table-wrapper">
                <table class="bioai-data-table">
                    <thead>
                        <tr>
                            <th>Lokasi</th>
                            <th>Wilayah</th>
                            <th>Kelembapan Tanah</th>
                            <th>Deforestasi</th>
                            <th>Prioritas</th>
                            <th>Rekomendasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="bioaiTableBody">
                        <!-- Data will be populated by JS -->
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 2rem;">
                                <div class="bioai-loading">Memuat data...</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Detail Modal -->
<div class="bioai-modal-overlay" id="bioaiDetailModal">
    <div class="bioai-modal-content">
        <div class="bioai-modal-header">
            <div class="bioai-modal-title">
                <div class="bioai-modal-icon">🌳</div>
                <h3 id="modalProvinceName">Detail Provinsi</h3>
            </div>
            <button class="bioai-modal-close" onclick="closeBioaiModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="bioai-modal-body">
            <div class="bioai-modal-grid">
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Wilayah</div>
                    <div class="bioai-modal-item-value" id="modalProvinceRegion">-</div>
                </div>
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Prioritas</div>
                    <div class="bioai-modal-item-value" id="modalProvincePriority">-</div>
                </div>
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Pohon Ditanam</div>
                    <div class="bioai-modal-item-value" id="modalTreesPlanted">-</div>
                </div>
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Area Direstorasi</div>
                    <div class="bioai-modal-item-value" id="modalAreaRestored">-</div>
                </div>
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Kelembapan Tanah</div>
                    <div class="bioai-modal-item-value" id="modalSoilMoisture">-</div>
                </div>
                <div class="bioai-modal-item">
                    <div class="bioai-modal-item-label">Tingkat Deforestasi</div>
                    <div class="bioai-modal-item-value" id="modalDeforestation">-</div>
                </div>
            </div>
            <div class="bioai-recommendation">
                <h4 class="bioai-rec-title">🤖 Rekomendasi AI</h4>
                <p class="bioai-rec-text" id="modalRecommendation">-</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="bioguard-section bioai-cta-section">
    <div class="bioguard-container">
        <div class="bioai-cta-content">
            <h2>Bergabung dalam Upaya Reboisasi Indonesia</h2>
            <p>Dukung program penanaman pohon dan restorasi hutan bersama BioGuard</p>
            <div class="bioai-cta-buttons">
                <a href="#" class="bioai-cta-btn primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Jadi Relawan
                </a>
                <a href="https://docs.google.com/document/d/1EJzdaeGIIEV4xmt0bl7CilfAFTB4Lhc9JQv-nYJ2JkM/edit?usp=sharing" class="bioai-cta-btn secondary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                   Syarat Dan Ketentuan Menjadi Relawan
                </a>
            </div>
        </div>
    </div>
</section>



<!-- Highcharts Scripts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/map.js"></script>
<script>
    // Initialize Highcharts.maps object before loading map data
    if (typeof Highcharts !== 'undefined') {
        Highcharts.maps = Highcharts.maps || {};
    }
</script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script src="{{ asset('assets/js/bioai-map.js') }}"></script>
@endsection
