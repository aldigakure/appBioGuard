1`@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
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
                Klik pada provinsi mana saja untuk melihat detail spesies flora yang terdapat di wilayah tersebut.
            </p>
        </div>
    </div>
</div>

<!-- Interactive Map Section -->
<section class="user-map-section">
    <div class="user-map-container">
        <div class="user-map-layout">
            <!-- Map Container -->
            <div class="user-map-wrapper">
                <div id="indonesia-map" class="user-map-canvas"></div>
                <div class="user-map-legend">
                    <div class="user-legend-title">Tingkat Keanekaragaman Flora</div>
                    <div class="user-legend-items">
                        <div class="user-legend-item">
                            <span class="user-legend-color" style="background: #064e3b;"></span>
                            <span>Sangat Tinggi (>500 spesies)</span>
                        </div>
                        <div class="user-legend-item">
                            <span class="user-legend-color" style="background: #059669;"></span>
                            <span>Tinggi (300-500 spesies)</span>
                        </div>
                        <div class="user-legend-item">
                            <span class="user-legend-color" style="background: #34d399;"></span>
                            <span>Sedang (150-300 spesies)</span>
                        </div>
                        <div class="user-legend-item">
                            <span class="user-legend-color" style="background: #a7f3d0;"></span>
                            <span>Rendah (<150 spesies)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Province Detail Panel -->
            <div class="user-detail-panel" id="provinceDetailPanel">
                <div class="user-detail-placeholder" id="detailPlaceholder">
                    <div class="user-detail-placeholder-icon">🗺️</div>
                    <h3>Pilih Provinsi</h3>
                    <p>Klik pada peta untuk melihat detail spesies flora di setiap provinsi</p>
                </div>

                <div class="user-detail-content" id="detailContent" style="display: none;">
                    <div class="user-detail-header">
                        <div class="user-detail-icon" id="provinceIcon">🌿</div>
                        <div>
                            <h3 class="user-detail-title" id="provinceName">-</h3>
                            <p class="user-detail-subtitle" id="provinceRegion">-</p>
                        </div>
                    </div>

                    <div class="user-detail-stats">
                        <div class="user-stat-item">
                            <div class="user-stat-number" id="speciesCount">0</div>
                            <div class="user-stat-label">Spesies Flora</div>
                        </div>
                        <div class="user-stat-item">
                            <div class="user-stat-number" id="endangeredCount">0</div>
                            <div class="user-stat-label">Terancam Punah</div>
                        </div>
                        <div class="user-stat-item">
                            <div class="user-stat-number" id="endemicCount">0</div>
                            <div class="user-stat-label">Endemik</div>
                        </div>
                    </div>

                    <div class="user-species-section">
                        <h4 class="user-species-title">🌺 Spesies Unggulan</h4>
                        <div class="user-species-list" id="speciesList">
                            <!-- Species cards will be inserted here -->
                        </div>
                    </div>

                    <div class="user-habitats-section">
                        <h4 class="user-species-title">🌳 Tipe Habitat</h4>
                        <div class="user-habitat-tags" id="habitatTags">
                            <!-- Habitat tags will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Flora Lainnya (New Section at Bottom) -->
        <div id="dashboardFloraLainnyaContainer"></div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="user-stats-section">
    <div class="user-map-container">
        <div class="user-quick-stats">
            <div class="user-quick-stat-card">
                <div class="user-quick-stat-icon">🌿</div>
                <div class="user-quick-stat-number">30,000+</div>
                <div class="user-quick-stat-label">Spesies Tumbuhan</div>
            </div>
            <div class="user-quick-stat-card">
                <div class="user-quick-stat-icon">🌺</div>
                <div class="user-quick-stat-number">5,000+</div>
                <div class="user-quick-stat-label">Spesies Anggrek</div>
            </div>
            <div class="user-quick-stat-card">
                <div class="user-quick-stat-icon">🌴</div>
                <div class="user-quick-stat-number">400+</div>
                <div class="user-quick-stat-label">Spesies Palem</div>
            </div>
            <div class="user-quick-stat-card">
                <div class="user-quick-stat-icon">⚠️</div>
                <div class="user-quick-stat-number">1,500+</div>
                <div class="user-quick-stat-label">Spesies Terancam</div>
            </div>
        </div>
    </div>
</section>



<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>

<script>
    // API URLs
    const GEOJSON_URL = '/assets/data/indonesia-38-provinsi.json';
    const FLORA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';
    
    // Data storage
    let indonesiaGeoJson = null;
    let floraData = {};

    // Province name mapping from GeoJSON to API data
    const provinceNameMapping = {
        'Daerah Istimewa Yogyakarta': 'DI Yogyakarta'
    };

    function getProvinceName(geoJsonName) {
        return provinceNameMapping[geoJsonName] || geoJsonName;
    }

    /**
     * Parse conservation status from status string
     */
    function parseFloraStatus(statusString) {
        if (!statusString) return 'Umum';
        if (statusString.includes('Kritis') || statusString.includes('Critically')) return 'Kritis';
        if (statusString.includes('Terancam') || statusString.includes('Endangered')) return 'Terancam';
        if (statusString.includes('Rentan') || statusString.includes('Vulnerable')) return 'Rentan';
        if (statusString.includes('Langka')) return 'Langka';
        return 'Umum';
    }

    // Default data for provinces without specific data
    const defaultProvinceData = {
        icon: '🌿',
        speciesCount: 0,
        endangeredCount: 0,
        endemicCount: 0,
        value: 200,
        species: [],
        habitats: ['Hutan Tropis']
    };

    // Initialize map when DOM is ready
    document.addEventListener('DOMContentLoaded', async function() {
        await loadDataAndInitMap();
    });

    async function loadDataAndInitMap() {
        try {
            // Fetch GeoJSON and Flora API data in parallel
            const [geoResponse, floraResponse] = await Promise.all([
                fetch(GEOJSON_URL),
                fetch(FLORA_API_URL)
            ]);

            indonesiaGeoJson = await geoResponse.json();
            const apiData = await floraResponse.json();

            // Transform API data to floraData format
            for (const [provinceName, provinceData] of Object.entries(apiData)) {
                if (provinceData.flora) {
                    const flora = provinceData.flora;
                    const otherSpecies = flora.lainnya || [];

                    // Build species array from main flora and lainnya
                    const species = [{
                        name: flora.nama,
                        latin: flora.latin,
                        namaLain: flora.namaLain,
                        status: parseFloraStatus(flora.status),
                        habitat: flora.habitat,
                        manfaat: flora.manfaat,
                        tips: flora.tips,
                        warna: flora.warna,
                        tinggi: flora.tinggi,
                        budaya: flora.budaya,
                        simbol: flora.simbol,
                        identitas: flora.identitas,
                        icon: '🌺',
                        isMain: true
                    }];

                    // Add other species
                    otherSpecies.forEach(s => {
                        species.push({
                            name: s.nama,
                            latin: s.latin,
                            status: parseFloraStatus(s.status),
                            statusDetail: s.statusDetail,
                            habitat: s.habitat,
                            deskripsi: s.deskripsi,
                            ancaman: s.ancaman,
                            icon: '🌿'
                        });
                    });

                    // Count endangered and endemic
                    const endangeredCount = species.filter(s => 
                        s.status === 'Kritis' || s.status === 'Terancam'
                    ).length;
                    const endemicCount = Math.floor(species.length * 0.3); // Estimate

                    floraData[provinceName] = {
                        name: provinceName,
                        region: getRegion(provinceName),
                        icon: '🌿',
                        mainFlora: flora,
                        species: species,
                        speciesCount: species.length,
                        endangeredCount: endangeredCount,
                        endemicCount: endemicCount,
                        value: 100 + (species.length * 50) + Math.floor(Math.random() * 200),
                        habitats: flora.habitat ? [flora.habitat] : ['Hutan Tropis']
                    };
                }
            }

            initializeMap();
        } catch (error) {
            console.error('Error loading data:', error);
        }
    }

    function getRegion(provinceName) {
        const regions = {
            'Sumatera': ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 'Jambi', 'Sumatera Selatan', 'Kepulauan Bangka Belitung', 'Bengkulu', 'Lampung'],
            'Jawa': ['DKI Jakarta', 'Jawa Barat', 'Banten', 'Jawa Tengah', 'DI Yogyakarta', 'Daerah Istimewa Yogyakarta', 'Jawa Timur'],
            'Kalimantan': ['Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara'],
            'Sulawesi': ['Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara'],
            'Bali & Nusa Tenggara': ['Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur'],
            'Maluku': ['Maluku', 'Maluku Utara'],
            'Papua': ['Papua', 'Papua Barat', 'Papua Barat Daya', 'Papua Tengah', 'Papua Pegunungan', 'Papua Selatan']
        };
        
        for (const [region, provinces] of Object.entries(regions)) {
            if (provinces.includes(provinceName)) return region;
        }
        return 'Indonesia';
    }

    function initializeMap() {
        if (!indonesiaGeoJson) {
            console.error('GeoJSON not loaded');
            return;
        }

        // Prepare data for Highcharts
        const mapData = [];

        indonesiaGeoJson.features.forEach(function(feature) {
            const geoJsonName = feature.properties.PROVINSI;
            const normalizedName = getProvinceName(geoJsonName);
            const data = floraData[normalizedName];

            mapData.push({
                'PROVINSI': geoJsonName,
                value: data?.value || 200,
                name: geoJsonName
            });
        });

        // Create the map
        Highcharts.mapChart('indonesia-map', {
            chart: {
                backgroundColor: 'transparent',
                style: {
                    fontFamily: 'Inter, system-ui, sans-serif'
                }
            },

            title: {
                text: null
            },

            credits: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom',
                    theme: {
                        fill: 'white',
                        'stroke-width': 1,
                        stroke: '#e5e7eb',
                        r: 8,
                        states: {
                            hover: {
                                fill: '#f0fdf4'
                            },
                            select: {
                                fill: '#10b981',
                                style: {
                                    color: 'white'
                                }
                            }
                        }
                    }
                }
            },

            legend: {
                enabled: false
            },

            colorAxis: {
                min: 100,
                max: 900,
                stops: [
                    [0, '#a7f3d0'],
                    [0.3, '#34d399'],
                    [0.6, '#059669'],
                    [1, '#064e3b']
                ]
            },

            tooltip: {
                backgroundColor: 'white',
                borderColor: '#e5e7eb',
                borderRadius: 12,
                shadow: true,
                useHTML: true,
                formatter: function() {
                    const normalizedName = getProvinceName(this.point.name);
                    const data = floraData[normalizedName] || defaultProvinceData;
                    return `
                    <div style="padding: 8px;">
                        <div style="font-weight: 600; font-size: 14px; color: #111827; margin-bottom: 4px;">
                            ${data.icon || '🌿'} ${this.point.name}
                        </div>
                        <div style="color: #6b7280; font-size: 12px;">
                            ${data.speciesCount || 200} spesies flora
                        </div>
                        <div style="color: #10b981; font-size: 11px; margin-top: 4px;">
                            Klik untuk detail →
                        </div>
                    </div>
                `;
                }
            },

            series: [{
                data: mapData,
                mapData: indonesiaGeoJson,
                joinBy: 'PROVINSI',
                name: 'Keanekaragaman Flora',
                borderColor: 'white',
                borderWidth: 1,
                states: {
                    hover: {
                        color: '#10b981',
                        borderColor: '#059669',
                        borderWidth: 2
                    }
                },
                dataLabels: {
                    enabled: false
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            showProvinceDetail(this.name);
                        }
                    }
                }
            }]
        });
    }

    function showProvinceDetail(provinceName) {
        const normalizedName = getProvinceName(provinceName);
        const data = floraData[normalizedName] || {
            ...defaultProvinceData,
            name: provinceName,
            region: 'Indonesia'
        };

        // Hide placeholder, show content
        document.getElementById('detailPlaceholder').style.display = 'none';
        document.getElementById('detailContent').style.display = 'block';

        // Update header
        document.getElementById('provinceIcon').textContent = data.icon || '🌿';
        document.getElementById('provinceName').textContent = data.name || provinceName;
        document.getElementById('provinceRegion').textContent = data.region || 'Indonesia';

        // Update stats
        document.getElementById('speciesCount').textContent = data.speciesCount || 200;
        document.getElementById('endangeredCount').textContent = data.endangeredCount || 25;
        document.getElementById('endemicCount').textContent = data.endemicCount || 15;

        // Update species list (Mascot remains in sidebar)
        const speciesList = document.getElementById('speciesList');
        speciesList.innerHTML = '';

        const species = data.species || [];
        const mainSpecies = species[0]; // First species as mascot
        const otherSpecies = species.slice(1);

        if (mainSpecies) {
            const statusClass = getStatusClass(mainSpecies.status);
            const latinDisplay = (mainSpecies.latin && !mainSpecies.latin.toLowerCase().includes('sp.')) ? mainSpecies.latin : '-';
            
            speciesList.innerHTML = `
                <div class="user-species-card">
                    <div class="user-species-icon">${mainSpecies.icon || '🌿'}</div>
                    <div class="user-species-info">
                        <div class="user-species-name">${mainSpecies.name}</div>
                        <div class="user-species-latin"><em>${latinDisplay}</em></div>
                    </div>
                    <div class="user-species-status ${statusClass}">${mainSpecies.status}</div>
                </div>
            `;
        }

        // Update others list (Bottom Grid)
        const othersContainer = document.getElementById('dashboardFloraLainnyaContainer');
        if (otherSpecies.length > 0) {
            let othersHtml = `
                <div class="flora-lainnya-wrapper">
                    <div class="peta-species-section bottom-section">
                        <h4 class="peta-species-title">🌱 Flora Lainnya di ${data.name}</h4>
                        <div class="peta-flora-grid">
            `;

            otherSpecies.forEach((s, index) => {
                const statusClass = getStatusClass(s.status);
                const latinDisplay = (s.latin && !s.latin.toLowerCase().includes('sp.')) ? s.latin : '-';
                
                othersHtml += `
                    <div class="peta-flora-card">
                        <div class="peta-flora-number">${index + 1}</div>
                        <div class="peta-flora-info">
                            <h5 class="peta-flora-name">${s.name}</h5>
                            <p class="peta-flora-latin"><em>${latinDisplay}</em></p>
                            <span class="peta-flora-status ${statusClass}">${s.status}</span>
                        </div>
                    </div>
                `;
            });

            othersHtml += `
                        </div>
                    </div>
                </div>
            `;
            othersContainer.innerHTML = othersHtml;
        } else {
            othersContainer.innerHTML = '';
        }

        // Update habitat tags
        const habitatTags = document.getElementById('habitatTags');
        habitatTags.innerHTML = '';

        (data.habitats || []).forEach(function(h) {
            habitatTags.innerHTML += `<span class="user-habitat-tag">${h}</span>`;
        });

        // Scroll to detail panel on mobile
        if (window.innerWidth < 1024) {
            document.getElementById('provinceDetailPanel').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    function getStatusClass(status) {
        switch (status) {
            case 'Kritis':
                return 'status-critical';
            case 'Rentan':
                return 'status-vulnerable';
            case 'Langka':
                return 'status-rare';
            default:
                return 'status-safe';
        }
    }
</script>

@endsection