@extends('layouts.app')

@section('content')
@include('layouts.navbar-landing')
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

        <!-- Flora Lainnya Section (Akan diisi via JS) -->
        <div id="floraLainnyaContainer" class="flora-lainnya-wrapper"></div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script src="{{ asset('assets/js/bioguard-flora-map.js') }}"></script>


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