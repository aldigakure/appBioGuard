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
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" style="display:inline;vertical-align:middle"><polyline points="20 6 9 17 4 12"/></svg> Selesai Diproses</span>
                @else
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" style="display:inline;vertical-align:middle"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Sedang Diproses</span>
                @endif
            </div>
            <span style="color: #9ca3af; font-size: 0.9rem;">{{ $laporan['created_at'] }}</span>
        </div>
        
        <div class="report-content">
            <h3>{{ $laporan['title'] }}</h3>
            <div class="report-meta">
                <div class="meta-item">
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" style="display:inline;vertical-align:middle"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span> {{ $laporan['location'] }}
                </div>
            </div>
            <p class="report-desc">
                {{ $laporan['description'] }}
            </p>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div style="font-size: 4rem; margin-bottom: 1rem;"><svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></div>
        <h3>Belum Ada Laporan</h3>
        <p style="color: #6b7280;">Anda belum pernah membuat laporan kejadian lingkungan.</p>
    </div>
    @endforelse
</div>
@endsection