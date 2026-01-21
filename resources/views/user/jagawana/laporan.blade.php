@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jagawana-layout.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/laporan-warga.css') }}">

@endsection

@section('content')
@include('layouts.navbar-dashboard')

<div class="jagawana-layout">
    <!-- Sidebar -->
   
    <!-- Main Content -->
    <main class="jagawana-main">
        <div class="page-header">
            <h1 class="page-title">📋 Laporan Jagawana</h1>
            <p class="page-subtitle">
                Pantau laporan masuk atau buat laporan baru terkait kondisi area pengawasan Anda.
            </p>
            <div class="mt-4">
                <a href="{{ route('jagawana.laporkan') }}" class="btn-create-report">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Buat Laporan Baru
                </a>
            </div>
        </div>

        @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem 1.5rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);">
            {{ session('success') }}
        </div>
        @endif

        @forelse($laporans as $laporan)
        <div class="report-card">
            <div class="report-header">
                <div class="report-status {{ isset($laporan['status']) ? 'status-' . $laporan['status'] : 'status-proses' }}">
                    @if(isset($laporan['status']) && $laporan['status'] == 'selesai')
                        <span>✅ Selesai Diproses</span>
                    @else
                        <span>⏳ Sedang Diproses</span>
                    @endif
                </div>
                <span style="color: #9ca3af; font-size: 0.9rem;">{{ $laporan['created_at'] }}</span>
            </div>
            
            <div class="report-content">
                <h3>{{ $laporan['title'] }}</h3>
                <div class="report-meta">
                    <div class="meta-item">
                        <span>📍</span> {{ $laporan['location'] }}
                    </div>
                </div>
                @if(isset($laporan['description']))
                <p class="report-desc">
                    {{ $laporan['description'] }}
                </p>
                @endif
                @if(isset($laporan['coordinates']))
                <div style="font-size: 0.8rem; color: #6b7280; margin-top: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>🌐 Koordinat:</span>
                    <code>{{ $laporan['coordinates'] }}</code>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div style="font-size: 4rem; margin-bottom: 1rem;">📋</div>
            <h3>Belum Ada Laporan</h3>
            <p style="color: #6b7280;">Daftar laporan masih kosong. Mulailah dengan membuat laporan baru.</p>
        </div>
        @endforelse
    </main>
</div>
@endsection
