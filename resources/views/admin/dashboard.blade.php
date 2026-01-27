@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<!-- Dashboard Content -->
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Page Title -->
        <div class="dashboard-title-section">
            <div>
                <h1 class="dashboard-title">Dashboard Overview</h1>
                <p class="dashboard-subtitle">Selamat datang! Pantau aktivitas biodiversitas terkini.</p>
            </div>

        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <!-- Species Card -->
            <div class="stat-card card-hover">
                <div class="stat-card-header">
                    <div class="stat-icon icon-green">🦋</div>
                    <div class="stat-trend trend-up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span>+12%</span>
                    </div>
                </div>
                <div class="stat-value">5,247</div>
                <div class="stat-label">Spesies Terdaftar</div>
            </div>

            <!-- Observations Card -->
            <div class="stat-card card-hover">
                <div class="stat-card-header">
                    <div class="stat-icon icon-cyan">🔭</div>
                    <div class="stat-trend trend-up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span>+28%</span>
                    </div>
                </div>
                <div class="stat-value">52,841</div>
                <div class="stat-label">Total Observasi</div>
            </div>

            <!-- Volunteers Card -->
            <div class="stat-card card-hover">
                <div class="stat-card-header">
                    <div class="stat-icon icon-amber">🤝</div>
                    <div class="stat-trend trend-up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span>+8%</span>
                    </div>
                </div>
                <div class="stat-value">1,284</div>
                <div class="stat-label">Relawan Aktif</div>
            </div>

            <!-- Threats Card -->
            <div class="stat-card card-hover">
                <div class="stat-card-header">
                    <div class="stat-icon icon-rose">⚠️</div>
                    <div class="stat-trend trend-down">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                            <polyline points="17 18 23 18 23 12"></polyline>
                        </svg>
                        <span>-15%</span>
                    </div>
                </div>
                <div class="stat-value">127</div>
                <div class="stat-label">Ancaman Terdeteksi</div>
            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="quick-actions-section">
            <h2 class="section-title-sm">Aksi Cepat</h2>
            <div class="quick-actions-grid">
                <a href="#" class="quick-action-card card-hover">
                    <div class="quick-action-icon icon-green">📝</div>
                    <div class="quick-action-content">
                        <h3>Tambah Observasi</h3>
                        <p>Catat pengamatan spesies baru</p>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
                <a href="#" class="quick-action-card card-hover">
                    <div class="quick-action-icon icon-cyan">📸</div>
                    <div class="quick-action-content">
                        <h3>Upload Media</h3>
                        <p>Unggah foto atau video spesies</p>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
                <a href="#" class="quick-action-card card-hover">
                    <div class="quick-action-icon icon-amber">⚠️</div>
                    <div class="quick-action-content">
                        <h3>Laporkan Ancaman</h3>
                        <p>Report insiden lingkungan</p>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
                <a href="#" class="quick-action-card card-hover">
                    <div class="quick-action-icon icon-violet">🌱</div>
                    <div class="quick-action-content">
                        <h3>Program Reboisasi</h3>
                        <p>Ikut kegiatan penanaman</p>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Data Table Section -->
        <div class="table-section">
            <div class="table-card card-hover">
                <div class="table-header">
                    <div>
                        <h3 class="table-title">Observasi Terbaru</h3>
                        <p class="table-subtitle">Daftar pengamatan terakhir dari seluruh wilayah</p>
                    </div>
                    <div class="table-actions">
                        <div class="search-box">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                            <input type="text" placeholder="Cari observasi..." id="searchInput">
                        </div>
                        <button class="btn btn-primary btn-sm">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Spesies</th>
                                <th>Lokasi</th>
                                <th>Observer</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">13 Jan 2026</span>
                                        <span class="date-time">07:30 WIB</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="species-cell">
                                        <span class="species-icon">🦜</span>
                                        <div>
                                            <span class="species-name">Kakatua Raja</span>
                                            <span class="species-latin">Probosciger aterrimus</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="location-cell">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        Raja Ampat, Papua Barat
                                    </div>
                                </td>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=10b981&color=fff&size=32" alt="Budi">
                                        Budi Santoso
                                    </div>
                                </td>
                                <td><span class="status-badge status-verified">Terverifikasi</span></td>
                                <td>
                                    <button class="action-btn" title="Lihat Detail">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">13 Jan 2026</span>
                                        <span class="date-time">06:45 WIB</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="species-cell">
                                        <span class="species-icon">🐅</span>
                                        <div>
                                            <span class="species-name">Harimau Sumatera</span>
                                            <span class="species-latin">Panthera tigris sumatrae</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="location-cell">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        Taman Nasional Kerinci
                                    </div>
                                </td>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name=Siti+Rahayu&background=06b6d4&color=fff&size=32" alt="Siti">
                                        Siti Rahayu
                                    </div>
                                </td>
                                <td><span class="status-badge status-verified">Terverifikasi</span></td>
                                <td>
                                    <button class="action-btn" title="Lihat Detail">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">12 Jan 2026</span>
                                        <span class="date-time">16:20 WIB</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="species-cell">
                                        <span class="species-icon">🦎</span>
                                        <div>
                                            <span class="species-name">Komodo</span>
                                            <span class="species-latin">Varanus komodoensis</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="location-cell">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        Pulau Komodo, NTT
                                    </div>
                                </td>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name=Ahmad+Fadli&background=f59e0b&color=fff&size=32" alt="Ahmad">
                                        Ahmad Fadli
                                    </div>
                                </td>
                                <td><span class="status-badge status-pending">Menunggu</span></td>
                                <td>
                                    <button class="action-btn" title="Lihat Detail">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">12 Jan 2026</span>
                                        <span class="date-time">14:15 WIB</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="species-cell">
                                        <span class="species-icon">🦧</span>
                                        <div>
                                            <span class="species-name">Orangutan Kalimantan</span>
                                            <span class="species-latin">Pongo pygmaeus</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="location-cell">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        TN Tanjung Puting
                                    </div>
                                </td>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name=Maya+Putri&background=ec4899&color=fff&size=32" alt="Maya">
                                        Maya Putri
                                    </div>
                                </td>
                                <td><span class="status-badge status-verified">Terverifikasi</span></td>
                                <td>
                                    <button class="action-btn" title="Lihat Detail">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">12 Jan 2026</span>
                                        <span class="date-time">11:30 WIB</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="species-cell">
                                        <span class="species-icon">🌺</span>
                                        <div>
                                            <span class="species-name">Rafflesia Arnoldii</span>
                                            <span class="species-latin">Rafflesia arnoldii</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="location-cell">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        Bengkulu
                                    </div>
                                </td>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=8b5cf6&color=fff&size=32" alt="Dewi">
                                        Dewi Lestari
                                    </div>
                                </td>
                                <td><span class="status-badge status-review">Dalam Review</span></td>
                                <td>
                                    <button class="action-btn" title="Lihat Detail">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="table-pagination">
                    <div class="pagination-info">
                        Menampilkan <strong>1-5</strong> dari <strong>2,841</strong> observasi
                    </div>
                    <div class="pagination-controls">
                        <button class="pagination-btn" disabled>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <span class="pagination-dots">...</span>
                        <button class="pagination-btn">568</button>
                        <button class="pagination-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Set current date
    const dateOptions = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', dateOptions);

    // Notification button interaction
    // Notification button interaction
    document.querySelectorAll('.notification-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            alert('Notifikasi: Anda memiliki 5 pemberitahuan baru!');
        });
    });
</script>
@endsection