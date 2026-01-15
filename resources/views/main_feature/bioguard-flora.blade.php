@extends('layouts.app')

@section('content')
<!-- BioGuard Flora Page -->
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
                <span>🌿</span>
                <span>BioGuard Flora</span>
            </div>
        </div>
        <h1 class="bioguard-header-title">Pemantauan & Perlindungan <span class="text-gradient">Flora Indonesia</span></h1>
        <p class="bioguard-header-desc">Identifikasi tumbuhan langka melalui foto menggunakan AI untuk memantau dan melindungi keanekaragaman flora Indonesia.</p>
    </div>
</div>

<!-- Upload Section -->
<section class="bioguard-section bioguard-upload-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">Identifikasi Flora</h2>
        <p class="bioguard-section-subtitle">Upload foto tumbuhan untuk diidentifikasi oleh AI kami</p>
        
        <div class="bioguard-upload-card" onclick="document.getElementById('floraUpload').click()">
            <input type="file" id="floraUpload" accept="image/*" style="display: none;">
            <div class="bioguard-upload-icon">📷</div>
            <h3 class="bioguard-upload-title">Upload Foto Tumbuhan</h3>
            <p class="bioguard-upload-desc">Seret dan lepas foto atau klik untuk memilih file</p>
            <button class="bioguard-upload-btn" type="button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                Pilih Foto
            </button>
            <p class="bioguard-upload-formats">Format yang didukung: JPG, PNG, WEBP (Max. 10MB)</p>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="bioguard-section bioguard-map-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">🗺️ Peta Interaktif Habitat Flora</h2>
        <p class="bioguard-section-subtitle">Jelajahi sebaran habitat tumbuhan langka di Indonesia</p>
        
        <div class="bioguard-map-container">
            <div class="bioguard-map-wrapper">
                <div id="flora-map" class="bioguard-map-interactive flora"></div>
            </div>
            <div class="bioguard-habitat-list" id="floraHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon">🌿</div>
                    <p>Klik provinsi pada peta untuk melihat detail flora</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<script>
// Flora data for each province
const floraData = {
    'id-ac': { name: 'Aceh', species: [{ name: 'Rafflesia arnoldii', status: 'Kritis' }, { name: 'Pinus Merkusii', status: 'Rentan' }], value: 320 },
    'id-su': { name: 'Sumatera Utara', species: [{ name: 'Bunga Bangkai', status: 'Rentan' }, { name: 'Andaliman', status: 'Aman' }], value: 380 },
    'id-sb': { name: 'Sumatera Barat', species: [{ name: 'Rafflesia arnoldii', status: 'Kritis' }, { name: 'Kantong Semar', status: 'Rentan' }], value: 420 },
    'id-ri': { name: 'Riau', species: [{ name: 'Gaharu', status: 'Rentan' }, { name: 'Meranti', status: 'Kritis' }], value: 280 },
    'id-ja': { name: 'Jambi', species: [{ name: 'Jernang', status: 'Rentan' }, { name: 'Tembesu', status: 'Aman' }], value: 310 },
    'id-be': { name: 'Bengkulu', species: [{ name: 'Rafflesia arnoldii', status: 'Kritis' }, { name: 'Bunga Bangkai Raksasa', status: 'Rentan' }], value: 450 },
    'id-1024': { name: 'Sumatera Selatan', species: [{ name: 'Gelam', status: 'Aman' }, { name: 'Ramin', status: 'Kritis' }], value: 290 },
    'id-bb': { name: 'Bangka Belitung', species: [{ name: 'Pelawan', status: 'Rentan' }], value: 180 },
    'id-la': { name: 'Lampung', species: [{ name: 'Bunga Bangkai', status: 'Rentan' }, { name: 'Damar Mata Kucing', status: 'Rentan' }], value: 340 },
    'id-kr': { name: 'Kepulauan Riau', species: [{ name: 'Bakau', status: 'Aman' }], value: 150 },
    'id-jk': { name: 'DKI Jakarta', species: [{ name: 'Kepuh', status: 'Aman' }], value: 120 },
    'id-jb': { name: 'Jawa Barat', species: [{ name: 'Rafflesia patma', status: 'Kritis' }, { name: 'Edelweiss Jawa', status: 'Rentan' }, { name: 'Kantil', status: 'Rentan' }], value: 520 },
    'id-bt': { name: 'Banten', species: [{ name: 'Langkap', status: 'Rentan' }], value: 280 },
    'id-jt': { name: 'Jawa Tengah', species: [{ name: 'Cemara Gunung', status: 'Aman' }, { name: 'Sawo Kecik', status: 'Rentan' }], value: 450 },
    'id-yo': { name: 'DI Yogyakarta', species: [{ name: 'Edelweiss Jawa', status: 'Rentan' }], value: 220 },
    'id-ji': { name: 'Jawa Timur', species: [{ name: 'Edelweiss Jawa', status: 'Rentan' }, { name: 'Pohon Sono', status: 'Rentan' }], value: 480 },
    'id-ba': { name: 'Bali', species: [{ name: 'Bunga Jepun', status: 'Aman' }, { name: 'Majegau', status: 'Rentan' }], value: 280 },
    'id-nb': { name: 'Nusa Tenggara Barat', species: [{ name: 'Kesambi', status: 'Aman' }], value: 250 },
    'id-nt': { name: 'Nusa Tenggara Timur', species: [{ name: 'Cendana', status: 'Rentan' }, { name: 'Asam', status: 'Aman' }], value: 320 },
    'id-kb': { name: 'Kalimantan Barat', species: [{ name: 'Kantong Semar', status: 'Kritis' }, { name: 'Tengkawang', status: 'Rentan' }], value: 580 },
    'id-kt': { name: 'Kalimantan Tengah', species: [{ name: 'Ulin', status: 'Rentan' }, { name: 'Ramin', status: 'Kritis' }], value: 520 },
    'id-ks': { name: 'Kalimantan Selatan', species: [{ name: 'Kasturi', status: 'Kritis' }, { name: 'Ulin', status: 'Rentan' }], value: 450 },
    'id-ki': { name: 'Kalimantan Timur', species: [{ name: 'Anggrek Hitam', status: 'Kritis' }, { name: 'Meranti', status: 'Kritis' }, { name: 'Ulin', status: 'Rentan' }], value: 620 },
    'id-ku': { name: 'Kalimantan Utara', species: [{ name: 'Agatis Borneo', status: 'Rentan' }], value: 480 },
    'id-sa': { name: 'Sulawesi Utara', species: [{ name: 'Anggrek Bulan', status: 'Rentan' }, { name: 'Eboni', status: 'Rentan' }], value: 380 },
    'id-st': { name: 'Sulawesi Tengah', species: [{ name: 'Eboni Sulawesi', status: 'Kritis' }], value: 420 },
    'id-sg': { name: 'Sulawesi Tenggara', species: [{ name: 'Sagu', status: 'Aman' }], value: 350 },
    'id-sn': { name: 'Sulawesi Selatan', species: [{ name: 'Eboni Makassar', status: 'Kritis' }], value: 390 },
    'id-sw': { name: 'Sulawesi Barat', species: [{ name: 'Aren', status: 'Aman' }], value: 280 },
    'id-go': { name: 'Gorontalo', species: [{ name: 'Nantu', status: 'Rentan' }], value: 250 },
    'id-ma': { name: 'Maluku', species: [{ name: 'Cengkeh', status: 'Aman' }, { name: 'Pala', status: 'Aman' }], value: 450 },
    'id-mu': { name: 'Maluku Utara', species: [{ name: 'Cengkeh Afo', status: 'Langka' }], value: 380 },
    'id-pa': { name: 'Papua', species: [{ name: 'Anggrek Papua', status: 'Rentan' }, { name: 'Matoa', status: 'Aman' }, { name: 'Merbau', status: 'Rentan' }], value: 850 },
    'id-pb': { name: 'Papua Barat', species: [{ name: 'Damar Raja', status: 'Rentan' }, { name: 'Buah Merah', status: 'Aman' }], value: 720 }
};

document.addEventListener('DOMContentLoaded', function() {
    const mapData = [];
    Highcharts.maps['countries/id/id-all'].features.forEach(function(f) {
        const code = f.properties['hc-key'];
        mapData.push({ 'hc-key': code, value: floraData[code]?.value || 200, name: f.properties.name });
    });

    Highcharts.mapChart('flora-map', {
        chart: { backgroundColor: 'transparent' },
        title: { text: null },
        credits: { enabled: false },
        exporting: { enabled: false },
        mapNavigation: { enabled: true, buttonOptions: { verticalAlign: 'bottom' } },
        legend: { enabled: false },
        colorAxis: { min: 100, max: 900, stops: [[0, '#a7f3d0'], [0.3, '#34d399'], [0.6, '#059669'], [1, '#064e3b']] },
        tooltip: {
            useHTML: true,
            formatter: function() {
                const d = floraData[this.point['hc-key']];
                return '<div style="padding:8px;"><b>🌿 ' + this.point.name + '</b><br>' + (d?.value || 200) + ' spesies flora<br><small style="color:#10b981;">Klik untuk detail →</small></div>';
            }
        },
        series: [{
            data: mapData,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            borderColor: 'white',
            borderWidth: 1,
            states: { hover: { color: '#10b981', borderWidth: 2 } },
            cursor: 'pointer',
            point: { events: { click: function() { showFloraDetail(this['hc-key'], this.name); } } }
        }]
    });
});

function showFloraDetail(code, name) {
    const d = floraData[code] || { name: name, species: [{ name: 'Flora Lokal', status: 'Aman' }], value: 200 };
    let html = '<div class="bioguard-habitat-card bioguard-habitat-card-header"><div class="bioguard-habitat-icon">🌿</div><div class="bioguard-habitat-info"><h4>' + (d.name || name) + '</h4><p>' + (d.value || 200) + ' spesies flora</p></div></div>';
    d.species.forEach(function(s) {
        const statusClass = s.status === 'Kritis' ? 'status-critical' : (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe');
        html += '<div class="bioguard-habitat-card"><div class="bioguard-habitat-icon">🌺</div><div class="bioguard-habitat-info"><h4>' + s.name + '</h4><p class="species-status ' + statusClass + '">' + s.status + '</p></div></div>';
    });
    document.getElementById('floraHabitatList').innerHTML = html;
}
</script>


<!-- Urgent Notifications Section -->
<section class="bioguard-section bioguard-notifications-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title">⚠️ Spesies yang Butuh Perlindungan Mendesak</h2>
        <p class="bioguard-section-subtitle">Flora langka yang terancam punah dan membutuhkan perhatian khusus</p>
        
        <div class="bioguard-notifications-grid">
            <div class="bioguard-notification-card">
                <div class="bioguard-notification-header">
                    <span class="bioguard-notification-badge">Kritis</span>
                </div>
                <h3 class="bioguard-notification-species">Rafflesia Arnoldii</h3>
                <p class="bioguard-notification-latin">Rafflesia arnoldii</p>
                <p class="bioguard-notification-text">Populasi menurun drastis akibat kerusakan habitat. Diperkirakan hanya tersisa kurang dari 1.000 individu di alam liar.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Sumatera, Bengkulu
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
                <h3 class="bioguard-notification-species">Anggrek Hitam</h3>
                <p class="bioguard-notification-latin">Coelogyne pandurata</p>
                <p class="bioguard-notification-text">Tingkat perburuan tinggi untuk dijadikan tanaman hias. Habitat alami semakin menyempit.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Kalimantan Timur
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
                <h3 class="bioguard-notification-species">Kantong Semar</h3>
                <p class="bioguard-notification-latin">Nepenthes lowii</p>
                <p class="bioguard-notification-text">Populasi stabil namun perlu pengawasan karena perdagangan ilegal yang meningkat.</p>
                <div class="bioguard-notification-footer">
                    <span class="bioguard-notification-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Kalimantan Barat
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
        <h2 class="bioguard-section-title">🌱 Komunitas Pelaporan Flora</h2>
        <p class="bioguard-section-subtitle">Laporan temuan tumbuhan dari warga dan relawan konservasi</p>
        
        <div class="bioguard-community-grid">
            <div class="bioguard-report-card">
                <div class="bioguard-report-image">🌺</div>
                <div class="bioguard-report-content">
                    <div class="bioguard-report-meta">
                        <div class="bioguard-report-user">
                            <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=10b981&color=fff&size=32" alt="User" class="bioguard-report-avatar">
                            <span class="bioguard-report-username">Dewi Lestari</span>
                        </div>
                        <span class="bioguard-report-date">2 jam lalu</span>
                    </div>
                    <h3 class="bioguard-report-title">Penemuan Rafflesia Mekar</h3>
                    <p class="bioguard-report-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        TN Bukit Barisan, Bengkulu
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
                <div class="bioguard-report-image">🌸</div>
                <div class="bioguard-report-content">
                    <div class="bioguard-report-meta">
                        <div class="bioguard-report-user">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=06b6d4&color=fff&size=32" alt="User" class="bioguard-report-avatar">
                            <span class="bioguard-report-username">Budi Santoso</span>
                        </div>
                        <span class="bioguard-report-date">5 jam lalu</span>
                    </div>
                    <h3 class="bioguard-report-title">Anggrek Bulan Langka Ditemukan</h3>
                    <p class="bioguard-report-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Taman Nasional Bogani, Sulawesi
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
                <h3 class="bioguard-add-report-title">Laporkan Temuan Flora</h3>
                <p class="bioguard-add-report-desc">Bagikan penemuan tumbuhan langka di daerah Anda</p>
            </div>
        </div>
    </div>
</section>
@endsection
