@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/observasi.css') }}">
@endpush

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
                    <a href="{{ route('observasi') }}" class="breadcrumb-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="4"></circle>
                            <line x1="21.17" y1="8" x2="12" y2="8"></line>
                            <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                            <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                        </svg>
                        Observasi
                    </a>
                </li>
                <li class="breadcrumb-separator">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="breadcrumb-current">Tambah Observasi</span>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="create-page-header">
            <div class="create-header-content">
                <h1>📝 Tambah Observasi Baru</h1>
                <p>Dokumentasikan pengamatan flora dan fauna untuk mendukung konservasi alam Indonesia</p>
            </div>
        </div>

        <!-- Create Form Card -->
        <div class="create-form-card">
            <form action="{{ route('observasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        Informasi Spesies
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label" for="species_name">Nama Spesies <span class="required">*</span></label>
                        <input type="text" class="form-input" id="species_name" name="species_name" placeholder="Contoh: Harimau Sumatera" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="latin_name">Nama Latin</label>
                        <input type="text" class="form-input" id="latin_name" name="latin_name" placeholder="Contoh: Panthera tigris sumatrae">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="category">Kategori <span class="required">*</span></label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Pilih Kategori</option>
                                <option value="mamalia">🦁 Mamalia</option>
                                <option value="burung">🦅 Burung</option>
                                <option value="reptil">🦎 Reptil</option>
                                <option value="amfibi">🐸 Amfibi</option>
                                <option value="ikan">🐟 Ikan</option>
                                <option value="flora">🌺 Flora</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="observation_date">Tanggal Observasi <span class="required">*</span></label>
                            <input type="date" class="form-input" id="observation_date" name="observation_date" required>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Lokasi Pengamatan
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label" for="location">Lokasi <span class="required">*</span></label>
                        <input type="text" class="form-input" id="location" name="location" placeholder="Contoh: TN Kerinci Seblat, Jambi" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="latitude">Latitude</label>
                            <input type="text" class="form-input" id="latitude" name="latitude" placeholder="-6.2088">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="longitude">Longitude</label>
                            <input type="text" class="form-input" id="longitude" name="longitude" placeholder="106.8456">
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
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                        Detail Observasi
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label" for="description">Deskripsi Pengamatan</label>
                        <textarea class="form-textarea" id="description" name="description" rows="4" placeholder="Jelaskan kondisi pengamatan, perilaku hewan/tumbuhan, jumlah individu, dan informasi relevan lainnya..."></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="population_count">Jumlah Individu</label>
                            <input type="number" class="form-input" id="population_count" name="population_count" min="1" placeholder="1">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="weather">Kondisi Cuaca</label>
                            <select class="form-select" id="weather" name="weather">
                                <option value="">Pilih Kondisi</option>
                                <option value="cerah">☀️ Cerah</option>
                                <option value="berawan">⛅ Berawan</option>
                                <option value="hujan_ringan">🌦️ Hujan Ringan</option>
                                <option value="hujan_lebat">🌧️ Hujan Lebat</option>
                                <option value="berkabut">🌫️ Berkabut</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        Dokumentasi Foto
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label">Upload Foto</label>
                        <div class="upload-area" id="uploadArea">
                            <div class="upload-icon">📷</div>
                            <p class="upload-text">Klik atau drag & drop foto di sini</p>
                            <p class="upload-hint">Format: JPG, PNG, WEBP (Maks. 5MB)</p>
                            <input type="file" class="upload-input" id="photo" name="photo" accept="image/*" hidden>
                        </div>
                        <div class="preview-container" id="previewContainer" style="display: none;">
                            <img id="imagePreview" src="" alt="Preview">
                            <button type="button" class="remove-preview" id="removePreview">×</button>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('observasi') }}" class="btn-cancel">
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
                        Simpan Observasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    // Set default date to today
    document.getElementById('observation_date').valueAsDate = new Date();
    
    // Upload area functionality
    const uploadArea = document.getElementById('uploadArea');
    const photoInput = document.getElementById('photo');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const removePreview = document.getElementById('removePreview');

    uploadArea.addEventListener('click', () => photoInput.click());
    
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
    });
    
    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('drag-over');
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            photoInput.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });
    
    photoInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
            showPreview(e.target.files[0]);
        }
    });
    
    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            uploadArea.style.display = 'none';
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
    
    removePreview.addEventListener('click', () => {
        photoInput.value = '';
        imagePreview.src = '';
        previewContainer.style.display = 'none';
        uploadArea.style.display = 'flex';
    });
</script>
@endsection
