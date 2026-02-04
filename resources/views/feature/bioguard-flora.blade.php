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
                <span><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></span>
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
            <div class="bioguard-upload-icon"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg></div>
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

<!-- Map Specific CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bioguard-map.css') }}">
<!-- Leaflet.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">

<!-- Interactive Map Section -->
<section class="bioguard-section bioguard-map-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:middle;margin-right:8px;"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>Peta Interaktif Habitat Flora</h2>
        <p class="bioguard-section-subtitle">Jelajahi sebaran habitat tumbuhan langka di Indonesia</p>

        <div class="bioguard-map-container">
            <div class="bioguard-map-wrapper">
                <div id="flora-map" class="bioguard-map-interactive flora"></div>
            </div>
            <div class="bioguard-habitat-list" id="floraHabitatList">
                <div class="bioguard-habitat-placeholder">
                    <div class="bioguard-habitat-placeholder-icon"><svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></div>
                    <p>Klik marker pada peta untuk melihat detail flora provinsi</p>
                </div>
            </div>
        </div>

        <!-- Flora Lainnya Section (Akan diisi via JS) -->
        <div id="floraLainnyaContainer" class="flora-lainnya-wrapper"></div>
    </div>
</section>

<!-- Leaflet.js Script -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!-- Flora Map Script -->
<script src="{{ asset('assets/js/bioguard-flora-leaflet.js') }}"></script>


<!-- Urgent Notifications Section -->
<section class="bioguard-section bioguard-notifications-section">
    <div class="bioguard-container">
        <h2 class="bioguard-section-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:middle;margin-right:8px;"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>Spesies yang Butuh Perlindungan Mendesak</h2>
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
        <h2 class="bioguard-section-title"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:middle;margin-right:8px;"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>Komunitas Pelaporan Flora</h2>
        <p class="bioguard-section-subtitle">Laporan temuan tumbuhan dari warga dan relawan konservasi</p>

        <div class="bioguard-community-grid">
            <div class="bioguard-report-card">
                <div class="bioguard-report-image"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7.5a4.5 4.5 0 1 1 4.5 4.5M12 7.5A4.5 4.5 0 1 0 7.5 12M12 7.5V9m-4.5 3a4.5 4.5 0 1 0 4.5 4.5M7.5 12H9m7.5 0a4.5 4.5 0 1 1-4.5 4.5m4.5-4.5H15m-3 4.5V15"/><circle cx="12" cy="12" r="3"/></svg></div>
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
                <div class="bioguard-report-image"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/><path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2"/><path d="M19 11h2m-1 -1v2"/></svg></div>
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