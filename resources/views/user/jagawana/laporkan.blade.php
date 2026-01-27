@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jagawana-layout.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/laporkan-jagawana.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<div class="jagawana-layout">


    <!-- Main Content -->
    <main class="jagawana-main">
        <div class="page-header">
            <h1 class="page-title">🚨 Buat Laporan Baru</h1>
            <p class="page-subtitle">Laporkan aktivitas mencurigakan, kerusakan hutan, atau temuan penting lainnya.</p>
        </div>

        <div class="form-card">
            <form action="{{ route('jagawana.laporkan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Kategori Laporan</label>
                    <div class="category-grid">
                        <label class="category-option">
                            <input type="radio" name="kategori" value="illegal_logging" required>
                            <div class="category-card">
                                <span class="category-icon">🪓</span>
                                <span class="category-name">Penebangan Liar</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="kategori" value="poaching">
                            <div class="category-card">
                                <span class="category-icon">🎯</span>
                                <span class="category-name">Perburuan Liar</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="kategori" value="fire">
                            <div class="category-card">
                                <span class="category-icon">🔥</span>
                                <span class="category-name">Kebakaran</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="kategori" value="wildlife">
                            <div class="category-card">
                                <span class="category-icon">🦁</span>
                                <span class="category-name">Satwa Liar</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="kategori" value="other">
                            <div class="category-card">
                                <span class="category-icon">📌</span>
                                <span class="category-name">Lainnya</span>
                            </div>
                        </label>
                    </div>
                    @error('kategori')
                        <span class="form-hint" style="color: #ef4444;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="judul">Judul Laporan</label>
                    <input 
                        type="text" 
                        id="judul" 
                        name="judul" 
                        class="form-input" 
                        placeholder="Contoh: Penemuan jejak perburuan liar di Blok A"
                        value="{{ old('judul') }}"
                        required
                    >
                    @error('judul')
                        <span class="form-hint" style="color: #ef4444;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="lokasi">Lokasi Kejadian</label>
                    <input 
                        type="text" 
                        id="lokasi" 
                        name="lokasi" 
                        class="form-input" 
                        placeholder="Contoh: Blok A, Kawasan Hutan Lindung Gunung Halimun"
                        value="{{ old('lokasi') }}"
                        required
                    >
                    <p class="form-hint">Masukkan lokasi sedetail mungkin untuk memudahkan tindak lanjut.</p>
                    @error('lokasi')
                        <span class="form-hint" style="color: #ef4444;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi Lengkap</label>
                    <textarea 
                        id="deskripsi" 
                        name="deskripsi" 
                        class="form-textarea" 
                        placeholder="Jelaskan secara detail apa yang Anda temukan atau saksikan..."
                        required
                    >{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span class="form-hint" style="color: #ef4444;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                            <path d="M22 2L11 13"></path>
                            <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                        </svg>
                        Kirim Laporan
                    </button>
                    <a href="{{ route('jagawana.dashboard') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
