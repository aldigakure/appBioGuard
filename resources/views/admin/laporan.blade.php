@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<!-- Forum laporan Content -->
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Page Title Section -->
        <div class="dashboard-title-section">
            <div>
                <h1 class="dashboard-title">Laporan</h1>
                <p class="dashboard-subtitle">Ruang laporan untuk pengamatan dan informasi biodiversitas</p>
            </div>
            <button class="btn btn-primary" onclick="openNewlaporanModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Buat Laporan Baru
            </button>
        </div>

        <!-- Forum laporan Cards -->
        <div class="forum-section">
            @foreach($laporans as $laporan)
            <div class="forum-card card-hover">
                <div class="forum-card-header">
                    <div class="forum-icon icon-green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="forum-content">
                        <h3 class="forum-title">{{ $laporan['title'] }}</h3>
                        <div class="forum-meta">
                            <div class="forum-author">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($laporan['author']) }}&background=10b981&color=fff&size=24" alt="{{ $laporan['author'] }}">
                                <span>{{ $laporan['author'] }}</span>
                            </div>
                            <span class="forum-separator">•</span>
                            <div class="forum-time">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>{{ $laporan['created_at'] }}</span>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="forum-actions">
                    <button class="btn btn-outline btn-sm" onclick="viewlaporan({{ $laporan['id'] }})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        Lihat Laporan
                    </button>
                  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

<!-- New laporan Modal -->
<div class="forum-modal-overlay" id="newlaporanModal" onclick="closeNewlaporanModal(event)">
    <div class="forum-modal" onclick="event.stopPropagation()">
        <button class="bioguard-modal-close" onclick="closeNewlaporanModal()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="forum-modal-header">
            <div class="forum-modal-icon icon-green">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="10" y1="10" x2="14" y2="10"></line>
                </svg>
            </div>
            <h2 class="forum-modal-title">Buat Laporan Baru</h2>
            <p class="forum-modal-subtitle">Bagikan pengamatan atau informasi dengan komunitas BIOGUARD</p>
        </div>
        <form class="forum-modal-form" onsubmit="submitNewlaporan(event)">
            <div class="form-group">
                <label class="form-label" for="laporanTitle">Judul Laporan</label>
                <input type="text" class="form-input" id="laporanTitle" name="title" placeholder="Masukkan judul laporan..." required>
            </div>
            <div class="form-group">
                <label class="form-label" for="laporanContent">Isi Laporan</label>
                <textarea class="form-input form-textarea" id="laporanContent" name="content" placeholder="Tuliskan isi laporan Anda..." rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="laporanCategory">Kategori</label>
                <select class="form-input form-select" id="laporanCategory" name="category">
                    <option value="observasi">Observasi Spesies</option>
                    <option value="ancaman">Laporan Ancaman</option>
                    <option value="konservasi">Program Konservasi</option>
                    <option value="edukasi">Edukasi & Informasi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="forum-modal-actions">
                <button type="button" class="btn btn-outline" onclick="closeNewlaporanModal()">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open new laporan modal
    function openNewlaporanModal() {
        document.getElementById('newlaporanModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close new laporan modal
    function closeNewlaporanModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('newlaporanModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    // Submit new laporan
    function submitNewlaporan(event) {
        event.preventDefault();
        
        const title = document.getElementById('laporanTitle').value;
        const content = document.getElementById('laporanContent').value;
        const category = document.getElementById('laporanCategory').value;

        // Show success notification (demo)
        Swal.fire({
            title: 'Laporan Berhasil Dibuat!',
            html: `<p>Laporan "<strong>${title}</strong>" telah berhasil dibuat.</p>`,
            icon: 'success',
            confirmButtonColor: '#10b981',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                htmlContainer: 'premium-swal-html',
                confirmButton: 'premium-swal-confirm'
            }
        });

        closeNewlaporanModal();
        document.querySelector('.forum-modal-form').reset();
    }

    // View laporan (demo)
    function viewlaporan(id) {
        Swal.fire({
            title: 'Lihat Laporan',
            html: `<p>Membuka Laporan dengan ID: <strong>${id}</strong></p><p class="text-muted">Fitur detail Laporan akan segera tersedia.</p>`,
            icon: 'info',
            confirmButtonColor: '#10b981',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                htmlContainer: 'premium-swal-html',
                confirmButton: 'premium-swal-confirm'
            }
        });
    }


</script>
@endsection
