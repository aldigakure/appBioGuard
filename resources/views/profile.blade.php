@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/observasi.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush

@php
    $userName = Auth::user()->name ?? session('admin_user.name') ?? 'User';
    $userEmail = Auth::user()->email ?? session('admin_user.email') ?? 'user@bioguard.id';
    $userAvatar = session('admin_user.avatar') ?? null;
@endphp

@section('content')
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-cover"></div>
            <div class="profile-info">
                <div class="profile-avatar">
                    @if($userAvatar)
                        <img src="{{ asset('storage/' . $userAvatar) }}" alt="Avatar" id="profileAvatarImg">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=10b981&color=fff&size=120" alt="Avatar" id="profileAvatarImg">
                    @endif
                   
                </div>
                <div class="profile-details">
                    <h1 class="profile-name">{{ $userName }}</h1>
                    <p class="profile-email">{{ $userEmail }}</p>
                    <div class="profile-badges">
                        <span class="badge badge-volunteer">🌿 Volunteer</span>
                        <span class="badge badge-verified">✓ Terverifikasi</span>
                    </div>
                </div>
                <button class="btn btn-primary" id="editProfileBtn">Edit Profil</button>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="profile-stats">
            <div class="profile-stat-card">
                <div class="stat-number">127</div>
                <div class="stat-desc">Total Observasi</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">89</div>
                <div class="stat-desc">Terverifikasi</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">45</div>
                <div class="stat-desc">Spesies Unik</div>
            </div>
            <div class="profile-stat-card">
                <div class="stat-number">2,450</div>
                <div class="stat-desc">Poin Gamifikasi</div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="profile-content-grid">
            <!-- Left Column -->
            <div class="profile-left">
                <!-- About Section -->
                <div class="profile-card">
                    <h3 class="card-title">📋 Tentang Saya</h3>
                    <p class="profile-bio">Pecinta alam dan relawan konservasi aktif. Bergabung dengan BIOGUARD untuk berkontribusi dalam pelestarian biodiversitas Indonesia.</p>
                    <div class="profile-info-list">
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Jakarta, Indonesia</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>Bergabung Jan 2024</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72"></path>
                            </svg>
                            <span>+62 812-XXXX-XXXX</span>
                        </div>
                    </div>
                </div>

                <!-- Achievements -->
                <div class="profile-card">
                    <h3 class="card-title">🏆 Pencapaian</h3>
                    <div class="achievements-grid">
                        <div class="achievement-item">
                            <div class="achievement-icon">🌟</div>
                            <span>First Observer</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">🦋</div>
                            <span>Species Hunter</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">📸</div>
                            <span>Photo Expert</span>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">🌍</div>
                            <span>Explorer</span>
                        </div>
                        <div class="achievement-item locked">
                            <div class="achievement-icon">🔒</div>
                            <span>Master</span>
                        </div>
                        <div class="achievement-item locked">
                            <div class="achievement-icon">🔒</div>
                            <span>Legend</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="profile-right">
                <!-- Recent Activity -->
                <div class="profile-card">
                    <h3 class="card-title">📊 Aktivitas Terbaru</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon icon-green">🦧</div>
                            <div class="activity-content">
                                <span class="activity-title">Mengamati Orangutan Kalimantan</span>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-cyan">📸</div>
                            <div class="activity-content">
                                <span class="activity-title">Mengunggah 5 foto Harimau Sumatera</span>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-amber">🏆</div>
                            <div class="activity-content">
                                <span class="activity-title">Memperoleh badge "Photo Expert"</span>
                                <span class="activity-time">3 hari yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon icon-violet">🌱</div>
                            <div class="activity-content">
                                <span class="activity-title">Ikut Program Reboisasi Kalimantan</span>
                                <span class="activity-time">1 minggu yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Observations -->
                <div class="profile-card">
                    <div class="card-header-flex">
                        <h3 class="card-title">🔭 Observasi Saya</h3>
                        <a href="{{ route('observasi') }}" class="see-all-link">Lihat Semua →</a>
                    </div>
                    <div class="mini-observations">
                        @foreach([
                            ['icon' => '🦧', 'name' => 'Orangutan Kalimantan', 'status' => 'verified'],
                            ['icon' => '🐅', 'name' => 'Harimau Sumatera', 'status' => 'pending'],
                            ['icon' => '🦜', 'name' => 'Kakatua Raja', 'status' => 'verified']
                        ] as $obs)
                        <div class="mini-obs-item">
                            <div class="mini-obs-icon">{{ $obs['icon'] }}</div>
                            <span class="mini-obs-name">{{ $obs['name'] }}</span>
                            <span class="status-badge status-{{ $obs['status'] }}">{{ $obs['status'] == 'verified' ? 'Verified' : 'Pending' }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Edit Profile Modal -->
<div class="modal-overlay" id="editProfileModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">✏️ Edit Profil</h2>
            <button type="button" class="modal-close" id="closeEditModal">&times;</button>
        </div>
        <form action="{{ route('profile.update') }}" method="POST" id="editProfileForm" enctype="multipart/form-data">
            @csrf
            <!-- Avatar Upload -->
            <div class="form-group">
                <label class="form-label">Foto Profil</label>
                <div class="avatar-upload-wrapper">
                    <div class="avatar-preview">
                        @if($userAvatar)
                            <img src="{{ asset('storage/' . $userAvatar) }}" alt="Preview" id="avatarPreview">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=10b981&color=fff&size=100" alt="Preview" id="avatarPreview">
                        @endif
                    </div>
                    <div class="avatar-upload-btn">
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" hidden>
                        <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('avatarInput').click()">
                            📷 Pilih Foto
                        </button>
                        <span class="avatar-hint">JPG, PNG max 2MB</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-input" id="inputName" value="{{ $userName }}">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" id="inputEmail" value="{{ $userEmail }}">
            </div>
            <div class="form-group">
                <label class="form-label">Telepon</label>
                <input type="tel" name="phone" class="form-input" placeholder="+62 812-XXXX-XXXX">
            </div>
            <div class="form-group">
                <label class="form-label">Lokasi</label>
                <input type="text" name="location" class="form-input" placeholder="Jakarta, Indonesia">
            </div>
            <div class="form-group">
                <label class="form-label">Bio</label>
                <textarea name="bio" class="form-textarea" placeholder="Ceritakan tentang diri Anda..."></textarea>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" id="cancelEditBtn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Batal
                </button>
                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert-toast" id="successToast">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    {{ session('success') }}
</div>
@endif

<script>
    const modal = document.getElementById('editProfileModal');
    document.getElementById('editProfileBtn').addEventListener('click', () => modal.classList.add('active'));
    document.getElementById('closeEditModal').addEventListener('click', () => modal.classList.remove('active'));
    document.getElementById('cancelEditBtn').addEventListener('click', () => modal.classList.remove('active'));
    modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.remove('active'); });

    // Auto-hide success toast
    const toast = document.getElementById('successToast');
    if (toast) {
        setTimeout(() => toast.classList.add('hide'), 3000);
    }

    // Avatar preview
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection


