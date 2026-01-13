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
    $userPhone = session('admin_user.phone') ?? '';
    $userLocation = session('admin_user.location') ?? '';
    $userBio = session('admin_user.bio') ?? '';
    $userExpertise = session('admin_user.expertise') ?? '';
    $userOrganization = session('admin_user.organization') ?? '';
@endphp

@section('content')
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-separator">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('profile') }}" class="breadcrumb-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profil
                    </a>
                </li>
                <li class="breadcrumb-separator">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="breadcrumb-current">Edit Profil</span>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="create-page-header">
            <div class="create-header-content">
                <h1>✏️ Edit Profil</h1>
                <p>Perbarui informasi profil Anda untuk menjaga data tetap akurat</p>
            </div>
        </div>

        <!-- Edit Form Card -->
        <div class="create-form-card">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        Foto Profil
                    </h3>
                    
                    <div class="avatar-upload-section">
                        <div class="avatar-preview-large">
                            @if($userAvatar)
                                <img src="{{ asset('storage/' . $userAvatar) }}" alt="Preview" id="avatarPreview">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=10b981&color=fff&size=120" alt="Preview" id="avatarPreview">
                            @endif
                        </div>
                        <div class="avatar-upload-controls">
                            <input type="file" name="avatar" id="avatarInput" accept="image/*" hidden>
                            <button type="button" class="btn btn-outline" onclick="document.getElementById('avatarInput').click()">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                Pilih Foto
                            </button>
                            <p class="upload-hint">JPG, PNG max 2MB</p>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Informasi Dasar
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label" for="name">Nama Lengkap <span class="required">*</span></label>
                        <input type="text" class="form-input" id="name" name="name" value="{{ $userName }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="email">Email <span class="required">*</span></label>
                        <input type="email" class="form-input" id="email" name="email" value="{{ $userEmail }}" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="phone">Telepon</label>
                            <input type="tel" class="form-input" id="phone" name="phone" placeholder="+62 812-XXXX-XXXX" value="{{ $userPhone }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="location">Lokasi</label>
                            <input type="text" class="form-input" id="location" name="location" placeholder="Jakarta, Indonesia" value="{{ $userLocation }}">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                        </svg>
                        Informasi Tambahan
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label" for="bio">Bio</label>
                        <textarea class="form-textarea" id="bio" name="bio" rows="4" placeholder="Ceritakan tentang diri Anda, minat dalam konservasi, dan pengalaman Anda...">{{ $userBio }}</textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="organization">Organisasi/Institusi</label>
                            <input type="text" class="form-input" id="organization" name="organization" placeholder="Nama organisasi atau institusi" value="{{ $userOrganization }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="expertise">Keahlian</label>
                            <select class="form-select" id="expertise" name="expertise">
                                <option value="">Pilih Keahlian</option>
                                <option value="researcher" {{ $userExpertise == 'researcher' ? 'selected' : '' }}>🔬 Peneliti</option>
                                <option value="volunteer" {{ $userExpertise == 'volunteer' ? 'selected' : '' }}>🌿 Volunteer</option>
                                <option value="photographer" {{ $userExpertise == 'photographer' ? 'selected' : '' }}>📸 Fotografer</option>
                                <option value="botanist" {{ $userExpertise == 'botanist' ? 'selected' : '' }}>🌺 Botanis</option>
                                <option value="zoologist" {{ $userExpertise == 'zoologist' ? 'selected' : '' }}>🦁 Zoologist</option>
                                <option value="ranger" {{ $userExpertise == 'ranger' ? 'selected' : '' }}>🏕️ Ranger</option>
                                <option value="other" {{ $userExpertise == 'other' ? 'selected' : '' }}>✨ Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('profile') }}" class="btn-cancel">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
</main>

<script>
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
