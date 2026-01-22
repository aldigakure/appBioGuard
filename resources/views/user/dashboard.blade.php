@extends('layouts.app')

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
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<script>
    // Flora data for each province
    const floraData = {
        'id-ac': {
            name: 'Aceh',
            region: 'Sumatera',
            icon: '🌿',
            speciesCount: 320,
            endangeredCount: 45,
            endemicCount: 28,
            value: 320,
            species: [{
                    name: 'Rafflesia arnoldii',
                    latin: 'Rafflesia arnoldii',
                    status: 'Kritis',
                    icon: '🌺'
                },
                {
                    name: 'Pinus Merkusii',
                    latin: 'Pinus merkusii',
                    status: 'Rentan',
                    icon: '🌲'
                },
                {
                    name: 'Damar',
                    latin: 'Agathis dammara',
                    status: 'Aman',
                    icon: '🌳'
                }
            ],
            habitats: ['Hutan Hujan Tropis', 'Pegunungan', 'Rawa Gambut']
        },
        'id-su': {
            name: 'Sumatera Utara',
            region: 'Sumatera',
            icon: '🌴',
            speciesCount: 380,
            endangeredCount: 52,
            endemicCount: 35,
            value: 380,
            species: [{
                    name: 'Bunga Bangkai',
                    latin: 'Amorphophallus titanum',
                    status: 'Rentan',
                    icon: '🌸'
                },
                {
                    name: 'Pohon Kemenyan',
                    latin: 'Styrax benzoin',
                    status: 'Rentan',
                    icon: '🌳'
                },
                {
                    name: 'Andaliman',
                    latin: 'Zanthoxylum acanthopodium',
                    status: 'Aman',
                    icon: '🌿'
                }
            ],
            habitats: ['Hutan Hujan Tropis', 'Danau Toba', 'Pegunungan']
        },
        'id-sb': {
            name: 'Sumatera Barat',
            region: 'Sumatera',
            icon: '🌺',
            speciesCount: 420,
            endangeredCount: 58,
            endemicCount: 42,
            value: 420,
            species: [{
                    name: 'Rafflesia arnoldii',
                    latin: 'Rafflesia arnoldii',
                    status: 'Kritis',
                    icon: '🌺'
                },
                {
                    name: 'Kantong Semar',
                    latin: 'Nepenthes spp.',
                    status: 'Rentan',
                    icon: '🪴'
                },
                {
                    name: 'Anggrek Sumatera',
                    latin: 'Bulbophyllum spp.',
                    status: 'Aman',
                    icon: '🌸'
                }
            ],
            habitats: ['Hutan Hujan Tropis', 'Pegunungan Bukit Barisan']
        },
        'id-jb': {
            name: 'Jawa Barat',
            region: 'Jawa',
            icon: '🌸',
            speciesCount: 520,
            endangeredCount: 72,
            endemicCount: 55,
            value: 520,
            species: [{
                    name: 'Rafflesia patma',
                    latin: 'Rafflesia patma',
                    status: 'Kritis',
                    icon: '🌺'
                },
                {
                    name: 'Edelweiss Jawa',
                    latin: 'Anaphalis javanica',
                    status: 'Rentan',
                    icon: '🌸'
                },
                {
                    name: 'Kantil',
                    latin: 'Magnolia champaca',
                    status: 'Rentan',
                    icon: '🌸'
                }
            ],
            habitats: ['Taman Nasional Gunung Gede Pangrango', 'Hutan Pegunungan', 'Cagar Alam']
        },
        'id-jt': {
            name: 'Jawa Tengah',
            region: 'Jawa',
            icon: '🌲',
            speciesCount: 450,
            endangeredCount: 58,
            endemicCount: 42,
            value: 450,
            species: [{
                    name: 'Cemara Gunung',
                    latin: 'Casuarina junghuhniana',
                    status: 'Aman',
                    icon: '🌲'
                },
                {
                    name: 'Sendang Arum',
                    latin: 'Magnolia spp.',
                    status: 'Rentan',
                    icon: '🌸'
                },
                {
                    name: 'Sawo Kecik',
                    latin: 'Manilkara kauki',
                    status: 'Rentan',
                    icon: '🌳'
                }
            ],
            habitats: ['Gunung Lawu', 'Gunung Merbabu', 'Hutan Jati']
        },
        'id-ji': {
            name: 'Jawa Timur',
            region: 'Jawa',
            icon: '🌺',
            speciesCount: 480,
            endangeredCount: 65,
            endemicCount: 48,
            value: 480,
            species: [{
                    name: 'Edelweiss Jawa',
                    latin: 'Anaphalis javanica',
                    status: 'Rentan',
                    icon: '🌸'
                },
                {
                    name: 'Bunga Wijaya Kusuma',
                    latin: 'Epiphyllum anguliger',
                    status: 'Aman',
                    icon: '🌺'
                },
                {
                    name: 'Pohon Sono',
                    latin: 'Dalbergia latifolia',
                    status: 'Rentan',
                    icon: '🌳'
                }
            ],
            habitats: ['Taman Nasional Bromo Tengger Semeru', 'Taman Nasional Baluran', 'Alas Purwo']
        },
        'id-kb': {
            name: 'Kalimantan Barat',
            region: 'Kalimantan',
            icon: '🪴',
            speciesCount: 580,
            endangeredCount: 82,
            endemicCount: 65,
            value: 580,
            species: [{
                    name: 'Kantong Semar',
                    latin: 'Nepenthes rajah',
                    status: 'Kritis',
                    icon: '🪴'
                },
                {
                    name: 'Tengkawang',
                    latin: 'Shorea stenoptera',
                    status: 'Rentan',
                    icon: '🌳'
                },
                {
                    name: 'Jelutung',
                    latin: 'Dyera costulata',
                    status: 'Rentan',
                    icon: '🌲'
                }
            ],
            habitats: ['Taman Nasional Betung Kerihun', 'Hutan Kerangas', 'Rawa Gambut']
        },
        'id-ki': {
            name: 'Kalimantan Timur',
            region: 'Kalimantan',
            icon: '🌸',
            speciesCount: 620,
            endangeredCount: 88,
            endemicCount: 72,
            value: 620,
            species: [{
                    name: 'Anggrek Hitam',
                    latin: 'Coelogyne pandurata',
                    status: 'Kritis',
                    icon: '🌸'
                },
                {
                    name: 'Meranti',
                    latin: 'Shorea spp.',
                    status: 'Kritis',
                    icon: '🌲'
                },
                {
                    name: 'Ulin',
                    latin: 'Eusideroxylon zwageri',
                    status: 'Rentan',
                    icon: '🌳'
                }
            ],
            habitats: ['Taman Nasional Kutai', 'Hutan Dipterocarp', 'Karst Sangkulirang']
        },
        'id-pa': {
            name: 'Papua',
            region: 'Papua',
            icon: '🌴',
            speciesCount: 850,
            endangeredCount: 120,
            endemicCount: 95,
            value: 850,
            species: [{
                    name: 'Matoa',
                    latin: 'Pometia pinnata',
                    status: 'Aman',
                    icon: '🌳'
                },
                {
                    name: 'Anggrek Papua',
                    latin: 'Dendrobium spp.',
                    status: 'Rentan',
                    icon: '🌸'
                },
                {
                    name: 'Merbau',
                    latin: 'Intsia bijuga',
                    status: 'Rentan',
                    icon: '🌲'
                }
            ],
            habitats: ['Taman Nasional Lorentz', 'Hutan Hujan Tropis', 'Pegunungan Jayawijaya']
        },
        'id-pb': {
            name: 'Papua Barat',
            region: 'Papua',
            icon: '🌿',
            speciesCount: 720,
            endangeredCount: 98,
            endemicCount: 82,
            value: 720,
            species: [{
                    name: 'Damar',
                    latin: 'Agathis labillardieri',
                    status: 'Rentan',
                    icon: '🌲'
                },
                {
                    name: 'Anggrek Tebu',
                    latin: 'Grammatophyllum speciosum',
                    status: 'Rentan',
                    icon: '🌸'
                }
            ],
            habitats: ['Taman Nasional Teluk Cenderawasih', 'Raja Ampat']
        }
    };

    // Default data for provinces without specific data
    const defaultProvinceData = {
        icon: '🌿',
        speciesCount: 200,
        endangeredCount: 25,
        endemicCount: 15,
        value: 200,
        species: [{
            name: 'Flora Lokal',
            latin: 'Species indigenus',
            status: 'Aman',
            icon: '🌿'
        }],
        habitats: ['Hutan Tropis']
    };

    // Initialize map when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeMap();
    });

    function initializeMap() {
        // Prepare data for Highcharts
        const mapData = [];

        // Get all province codes from the map topology
        const topology = Highcharts.maps['countries/id/id-all'];

        topology.features.forEach(function(feature) {
            const code = feature.properties['hc-key'];
            const data = floraData[code] || {
                ...defaultProvinceData,
                name: feature.properties.name,
                region: 'Indonesia'
            };

            mapData.push({
                'hc-key': code,
                value: data.value || data.speciesCount,
                name: feature.properties.name
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
                    const data = floraData[this.point['hc-key']] || defaultProvinceData;
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
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
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
                            showProvinceDetail(this['hc-key'], this.name);
                        }
                    }
                }
            }]
        });
    }

    function showProvinceDetail(code, name) {
        const data = floraData[code] || {
            ...defaultProvinceData,
            name: name,
            region: 'Indonesia'
        };

        // Hide placeholder, show content
        document.getElementById('detailPlaceholder').style.display = 'none';
        document.getElementById('detailContent').style.display = 'block';

        // Update header
        document.getElementById('provinceIcon').textContent = data.icon || '🌿';
        document.getElementById('provinceName').textContent = data.name || name;
        document.getElementById('provinceRegion').textContent = data.region || 'Indonesia';

        // Update stats
        document.getElementById('speciesCount').textContent = data.speciesCount || 200;
        document.getElementById('endangeredCount').textContent = data.endangeredCount || 25;
        document.getElementById('endemicCount').textContent = data.endemicCount || 15;

        // Update species list
        const speciesList = document.getElementById('speciesList');
        speciesList.innerHTML = '';

        (data.species || []).forEach(function(s) {
            const statusClass = getStatusClass(s.status);
            speciesList.innerHTML += `
            <div class="user-species-card">
                <div class="user-species-icon">${s.icon || '🌿'}</div>
                <div class="user-species-info">
                    <div class="user-species-name">${s.name}</div>
                    <div class="user-species-latin">${s.latin}</div>
                </div>
                <div class="user-species-status ${statusClass}">${s.status}</div>
            </div>
        `;
        });

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

    // ... (kode Highcharts di atas biarkan saja) ...

    // {{-- SCRIPT PENYELAMAT SKOR GAME (VERSI DEBUG / CEREWET) --}}
    document.addEventListener('DOMContentLoaded', async function() {
        console.log("🔍 Script Penyelamat Skor: AKTIF"); // Cek Console F12

        // 1. Cek apakah ada titipan skor dari game?
        const pendingScore = localStorage.getItem('pending_game_score');

        if (!pendingScore) {
            console.log("ℹ️ Info: Tidak ada skor game yang tertunda.");
            return; // Stop di sini kalau tidak ada data
        }

        // Kalau sampai sini, berarti ada data!
        console.log("✅ Ditemukan titipan skor:", pendingScore);
        const gameData = JSON.parse(pendingScore);

        // Alert Konfirmasi (Bisa dihapus nanti kalau menggangu)
        // alert("Hai Ranger! Sistem menemukan skor game " + gameData.score + " yang belum disimpan. Mencoba menyimpan...");

        try {
            // 2. Kirim ke Database lewat jalur belakang (AJAX)
            const response = await fetch("{{ route('quiz.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    score: gameData.score,
                    streak: gameData.streak,
                    accuracy: 0 // Default 0 untuk guest
                })
            });

            // Baca respon server
            const result = await response.json();
            console.log("📡 Respon Server:", result);

            if (response.ok) {
                // 3. SUKSES
                localStorage.removeItem('pending_game_score'); // Hapus titipan biar gak double
                
                // Tampilkan Alert Sukses
                alert("🎉 BERHASIL! Skor " + gameData.score + " dari permainan tadi sudah diamankan ke akunmu!");
                
                // Reload halaman biar poin di dashboard nambah
                location.reload();
            } else {
                // 4. GAGAL DARI SERVER
                console.error("❌ Gagal simpan:", result);
                alert("Gagal menyimpan skor! Server menolak: " + (result.message || "Unknown Error"));
            }

        } catch (error) {
            // 5. ERROR JARINGAN / KODINGAN
            console.error("❌ Error Fatal:", error);
            alert("Terjadi kesalahan sistem saat menyimpan skor. Cek Console untuk detail.");
        }
    });
</script>

@endsection