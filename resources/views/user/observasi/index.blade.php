@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/observasi.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Hero Section -->
        <div class="observasi-hero">
            <div class="observasi-hero-content">
                <h1>🔭 Observasi Biodiversitas</h1>
                <p>Dokumentasikan pengamatan flora dan fauna untuk mendukung konservasi alam Indonesia</p>
            </div>
            <a href="{{ route('observasi.create') }}" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Observasi
            </a>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-header">
                <div class="filter-title">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                    Filter Observasi
                </div>
                <button class="btn btn-outline btn-sm">Reset</button>
            </div>
            <div class="filter-grid">
                <div class="filter-group">
                    <label class="filter-label">Kategori</label>
                    <select class="filter-select">
                        <option value="">Semua Kategori</option>
                        <option value="mamalia">Mamalia</option>
                        <option value="burung">Burung</option>
                        <option value="reptil">Reptil</option>
                        <option value="flora">Flora</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-select">
                        <option value="">Semua Status</option>
                        <option value="verified">Terverifikasi</option>
                        <option value="pending">Menunggu</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Lokasi</label>
                    <select class="filter-select">
                        <option value="">Semua Lokasi</option>
                        <option value="sumatera">Sumatera</option>
                        <option value="kalimantan">Kalimantan</option>
                        <option value="papua">Papua</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Tanggal</label>
                    <input type="date" class="filter-input">
                </div>
            </div>
        </div>

        <!-- Observasi Grid -->
        <div class="observasi-grid">
            @foreach([
            ['icon' => '🦧', 'name' => 'Orangutan Kalimantan', 'latin' => 'Pongo pygmaeus', 'loc' => 'TN Tanjung Puting', 'cat' => 'mamalia', 'user' => 'Maya Putri', 'role' => 'Volunteer'],
            ['icon' => '🐅', 'name' => 'Harimau Sumatera', 'latin' => 'Panthera tigris sumatrae', 'loc' => 'TN Kerinci Seblat', 'cat' => 'mamalia', 'user' => 'Siti Rahayu', 'role' => 'Researcher'],
            ['icon' => '🦜', 'name' => 'Kakatua Raja', 'latin' => 'Probosciger aterrimus', 'loc' => 'Raja Ampat, Papua', 'cat' => 'fauna', 'user' => 'Budi Santoso', 'role' => 'Volunteer'],
            ['icon' => '🦎', 'name' => 'Komodo', 'latin' => 'Varanus komodoensis', 'loc' => 'Pulau Komodo, NTT', 'cat' => 'fauna', 'user' => 'Ahmad Fadli', 'role' => 'Researcher'],
            ['icon' => '🌺', 'name' => 'Rafflesia Arnoldii', 'latin' => 'Rafflesia arnoldii', 'loc' => 'TN Bukit Barisan', 'cat' => 'flora', 'user' => 'Dewi Lestari', 'role' => 'Botanist'],
            ['icon' => '🐘', 'name' => 'Gajah Sumatera', 'latin' => 'Elephas maximus', 'loc' => 'TN Way Kambas', 'cat' => 'mamalia', 'user' => 'Rudi Hartono', 'role' => 'Jagawana']
            ] as $obs)
            <div class="observasi-card card-hover">
                <div class="observasi-image-placeholder">{{ $obs['icon'] }}</div>
                <div class="observasi-content">
                    <div class="observasi-meta">
                        <span class="observasi-date">13 Jan 2026</span>
                        <span class="observasi-category {{ $obs['cat'] }}">{{ ucfirst($obs['cat']) }}</span>
                    </div>
                    <h3 class="observasi-species">{{ $obs['name'] }}</h3>
                    <p class="observasi-latin">{{ $obs['latin'] }}</p>
                    <div class="observasi-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        {{ $obs['loc'] }}
                    </div>
                    <div class="observasi-footer">
                        <div class="observasi-observer">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($obs['user']) }}&background=10b981&color=fff&size=36" alt="">
                            <div class="observasi-observer-info">
                                <span class="name">{{ $obs['user'] }}</span>
                                <span class="role">{{ $obs['role'] }}</span>
                            </div>
                        </div>
                        <a href="#" class="view-detail-btn">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="table-pagination">
            <div class="pagination-info">Menampilkan <strong>1-6</strong> dari <strong>52,841</strong> observasi</div>
            <div class="pagination-controls">
                <button class="pagination-btn" disabled>&lt;</button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <span class="pagination-dots">...</span>
                <button class="pagination-btn">8807</button>
                <button class="pagination-btn">&gt;</button>
            </div>
        </div>
    </div>
</main>
@endsection