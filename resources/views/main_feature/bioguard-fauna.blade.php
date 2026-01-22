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

        <!-- Fauna Lainnya Section (Akan diisi via JS) -->
        <div id="faunaLainnyaContainer" class="fauna-lainnya-wrapper"></div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script src="{{ asset('assets/js/bioguard-fauna-map.js') }}"></script>


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