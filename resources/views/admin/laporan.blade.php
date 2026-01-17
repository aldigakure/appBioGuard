@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endpush

@section('content')
@include('layouts.navbar-dashboard')

<!-- Forum Discussion Content -->
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <!-- Page Title Section -->
        <div class="dashboard-title-section">
            <div>
                <h1 class="dashboard-title">Forum Diskusi</h1>
                <p class="dashboard-subtitle">Ruang diskusi untuk berbagi pengamatan dan informasi biodiversitas</p>
            </div>
            <button class="btn btn-primary" onclick="openNewDiscussionModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Buat Diskusi Baru
            </button>
        </div>

        <!-- Forum Discussion Cards -->
        <div class="forum-section">
            @foreach($discussions as $discussion)
            <div class="forum-card card-hover">
                <div class="forum-card-header">
                    <div class="forum-icon icon-green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="forum-content">
                        <h3 class="forum-title">{{ $discussion['title'] }}</h3>
                        <div class="forum-meta">
                            <div class="forum-author">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($discussion['author']) }}&background=10b981&color=fff&size=24" alt="{{ $discussion['author'] }}">
                                <span>{{ $discussion['author'] }}</span>
                            </div>
                            <span class="forum-separator">•</span>
                            <div class="forum-time">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>{{ $discussion['created_at'] }}</span>
                            </div>
                            <span class="forum-separator">•</span>
                            <div class="forum-comments-count">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                <span>{{ $discussion['comments_count'] }} Komentar</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forum-actions">
                    <button class="btn btn-outline btn-sm" onclick="viewDiscussion({{ $discussion['id'] }})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        Lihat Diskusi
                    </button>
                    <button class="btn btn-primary btn-sm" onclick="commentDiscussion({{ $discussion['id'] }})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Komentar
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

<!-- New Discussion Modal -->
<div class="forum-modal-overlay" id="newDiscussionModal" onclick="closeNewDiscussionModal(event)">
    <div class="forum-modal" onclick="event.stopPropagation()">
        <button class="bioguard-modal-close" onclick="closeNewDiscussionModal()">
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
            <h2 class="forum-modal-title">Buat Diskusi Baru</h2>
            <p class="forum-modal-subtitle">Bagikan pengamatan atau informasi dengan komunitas BIOGUARD</p>
        </div>
        <form class="forum-modal-form" onsubmit="submitNewDiscussion(event)">
            <div class="form-group">
                <label class="form-label" for="discussionTitle">Judul Diskusi</label>
                <input type="text" class="form-input" id="discussionTitle" name="title" placeholder="Masukkan judul diskusi..." required>
            </div>
            <div class="form-group">
                <label class="form-label" for="discussionContent">Isi Diskusi</label>
                <textarea class="form-input form-textarea" id="discussionContent" name="content" placeholder="Tuliskan isi diskusi Anda..." rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="discussionCategory">Kategori</label>
                <select class="form-input form-select" id="discussionCategory" name="category">
                    <option value="observasi">Observasi Spesies</option>
                    <option value="ancaman">Laporan Ancaman</option>
                    <option value="konservasi">Program Konservasi</option>
                    <option value="edukasi">Edukasi & Informasi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="forum-modal-actions">
                <button type="button" class="btn btn-outline" onclick="closeNewDiscussionModal()">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    Kirim Diskusi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open new discussion modal
    function openNewDiscussionModal() {
        document.getElementById('newDiscussionModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close new discussion modal
    function closeNewDiscussionModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('newDiscussionModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    // Submit new discussion
    function submitNewDiscussion(event) {
        event.preventDefault();
        
        const title = document.getElementById('discussionTitle').value;
        const content = document.getElementById('discussionContent').value;
        const category = document.getElementById('discussionCategory').value;

        // Show success notification (demo)
        Swal.fire({
            title: 'Diskusi Berhasil Dibuat!',
            html: `<p>Diskusi "<strong>${title}</strong>" telah berhasil dibuat.</p>`,
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

        closeNewDiscussionModal();
        document.querySelector('.forum-modal-form').reset();
    }

    // View discussion (demo)
    function viewDiscussion(id) {
        Swal.fire({
            title: 'Lihat Diskusi',
            html: `<p>Membuka diskusi dengan ID: <strong>${id}</strong></p><p class="text-muted">Fitur detail diskusi akan segera tersedia.</p>`,
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

    // Comment on discussion (demo)
    function commentDiscussion(id) {
        Swal.fire({
            title: 'Tambah Komentar',
            html: `<p>Menambahkan komentar pada diskusi ID: <strong>${id}</strong></p><p class="text-muted">Fitur komentar akan segera tersedia.</p>`,
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
