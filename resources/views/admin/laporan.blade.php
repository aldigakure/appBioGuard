@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/laporan.css') }}">
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
    <div class="forum-modal forum-modal-lg" onclick="event.stopPropagation()">
        <button class="bioguard-modal-close" onclick="closeNewlaporanModal()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="laporan-details">
            <div class="forum-modal-header" style="text-align: center; margin-bottom: 1.5rem;">
                <div class="forum-modal-icon icon-green" style="margin: 0 auto 1rem;">
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
                    <label class="form-label" for="laporanAnimalNameInput">Nama Hewan/Spesies</label>
                    <input type="text" class="form-input" id="laporanAnimalNameInput" name="animal_name" placeholder="Contoh: Harimau Sumatera (Panthera tigris sumatrae)">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="laporanTimeInput">Waktu Pengamatan</label>
                        <input type="time" class="form-input" id="laporanTimeInput" name="time">
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
                </div>
                <div class="form-group">
                    <label class="form-label" for="laporanLocationInput">Lokasi</label>
                    <input type="text" class="form-input" id="laporanLocationInput" name="location" placeholder="Contoh: Taman Nasional Gunung Leuser, Aceh">
                </div>
                <div class="form-group">
                    <label class="form-label" for="laporanCoordinatesInput">Koordinat</label>
                    <input type="text" class="form-input" id="laporanCoordinatesInput" name="coordinates" placeholder="Contoh: 3.7833° N, 97.3167° E">
                </div>
                <div class="form-group">
                    <label class="form-label" for="laporanImageInput">URL Gambar</label>
                    <input type="url" class="form-input" id="laporanImageInput" name="image" placeholder="https://example.com/gambar.jpg">
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
</div>

<!-- View Laporan Modal -->
<div class="forum-modal-overlay" id="viewLaporanModal" onclick="closeViewLaporanModal(event)">
    <div class="forum-modal forum-modal-lg" onclick="event.stopPropagation()">
        <button class="bioguard-modal-close" onclick="closeViewLaporanModal()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="view-laporan-content">
            <!-- Image Section -->
            <div class="laporan-image-container">
                <img id="laporanImage" src="" alt="Gambar Laporan" class="laporan-detail-image">
            </div>
            
            <!-- Details Section -->
            <div class="laporan-details">
                <h2 class="laporan-detail-title" id="laporanDetailTitle"></h2>
                
                <div class="laporan-info-grid">
                    <!-- Nama Hewan -->
                    <div class="laporan-info-item">
                        <div class="laporan-info-icon icon-green">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2c3.31 0 6 2.69 6 6 0 2.97-2.16 5.44-5 5.92V16h2v2h-2v2h-2v-2H9v-2h2v-2.08c-2.84-.48-5-2.95-5-5.92 0-3.31 2.69-6 6-6z"></path>
                            </svg>
                        </div>
                        <div class="laporan-info-content">
                            <span class="laporan-info-label">Nama Hewan/Spesies</span>
                            <span class="laporan-info-value" id="laporanAnimalName"></span>
                        </div>
                    </div>

                    <!-- Jam -->
                    <div class="laporan-info-item">
                        <div class="laporan-info-icon icon-cyan">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="laporan-info-content">
                            <span class="laporan-info-label">Waktu Pengamatan</span>
                            <span class="laporan-info-value" id="laporanTime"></span>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="laporan-info-item">
                        <div class="laporan-info-icon icon-amber">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="laporan-info-content">
                            <span class="laporan-info-label">Lokasi</span>
                            <span class="laporan-info-value" id="laporanLocation"></span>
                        </div>
                    </div>

                    <!-- Koordinat -->
                    <div class="laporan-info-item">
                        <div class="laporan-info-icon icon-violet">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <div class="laporan-info-content">
                            <span class="laporan-info-label">Koordinat</span>
                            <span class="laporan-info-value" id="laporanCoordinates"></span>
                        </div>
                    </div>
                </div>

                <!-- Author Info -->
                <div class="laporan-author-section">
                    <div class="laporan-author-info">
                        <img id="laporanAuthorAvatar" src="" alt="Author" class="laporan-author-avatar">
                        <div>
                            <span class="laporan-author-name" id="laporanAuthorName"></span>
                            <span class="laporan-author-time" id="laporanCreatedAt"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Laporan data from server
    const laporansData = @json($laporans);

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

    // View laporan
    function viewlaporan(id) {
        const laporan = laporansData.find(l => l.id === id);
        
        if (laporan) {
            // Populate modal with data
            document.getElementById('laporanImage').src = laporan.image || 'https://via.placeholder.com/600x300?text=No+Image';
            document.getElementById('laporanDetailTitle').textContent = laporan.title;
            document.getElementById('laporanAnimalName').textContent = laporan.animal_name || '-';
            document.getElementById('laporanTime').textContent = laporan.time || '-';
            document.getElementById('laporanLocation').textContent = laporan.location || '-';
            document.getElementById('laporanCoordinates').textContent = laporan.coordinates || '-';
            document.getElementById('laporanAuthorName').textContent = laporan.author;
            document.getElementById('laporanCreatedAt').textContent = laporan.created_at;
            document.getElementById('laporanAuthorAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(laporan.author)}&background=10b981&color=fff&size=40`;
            
            // Show modal
            document.getElementById('viewLaporanModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    // Close view laporan modal
    function closeViewLaporanModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('viewLaporanModal').classList.remove('active');
        document.body.style.overflow = '';
    }
</script>
@endsection

