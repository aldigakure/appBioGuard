@extends('layouts.app')

@section('content')
@include('layouts.navbar-landing')
<!-- BioGuard Fauna Page -->
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
                <span>🦋</span>
                <span>BioGuard Fauna</span>
            </div>
        </div>
        <h1 class="bioguard-header-title">Pemantauan & Perlindungan <span class="text-gradient">Fauna Indonesia</span></h1>
        <p class="bioguard-header-desc">Identifikasi hewan dan satwa liar melalui foto atau rekaman kamera trap untuk memantau populasi spesies langka atau terancam punah.</p>
    </div>
</div>

<!-- Upload Section -->
<section class="bioguard-section bioguard-upload-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">Identifikasi Fauna</h2>
        <p class="bioguard-section-subtitle">Upload foto atau rekaman kamera trap untuk diidentifikasi oleh AI kami</p>

        <div class="bioguard-upload-card" onclick="document.getElementById('faunaUpload').click()">
            <input type="file" id="faunaUpload" accept="image/*,video/*" style="display: none;">
            <div class="bioguard-upload-icon">📹</div>
            <h3 class="bioguard-upload-title">Upload Foto atau Video Satwa</h3>
            <p class="bioguard-upload-desc">Seret dan lepas foto/video atau klik untuk memilih file</p>
            <button class="bioguard-upload-btn" type="button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                Pilih File
            </button>
            <p class="bioguard-upload-formats">Format yang didukung: JPG, PNG, MP4, MOV (Max. 50MB)</p>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="bioguard-section bioguard-map-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">🗺️ Peta Interaktif Habitat Fauna</h2>
        <p class="bioguard-section-subtitle">Jelajahi sebaran habitat satwa liar di Indonesia</p>

        <div class="bioguard-map-container">
            <div class="bioguard-map-wrapper">
                <div id="fauna-map" class="bioguard-map-interactive"></div>
            </div>
            <div class="bioguard-habitat-list" id="faunaHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon">🦋</div>
                    <p>Klik provinsi pada peta untuk melihat detail fauna</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<script>
    // Fauna data for each province
    const faunaData = {
        'id-ac': {
            name: 'Aceh',
            species: [{
                name: 'Harimau Sumatera',
                status: 'Kritis',
                icon: '🐅'
            }, {
                name: 'Gajah Sumatera',
                status: 'Kritis',
                icon: '🐘'
            }, {
                name: 'Orangutan Sumatera',
                status: 'Kritis',
                icon: '🦧'
            }],
            value: 180
        },
        'id-su': {
            name: 'Sumatera Utara',
            species: [{
                name: 'Orangutan Sumatera',
                status: 'Kritis',
                icon: '🦧'
            }, {
                name: 'Siamang',
                status: 'Rentan',
                icon: '🐒'
            }],
            value: 165
        },
        'id-sb': {
            name: 'Sumatera Barat',
            species: [{
                name: 'Harimau Sumatera',
                status: 'Kritis',
                icon: '🐅'
            }, {
                name: 'Tapir Asia',
                status: 'Rentan',
                icon: '🐗'
            }],
            value: 145
        },
        'id-ri': {
            name: 'Riau',
            species: [{
                name: 'Gajah Sumatera',
                status: 'Kritis',
                icon: '🐘'
            }, {
                name: 'Harimau Sumatera',
                status: 'Kritis',
                icon: '🐅'
            }],
            value: 155
        },
        'id-ja': {
            name: 'Jambi',
            species: [{
                name: 'Harimau Sumatera',
                status: 'Kritis',
                icon: '🐅'
            }, {
                name: 'Beruang Madu',
                status: 'Rentan',
                icon: '🐻'
            }],
            value: 140
        },
        'id-be': {
            name: 'Bengkulu',
            species: [{
                name: 'Harimau Sumatera',
                status: 'Kritis',
                icon: '🐅'
            }, {
                name: 'Kambing Sumatera',
                status: 'Rentan',
                icon: '🐐'
            }],
            value: 130
        },
        'id-1024': {
            name: 'Sumatera Selatan',
            species: [{
                name: 'Gajah Sumatera',
                status: 'Kritis',
                icon: '🐘'
            }],
            value: 125
        },
        'id-la': {
            name: 'Lampung',
            species: [{
                name: 'Badak Sumatera',
                status: 'Kritis',
                icon: '🦏'
            }, {
                name: 'Gajah Sumatera',
                status: 'Kritis',
                icon: '🐘'
            }],
            value: 160
        },
        'id-jk': {
            name: 'DKI Jakarta',
            species: [{
                name: 'Elang Bondol',
                status: 'Rentan',
                icon: '🦅'
            }],
            value: 45
        },
        'id-jb': {
            name: 'Jawa Barat',
            species: [{
                name: 'Macan Tutul Jawa',
                status: 'Kritis',
                icon: '🐆'
            }, {
                name: 'Owa Jawa',
                status: 'Rentan',
                icon: '🐒'
            }, {
                name: 'Surili',
                status: 'Rentan',
                icon: '🐒'
            }],
            value: 175
        },
        'id-bt': {
            name: 'Banten',
            species: [{
                name: 'Badak Jawa',
                status: 'Kritis',
                icon: '🦏'
            }, {
                name: 'Banteng',
                status: 'Rentan',
                icon: '🐃'
            }],
            value: 185
        },
        'id-jt': {
            name: 'Jawa Tengah',
            species: [{
                name: 'Macan Tutul Jawa',
                status: 'Kritis',
                icon: '🐆'
            }, {
                name: 'Lutung Jawa',
                status: 'Rentan',
                icon: '🐒'
            }],
            value: 135
        },
        'id-yo': {
            name: 'DI Yogyakarta',
            species: [{
                name: 'Penyu Hijau',
                status: 'Rentan',
                icon: '🐢'
            }],
            value: 75
        },
        'id-ji': {
            name: 'Jawa Timur',
            species: [{
                name: 'Banteng',
                status: 'Rentan',
                icon: '🐃'
            }, {
                name: 'Merak Hijau',
                status: 'Rentan',
                icon: '🦚'
            }, {
                name: 'Rusa Timor',
                status: 'Aman',
                icon: '🦌'
            }],
            value: 165
        },
        'id-ba': {
            name: 'Bali',
            species: [{
                name: 'Jalak Bali',
                status: 'Kritis',
                icon: '🐦'
            }, {
                name: 'Banteng',
                status: 'Rentan',
                icon: '🐃'
            }],
            value: 120
        },
        'id-nb': {
            name: 'Nusa Tenggara Barat',
            species: [{
                name: 'Rusa Timor',
                status: 'Aman',
                icon: '🦌'
            }],
            value: 95
        },
        'id-nt': {
            name: 'Nusa Tenggara Timur',
            species: [{
                name: 'Komodo',
                status: 'Rentan',
                icon: '🦎'
            }, {
                name: 'Rusa Timor',
                status: 'Aman',
                icon: '🦌'
            }, {
                name: 'Kuda Sumba',
                status: 'Aman',
                icon: '🐴'
            }],
            value: 195
        },
        'id-kb': {
            name: 'Kalimantan Barat',
            species: [{
                name: 'Orangutan Kalimantan',
                status: 'Kritis',
                icon: '🦧'
            }, {
                name: 'Bekantan',
                status: 'Rentan',
                icon: '🐒'
            }],
            value: 205
        },
        'id-kt': {
            name: 'Kalimantan Tengah',
            species: [{
                name: 'Orangutan Kalimantan',
                status: 'Kritis',
                icon: '🦧'
            }, {
                name: 'Pesut Mahakam',
                status: 'Kritis',
                icon: '🐬'
            }],
            value: 215
        },
        'id-ks': {
            name: 'Kalimantan Selatan',
            species: [{
                name: 'Bekantan',
                status: 'Rentan',
                icon: '🐒'
            }, {
                name: 'Beruang Madu',
                status: 'Rentan',
                icon: '🐻'
            }],
            value: 175
        },
        'id-ki': {
            name: 'Kalimantan Timur',
            species: [{
                name: 'Orangutan Kalimantan',
                status: 'Kritis',
                icon: '🦧'
            }, {
                name: 'Pesut Mahakam',
                status: 'Kritis',
                icon: '🐬'
            }, {
                name: 'Macan Dahan',
                status: 'Rentan',
                icon: '🐆'
            }],
            value: 235
        },
        'id-ku': {
            name: 'Kalimantan Utara',
            species: [{
                name: 'Orangutan Kalimantan',
                status: 'Kritis',
                icon: '🦧'
            }, {
                name: 'Banteng',
                status: 'Rentan',
                icon: '🐃'
            }],
            value: 195
        },
        'id-sa': {
            name: 'Sulawesi Utara',
            species: [{
                name: 'Tarsius Sulawesi',
                status: 'Rentan',
                icon: '🐒'
            }, {
                name: 'Maleo',
                status: 'Rentan',
                icon: '🐦'
            }],
            value: 165
        },
        'id-st': {
            name: 'Sulawesi Tengah',
            species: [{
                name: 'Anoa',
                status: 'Rentan',
                icon: '🐃'
            }, {
                name: 'Babirusa',
                status: 'Rentan',
                icon: '🐗'
            }],
            value: 185
        },
        'id-sg': {
            name: 'Sulawesi Tenggara',
            species: [{
                name: 'Anoa Dataran Rendah',
                status: 'Rentan',
                icon: '🐃'
            }],
            value: 145
        },
        'id-sn': {
            name: 'Sulawesi Selatan',
            species: [{
                name: 'Kuskus Sulawesi',
                status: 'Rentan',
                icon: '🐨'
            }, {
                name: 'Tarsius',
                status: 'Rentan',
                icon: '🐒'
            }],
            value: 155
        },
        'id-sw': {
            name: 'Sulawesi Barat',
            species: [{
                name: 'Anoa Pegunungan',
                status: 'Rentan',
                icon: '🐃'
            }],
            value: 125
        },
        'id-go': {
            name: 'Gorontalo',
            species: [{
                name: 'Maleo',
                status: 'Rentan',
                icon: '🐦'
            }],
            value: 115
        },
        'id-ma': {
            name: 'Maluku',
            species: [{
                name: 'Kakatua Maluku',
                status: 'Rentan',
                icon: '🦜'
            }, {
                name: 'Nuri Raja',
                status: 'Rentan',
                icon: '🦜'
            }],
            value: 175
        },
        'id-mu': {
            name: 'Maluku Utara',
            species: [{
                name: 'Bidadari Halmahera',
                status: 'Rentan',
                icon: '🐦'
            }],
            value: 155
        },
        'id-pa': {
            name: 'Papua',
            species: [{
                name: 'Cenderawasih',
                status: 'Rentan',
                icon: '🐦'
            }, {
                name: 'Kanguru Pohon',
                status: 'Rentan',
                icon: '🦘'
            }, {
                name: 'Kasuari',
                status: 'Rentan',
                icon: '🐦'
            }],
            value: 285
        },
        'id-pb': {
            name: 'Papua Barat',
            species: [{
                name: 'Cenderawasih Merah',
                status: 'Rentan',
                icon: '🐦'
            }, {
                name: 'Kakatua Raja',
                status: 'Rentan',
                icon: '🦜'
            }, {
                name: 'Penyu Belimbing',
                status: 'Kritis',
                icon: '🐢'
            }],
            value: 265
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        const mapData = [];
        Highcharts.maps['countries/id/id-all'].features.forEach(function(f) {
            const code = f.properties['hc-key'];
            mapData.push({
                'hc-key': code,
                value: faunaData[code]?.value || 100,
                name: f.properties.name
            });
        });

        Highcharts.mapChart('fauna-map', {
            chart: {
                backgroundColor: 'transparent'
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
                    verticalAlign: 'bottom'
                }
            },
            legend: {
                enabled: false
            },
            colorAxis: {
                min: 50,
                max: 300,
                stops: [
                    [0, '#fef3c7'],
                    [0.3, '#fbbf24'],
                    [0.6, '#f59e0b'],
                    [1, '#b45309']
                ]
            },
            tooltip: {
                useHTML: true,
                formatter: function() {
                    const d = faunaData[this.point['hc-key']];
                    return '<div style="padding:8px;"><b>🦋 ' + this.point.name + '</b><br>' + (d?.value || 100) + ' spesies fauna<br><small style="color:#f59e0b;">Klik untuk detail →</small></div>';
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
                        color: '#f59e0b',
                        borderWidth: 2
                    }
                },
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            showFaunaDetail(this['hc-key'], this.name);
                        }
                    }
                }
            }]
        });
    });

    function showFaunaDetail(code, name) {
        const d = faunaData[code] || {
            name: name,
            species: [{
                name: 'Fauna Lokal',
                status: 'Aman',
                icon: '🦋'
            }],
            value: 100
        };
        let html = '<div class="bioguard-habitat-card bioguard-habitat-card-header-fauna"><div class="bioguard-habitat-icon">🦋</div><div class="bioguard-habitat-info"><h4>' + (d.name || name) + '</h4><p>' + (d.value || 100) + ' spesies fauna</p></div></div>';
        d.species.forEach(function(s) {
            const statusClass = s.status === 'Kritis' ? 'status-critical' : (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe');
            html += '<div class="bioguard-habitat-card"><div class="bioguard-habitat-icon">' + (s.icon || '🦋') + '</div><div class="bioguard-habitat-info"><h4>' + s.name + '</h4><p class="species-status ' + statusClass + '">' + s.status + '</p></div></div>';
        });
        document.getElementById('faunaHabitatList').innerHTML = html;
    }
</script>


<!-- Urgent Notifications Section -->
<section class="bioguard-section bioguard-notifications-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">⚠️ Spesies yang Butuh Perlindungan Mendesak</h2>
        <p class="bioguard-section-subtitle">Fauna terancam punah yang membutuhkan perhatian khusus dari konservasionis</p>

        <div class="bioguard-notifications-grid">
            <div class="bioguard-notification-card">
                <div class="bioguard-notification-header">
                    <span class="bioguard-notification-badge">Kritis</span>
                </div>
                <h3 class="bioguard-notification-species">Harimau Sumatera</h3>
                <p class="bioguard-notification-latin">Panthera tigris sumatrae</p>
                <p class="bioguard-notification-text">Populasi diperkirakan hanya tersisa 400 individu di alam liar. Ancaman utama: perburuan liar dan kehilangan habitat.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        TN Kerinci Seblat
                    </span>
                    <button class="bioguard-notification-action">
                        Lihat Detail
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="bioguard-notification-card warning">
                <div class="bioguard-notification-header">
                    <span class="bioguard-notification-badge">Terancam</span>
                </div>
                <h3 class="bioguard-notification-species">Badak Jawa</h3>
                <p class="bioguard-notification-latin">Rhinoceros sondaicus</p>
                <p class="bioguard-notification-text">Hanya tersisa sekitar 72 individu di Taman Nasional Ujung Kulon. Spesies paling langka di dunia.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        TN Ujung Kulon
                    </span>
                    <button class="bioguard-notification-action">
                        Lihat Detail
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="bioguard-notification-card info">
                <div class="bioguard-notification-header">
                    <span class="bioguard-notification-badge">Perlu Monitoring</span>
                </div>
                <h3 class="bioguard-notification-species">Orangutan Kalimantan</h3>
                <p class="bioguard-notification-latin">Pongo pygmaeus</p>
                <p class="bioguard-notification-text">Populasi terus menurun akibat deforestasi. Perlu pemantauan intensif di habitat alami.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        TN Tanjung Puting
                    </span>
                    <button class="bioguard-notification-action">
                        Lihat Detail
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Reports Section -->
<section class="bioguard-section bioguard-community-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">🐾 Komunitas Pelaporan Fauna</h2>
        <p class="bioguard-section-subtitle">Laporan temuan satwa dari warga dan relawan konservasi</p>

        <div class="bioguard-community-grid">
            <div class="bioguard-report-card">
                <div class="bioguard-report-image">🐅</div>
                <div class="bioguard-report-content">
                    <div class="bioguard-report-meta">
                        <div class="bioguard-report-user">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Fadli&background=f59e0b&color=fff&size=32" alt="User" class="bioguard-report-avatar">
                            <span class="bioguard-report-username">Ahmad Fadli</span>
                        </div>
                        <span class="bioguard-report-date">1 jam lalu</span>
                    </div>
                    <h3 class="bioguard-report-title">Jejak Harimau Terdeteksi</h3>
                    <p class="bioguard-report-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        TN Kerinci Seblat, Jambi
                    </p>
                    <span class="bioguard-report-status verified">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Terverifikasi
                    </span>
                </div>
            </div>

            <div class="bioguard-report-card">
                <div class="bioguard-report-image">🦜</div>
                <div class="bioguard-report-content">
                    <div class="bioguard-report-meta">
                        <div class="bioguard-report-user">
                            <img src="https://ui-avatars.com/api/?name=Siti+Rahayu&background=ec4899&color=fff&size=32" alt="User" class="bioguard-report-avatar">
                            <span class="bioguard-report-username">Siti Rahayu</span>
                        </div>
                        <span class="bioguard-report-date">3 jam lalu</span>
                    </div>
                    <h3 class="bioguard-report-title">Kakatua Raja Teramati</h3>
                    <p class="bioguard-report-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Raja Ampat, Papua Barat
                    </p>
                    <span class="bioguard-report-status pending">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        Menunggu Verifikasi
                    </span>
                </div>
            </div>

            <div class="bioguard-add-report-card">
                <div class="bioguard-add-report-icon">+</div>
                <h3 class="bioguard-add-report-title">Laporkan Temuan Fauna</h3>
                <p class="bioguard-add-report-desc">Bagikan penemuan satwa liar di daerah Anda</p>
            </div>
        </div>
    </div>
</section>
@endsection