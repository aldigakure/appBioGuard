@extends('layouts.app')

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
<section class="bioguard-section" style="background: white; padding-top: 2rem;">
    <div class="bioguard-container">
        <div class="bioai-stats-grid">
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0);">🌳</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number" data-count="2450000">2,450,000+</div>
                    <div class="bioai-stat-label">Pohon Ditanam</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        +12.5% dari tahun lalu
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #cffafe, #a5f3fc);">📏</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number">185,420</div>
                    <div class="bioai-stat-label">Hektar Direstorasi</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        +8.2% dari tahun lalu
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #fef3c7, #fde68a);">📉</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number">32.5%</div>
                    <div class="bioai-stat-label">Deforestasi Termitigasi</div>
                    <div class="bioai-stat-trend trend-up">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        Peningkatan 5.3%
                    </div>
                </div>
            </div>
            <div class="bioai-stat-card">
                <div class="bioai-stat-icon" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">📍</div>
                <div class="bioai-stat-content">
                    <div class="bioai-stat-number">156</div>
                    <div class="bioai-stat-label">Lokasi Prioritas</div>
                    <div class="bioai-stat-trend trend-neutral">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        28 zona baru teridentifikasi
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="bioai-location-cell">
                                    <span class="bioai-location-icon">🌲</span>
                                    <span>Taman Nasional Tesso Nilo</span>
                                </div>
                            </td>
                            <td>Riau, Sumatera</td>
                            <td>
                                <div class="bioai-moisture-cell">
                                    <div class="bioai-moisture-bar" style="width: 35%;"></div>
                                    <span>35%</span>
                                </div>
                            </td>
                            <td><span class="bioai-deforestation-badge high">28.5%</span></td>
                            <td><span class="bioai-priority-tag high">Tinggi</span></td>
                            <td>Penanaman intensif spesies asli</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bioai-location-cell">
                                    <span class="bioai-location-icon">🌳</span>
                                    <span>Hutan Lindung Sebangau</span>
                                </div>
                            </td>
                            <td>Kalimantan Tengah</td>
                            <td>
                                <div class="bioai-moisture-cell">
                                    <div class="bioai-moisture-bar" style="width: 42%;"></div>
                                    <span>42%</span>
                                </div>
                            </td>
                            <td><span class="bioai-deforestation-badge high">24.2%</span></td>
                            <td><span class="bioai-priority-tag high">Tinggi</span></td>
                            <td>Restorasi lahan gambut</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bioai-location-cell">
                                    <span class="bioai-location-icon">🌴</span>
                                    <span>Kawasan Hutan Leuser</span>
                                </div>
                            </td>
                            <td>Aceh, Sumatera</td>
                            <td>
                                <div class="bioai-moisture-cell">
                                    <div class="bioai-moisture-bar" style="width: 58%;"></div>
                                    <span>58%</span>
                                </div>
                            </td>
                            <td><span class="bioai-deforestation-badge medium">15.8%</span></td>
                            <td><span class="bioai-priority-tag medium">Sedang</span></td>
                            <td>Pengawasan koridor satwa</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bioai-location-cell">
                                    <span class="bioai-location-icon">🌲</span>
                                    <span>SM Danau Sentarum</span>
                                </div>
                            </td>
                            <td>Kalimantan Barat</td>
                            <td>
                                <div class="bioai-moisture-cell">
                                    <div class="bioai-moisture-bar" style="width: 72%;"></div>
                                    <span>72%</span>
                                </div>
                            </td>
                            <td><span class="bioai-deforestation-badge low">8.3%</span></td>
                            <td><span class="bioai-priority-tag low">Rendah</span></td>
                            <td>Pemeliharaan ekosistem</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bioai-location-cell">
                                    <span class="bioai-location-icon">🌳</span>
                                    <span>TN Wasur</span>
                                </div>
                            </td>
                            <td>Papua</td>
                            <td>
                                <div class="bioai-moisture-cell">
                                    <div class="bioai-moisture-bar" style="width: 65%;"></div>
                                    <span>65%</span>
                                </div>
                            </td>
                            <td><span class="bioai-deforestation-badge low">5.2%</span></td>
                            <td><span class="bioai-priority-tag low">Rendah</span></td>
                            <td>Monitoring biodiversitas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

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
                <a href="#" class="bioai-cta-btn secondary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                   Cara Menjadi Relawan
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

<script>
    // Reforestation data for each province
    const reforestationData = {
        'id-ac': {
            name: 'Aceh',
            region: 'Sumatera',
            treesPlanted: 125000,
            areaRestored: 8500,
            soilMoisture: 62,
            deforestationRate: 12,
            forestCoverage: 58,
            soilHealth: 72,
            priority: 'medium',
            recommendation: 'Fokus pada restorasi koridor satwa liar Leuser Ecosystem. Prioritaskan penanaman pohon asli seperti Meranti dan Damar.',
            value: 125
        },
        'id-su': {
            name: 'Sumatera Utara',
            region: 'Sumatera',
            treesPlanted: 98000,
            areaRestored: 6200,
            soilMoisture: 55,
            deforestationRate: 18,
            forestCoverage: 45,
            soilHealth: 65,
            priority: 'high',
            recommendation: 'Tingkatkan reboisasi di kawasan hutan lindung Toba. Implementasikan agroforestri dengan masyarakat lokal.',
            value: 98
        },
        'id-ri': {
            name: 'Riau',
            region: 'Sumatera',
            treesPlanted: 185000,
            areaRestored: 12000,
            soilMoisture: 35,
            deforestationRate: 28,
            forestCoverage: 32,
            soilHealth: 48,
            priority: 'critical',
            recommendation: 'URGENT: Fokus restorasi lahan gambut. Perlu penanaman intensif dan rewetting lahan untuk mencegah kebakaran.',
            value: 185
        },
        'id-kb': {
            name: 'Kalimantan Barat',
            region: 'Kalimantan',
            treesPlanted: 156000,
            areaRestored: 10500,
            soilMoisture: 68,
            deforestationRate: 15,
            forestCoverage: 52,
            soilHealth: 75,
            priority: 'medium',
            recommendation: 'Lanjutkan program bantaran sungai. Fokus pada tanaman buah lokal untuk mendukung ekonomi masyarakat.',
            value: 156
        },
        'id-kt': {
            name: 'Kalimantan Tengah',
            region: 'Kalimantan',
            treesPlanted: 210000,
            areaRestored: 15800,
            soilMoisture: 42,
            deforestationRate: 24,
            forestCoverage: 38,
            soilHealth: 55,
            priority: 'high',
            recommendation: 'Prioritaskan restorasi Taman Nasional Tanjung Puting. Implementasikan program orangutan corridor.',
            value: 210
        },
        'id-ki': {
            name: 'Kalimantan Timur',
            region: 'Kalimantan',
            treesPlanted: 178000,
            areaRestored: 11200,
            soilMoisture: 58,
            deforestationRate: 20,
            forestCoverage: 48,
            soilHealth: 68,
            priority: 'high',
            recommendation: 'Fokus reboisasi pasca-tambang. Gunakan spesies cepat tumbuh diikuti tanaman asli untuk suksesi ekologi.',
            value: 178
        },
        'id-pa': {
            name: 'Papua',
            region: 'Papua',
            treesPlanted: 85000,
            areaRestored: 5800,
            soilMoisture: 78,
            deforestationRate: 5,
            forestCoverage: 85,
            soilHealth: 88,
            priority: 'low',
            recommendation: 'Pertahankan tutupan hutan yang ada. Fokus pada edukasi dan pemberdayaan masyarakat adat.',
            value: 85
        },
        'id-pb': {
            name: 'Papua Barat',
            region: 'Papua',
            treesPlanted: 72000,
            areaRestored: 4500,
            soilMoisture: 82,
            deforestationRate: 4,
            forestCoverage: 88,
            soilHealth: 90,
            priority: 'low',
            recommendation: 'Monitoring biodiversitas. Dukung konservasi berbasis masyarakat adat.',
            value: 72
        },
        'id-sa': {
            name: 'Sulawesi Utara',
            region: 'Sulawesi',
            treesPlanted: 65000,
            areaRestored: 3800,
            soilMoisture: 70,
            deforestationRate: 10,
            forestCoverage: 55,
            soilHealth: 72,
            priority: 'medium',
            recommendation: 'Restorasi Taman Nasional Bogani Nani Wartabone. Fokus habitat Maleo dan Tarsius.',
            value: 65
        },
        'id-jb': {
            name: 'Jawa Barat',
            region: 'Jawa',
            treesPlanted: 145000,
            areaRestored: 8200,
            soilMoisture: 52,
            deforestationRate: 8,
            forestCoverage: 22,
            soilHealth: 60,
            priority: 'high',
            recommendation: 'Urban reforestation dan DAS Citarum. Kolaborasi dengan industri untuk CSR reboisasi.',
            value: 145
        }
    };

    // Initialize map on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        initReforestationMap();
        initCharts();
    });

    function initReforestationMap() {
        const mapData = [];
        Highcharts.maps['countries/id/id-all'].features.forEach(function(f) {
            const code = f.properties['hc-key'];
            const data = reforestationData[code];
            mapData.push({
                'hc-key': code,
                value: data?.value || Math.floor(Math.random() * 100) + 20,
                name: f.properties.name
            });
        });

        Highcharts.mapChart('reforestation-map', {
            chart: {
                backgroundColor: 'transparent',
                height: 450
            },
            title: { text: null },
            credits: { enabled: false },
            exporting: { enabled: false },
            mapNavigation: {
                enabled: true,
                buttonOptions: { verticalAlign: 'bottom' }
            },
            legend: { enabled: false },
            colorAxis: {
                min: 20,
                max: 220,
                stops: [
                    [0, '#a7f3d0'],
                    [0.3, '#34d399'],
                    [0.6, '#059669'],
                    [1, '#064e3b']
                ]
            },
            tooltip: {
                useHTML: true,
                formatter: function() {
                    const d = reforestationData[this.point['hc-key']];
                    const trees = d?.treesPlanted || 'N/A';
                    return '<div style="padding:8px;"><b>🌲 ' + this.point.name + '</b><br>' +
                        (typeof trees === 'number' ? trees.toLocaleString() : trees) + ' pohon ditanam<br>' +
                        '<small style="color:#10b981;">Klik untuk detail →</small></div>';
                }
            },
            series: [{
                data: mapData,
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
                borderColor: 'white',
                borderWidth: 1,
                states: {
                    hover: {
                        color: '#10b981',
                        borderWidth: 2
                    }
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            showProvinceDetail(this['hc-key'], this.name);
                        }
                    }
                }
            }]
        });
    }

    function showProvinceDetail(code, name) {
        const d = reforestationData[code] || {
            name: name,
            region: 'Indonesia',
            treesPlanted: Math.floor(Math.random() * 50000) + 10000,
            areaRestored: Math.floor(Math.random() * 5000) + 1000,
            soilMoisture: Math.floor(Math.random() * 40) + 40,
            deforestationRate: Math.floor(Math.random() * 20) + 5,
            forestCoverage: Math.floor(Math.random() * 30) + 30,
            soilHealth: Math.floor(Math.random() * 30) + 50,
            priority: 'medium',
            recommendation: 'Lakukan survei lebih lanjut untuk menentukan strategi reboisasi optimal.'
        };

        document.getElementById('detailPlaceholder').style.display = 'none';
        document.getElementById('detailContent').style.display = 'block';

        document.getElementById('provinceName').textContent = d.name || name;
        document.getElementById('provinceRegion').textContent = d.region;
        document.getElementById('treesPlanted').textContent = d.treesPlanted.toLocaleString();
        document.getElementById('areaRestored').textContent = d.areaRestored.toLocaleString();
        document.getElementById('soilMoisture').textContent = d.soilMoisture + '%';

        // Update progress bars
        document.getElementById('deforestationBar').style.width = d.deforestationRate + '%';
        document.getElementById('deforestationRate').textContent = d.deforestationRate + '%';
        document.getElementById('forestBar').style.width = d.forestCoverage + '%';
        document.getElementById('forestCoverage').textContent = d.forestCoverage + '%';
        document.getElementById('soilBar').style.width = d.soilHealth + '%';
        document.getElementById('soilHealth').textContent = d.soilHealth + '%';

        // Update priority badge
        const priorityBadge = document.getElementById('priorityBadge');
        priorityBadge.textContent = d.priority === 'critical' ? 'Kritis' : 
                                    d.priority === 'high' ? 'Prioritas Tinggi' : 
                                    d.priority === 'medium' ? 'Prioritas Sedang' : 'Prioritas Rendah';
        priorityBadge.className = 'bioai-priority-badge ' + d.priority;

        document.getElementById('aiRecommendation').textContent = d.recommendation;
    }

    function initCharts() {
        // Trees Trend Chart
        Highcharts.chart('treesTrendChart', {
            chart: { type: 'areaspline', backgroundColor: 'transparent', height: 280 },
            title: { text: null },
            credits: { enabled: false },
            xAxis: { categories: ['2020', '2021', '2022', '2023', '2024', '2025'], labels: { style: { color: '#6b7280' } } },
            yAxis: { title: { text: 'Jumlah Pohon (ribu)', style: { color: '#6b7280' } }, labels: { style: { color: '#6b7280' } }, gridLineColor: '#e5e7eb' },
            legend: { enabled: false },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.3,
                    marker: { enabled: true, radius: 4 }
                }
            },
            series: [{
                name: 'Pohon Ditanam',
                data: [320, 485, 620, 890, 1250, 1680],
                color: '#10b981',
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [[0, 'rgba(16, 185, 129, 0.4)'], [1, 'rgba(16, 185, 129, 0.05)']]
                }
            }]
        });


    }
</script>
@endsection
