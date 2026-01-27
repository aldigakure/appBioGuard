@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/laporan-warga.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<div class=" warga-container">
    <div class="page-header">
        <h1 class="page-title">Laporan Warga</h1>
        <p class="page-subtitle">
            Laporkan kejadian lingkungan di sekitar Anda atau pantau laporan yang telah Anda buat. 
            Partisipasi Anda sangat berarti bagi kelestarian alam.
        </p>
        <div class="mt-4">
            <a href="#" class="btn-create-report">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Buat Laporan Baru
            </a>
        </div>
    </div>

    @forelse($laporans as $laporan)
    <div class="report-card">
        <div class="report-header">
            <div class="report-status status-{{ $laporan['status'] }}">
                @if($laporan['status'] == 'selesai')
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
            <p class="report-desc">
                {{ $laporan['description'] }}
            </p>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📝</div>
        <h3>Belum Ada Laporan</h3>
        <p style="color: #6b7280;">Anda belum pernah membuat laporan kejadian lingkungan.</p>
    </div>
    @endforelse
</div>
@endsection