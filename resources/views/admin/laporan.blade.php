@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/laporan-warga.css') }}">

@endsection

@section('content')
@include('layouts.navbar-dashboard')


<div class="admin-container">
    <div class="page-header mt-5">
        <h1 class="page-title">Manajemen Laporan</h1>
        <p class="page-subtitle">
            Halaman pemantauan laporan dari warga dan jagawana. 
            Pastikan setiap laporan ditindaklanjuti untuk menjaga kelestarian ekosistem.
        </p>
        <div class="mt-4">
            <button class="btn-create-report" onclick="openNewlaporanModal()" style="border: none; cursor: pointer;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Buat Laporan Baru
            </button>
        </div>
    </div>

    @forelse($laporans as $laporan)
    <div class="report-card admin-layout">
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
                    <span>👤</span> {{ $laporan['author'] ?? 'Anonim' }}
                </div>
                <div class="meta-item">
                    <span>📍</span> {{ $laporan['location'] }}
                </div>
            </div>
            @if(isset($laporan['description']))
            <p class="report-desc">
                {{ $laporan['description'] }}
            </p>
            @endif
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📝</div>
        <h3>Belum Ada Laporan</h3>
        <p style="color: #6b7280;">Tidak ada laporan yang tersimpan dalam sistem.</p>
    </div>
    @endforelse
</div>

<!-- New laporan Modal (Admin) -->
<div class="modal fade" id="newlaporanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
            <div class="modal-header" style="border-bottom: 1px solid #f3f4f6; padding: 1.5rem 2rem;">
                <h5 class="modal-title" style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #064e3b;">Buat Laporan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <form id="adminReportForm">
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Judul Laporan</label>
                        <input type="text" class="form-control" name="title" placeholder="Contoh: Penemuan Spesies Baru" required style="border-radius: 10px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Lokasi</label>
                        <input type="text" class="form-control" name="location" placeholder="Masukkan lokasi kejadian" required style="border-radius: 10px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="4" placeholder="Detail laporan..." required style="border-radius: 10px;"></textarea>
                    </div>
                    <button type="submit" class="btn-create-report w-100" style="border: none; margin-top: 1rem; justify-content: center;">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function openNewlaporanModal() {
        var myModal = new bootstrap.Modal(document.getElementById('newlaporanModal'));
        myModal.show();
    }

    document.getElementById('adminReportForm').addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Berhasil!',
            text: 'Laporan administrator telah berhasil disimpan.',
            icon: 'success',
            confirmButtonColor: '#10b981'
        }).then(() => {
            location.reload();
        });
    });
</script>
@endsection

