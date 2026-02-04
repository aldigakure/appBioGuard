  @extends('layouts.app')

  @section('content')
  @include('layouts.navbar-landing')
  <!-- Hero Section -->
  <section class="hero bg-mesh p-0" id="home" style="padding-top:8rem !important">
      <div class="hero-container  ">
          <div class="hero-content px-4 pb-4">

              <h1 class="hero-title">
                  Lindungi <span class="text-gradient">Keanekaragaman Hayati</span> Indonesia
              </h1>
              <p class="hero-description">
                  Platform pemantauan dan perlindungan biodiversitas berbasis AI untuk konservasi alam Indonesia. Pantau
                  spesies, laporkan ancaman, dan bergabung dalam program reboisasi.
              </p>
              <div class="hero-buttons">
                  <a href="#features" class="btn btn-primary btn-large">
                      Mulai Sekarang
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2">
                          <path d="M5 12h14M12 5l7 7-7 7" />
                      </svg>
                  </a>
                  <a href="#about" class="btn btn-outline btn-large">
                      Pelajari Lebih Lanjut
                  </a>
              </div>
          </div>

          <div class="hero-visual ">
              <div class="hero-blob"></div>
              <img src="{{ asset('assets/images/dinacommaskot.webp') }}" alt="maskot">
              <div class="floating-card floating-card-1">
                  <div class="floating-icon icon-green"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg></div>
                  <div>
                      <div style="font-weight: 600; color: #111827;">Species Tracked</div>
                      <div style="color: var(--primary-600); font-weight: 700;">5,000+</div>
                  </div>
              </div>

              <div class="floating-card floating-card-2">
                  <div class="floating-icon icon-cyan"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></div>
                  <div>
                      <div style="font-weight: 600; color: #111827;">AI Analysis</div>
                      <div style="color: var(--accent-600); font-weight: 700;">Real-time</div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Features Section -->
  <section class="section" id="features">
      <div class="section-container">
          <div class="section-header">
              <div class="section-badge">
                  <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></span>
                  <span>Fitur Unggulan</span>
              </div>
              <h2 class="section-title">Teknologi Canggih untuk Konservasi</h2>
              <p class="section-description">
                  Memanfaatkan AI dan teknologi terkini untuk pemantauan biodiversitas yang lebih efektif dan efisien.
              </p>
          </div>

          <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
              <div class="feature-card card-hover feature-card-clickable" id="bioguardCard"
                  onclick="openBioGuardModal()" style="background: linear-gradient(135deg, #f0fdf4, #ecfeff);">
                  <div class="feature-icon icon-green"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></div>
                  <h3 class="feature-title">BioGuard</h3>
                  <p class="feature-description">Identifikasi otomatis spesies dari foto menggunakan machine learning
                      dengan akurasi tinggi.</p>
              </div>

              <a href="{{ route('bioAi') }}" class="feature-card card-hover feature-card-clickable" id="bioaiCard" style="background: linear-gradient(135deg, #fef3c7, #ffedd5); text-decoration: none;">
                  <div class="feature-icon icon-amber"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 10.5V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v5.5"/><path d="M12 2v3"/><path d="M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"/><path d="M12 22c-4.97 0-9-4.03-9-9 0-3.21 1.68-6.03 4.22-7.64"/><path d="M12 22c4.97 0 9-4.03 9-9 0-3.21-1.68-6.03-4.22-7.64"/></svg></div>
                  <h3 class="feature-title">Bio-Ai</h3>
                  <p class="feature-description">Dashboard analitik real-time untuk monitoring populasi dan tren
                      biodiversitas.</p>
              </a>

              <a href="{{ route('peta') }}" class="feature-card card-hover feature-card-clickable"
                  style="background: linear-gradient(135deg, #fce7f3, #ede9fe); text-decoration: none;">
                  <div class="feature-icon icon-rose"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg></div>
                  <h3 class="feature-title">EcoDetect</h3>
                  <p class="feature-description">Peta interaktif dengan tracking GPS untuk visualisasi sebaran spesies
                      dan habitat.</p>
              </a>
              <div class="feature-card card-hover" id="plantIdCard" style="background: linear-gradient(135deg, #97e7b1, #ede9fe);">
                  <div class="feature-icon icon-rose"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg></div>
                  <h3 class="feature-title">PlantId</h3>
                  <p class="feature-description">Peta interaktif dengan tracking GPS untuk visualisasi sebaran
                      spesiesIdentifikasi spesies dari foto pengguna, tampilkan status konservasi, dan dorong
                      partisipasi warga.

                  </p>
              </div>

          </div>
  </section>

  <!-- BioGuard Modal -->
  <div class="bioguard-modal-overlay" id="bioguardModal">
      <div class="bioguard-modal">
          <button class="bioguard-modal-close" onclick="closeBioGuardModal()">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
          </button>
          <div class="bioguard-modal-header">
              <div class="bioguard-modal-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></div>
              <h2 class="bioguard-modal-title">BioGuard</h2>
              <p class="bioguard-modal-subtitle">Pilih jenis spesies yang ingin Anda identifikasi dan pantau</p>
          </div>
          <div class="bioguard-selection-grid">
              <a href="{{ route('bioguard.flora') }}" class="bioguard-selection-card flora">
                  <div class="bioguard-selection-icon"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></div>
                  <h3 class="bioguard-selection-title">Flora</h3>
                  <p class="bioguard-selection-desc">Identifikasi dan pantau tumbuhan, bunga, dan vegetasi langka
                      Indonesia</p>
              </a>
              <a href="{{ route('bioguard.fauna') }}" class="bioguard-selection-card fauna">
                  <div class="bioguard-selection-icon"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 21h8"/><path d="M12 17a5 5 0 0 0 5-5c0-4-5-9-5-9s-5 5-5 9a5 5 0 0 0 5 5Z"/><path d="m9.5 14.5 5-5"/></svg></div>
                  <h3 class="bioguard-selection-title">Fauna</h3>
                  <p class="bioguard-selection-desc">Identifikasi dan pantau hewan, satwa liar, dan spesies terancam
                      punah</p>
              </a>
          </div>
      </div>
  </div>

  <script>
      function openBioGuardModal() {
          const modal = document.getElementById('bioguardModal');
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
      }

      function closeBioGuardModal() {
          const modal = document.getElementById('bioguardModal');
          modal.classList.remove('active');
          document.body.style.overflow = '';
      }

      function showDemoNotification() {
          Swal.fire({
              title: 'Notifikasi',
              text: 'Anda memiliki 5 pemberitahuan baru terkait biodiversitas!',
              icon: 'info',
              confirmButtonColor: '#10b981',
              confirmButtonText: 'Oke, Mengerti'
          });
      }

      // Close modal when clicking outside
      document.getElementById('bioguardModal').addEventListener('click', function(e) {
          if (e.target === this) {
              closeBioGuardModal();
          }
      });

      // Close modal with Escape key
      document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
              closeBioGuardModal();
          }
      });
  </script>

  <!-- Stats Section -->
  <section class="section stats-section" id="stats">
      <div class="section-container">
          <div class="section-header">
              <div class="section-badge">
                  <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg></span>
                  <span>Data Terkini</span>
              </div>
              <h2 class="section-title">Statistik</h2>
              <p class="section-description">
                  BioGuard mengubah observasi menjadi wawasan untuk melindungi biodiversitas secara berkelanjutan.
              </p>
          </div>

          <div class="stats-grid">
              <div class="stat-item">
                  <div class="stat-number">5,000+</div>
                  <div class="stat-label">Spesies Terdaftar</div>
              </div>
              <div class="stat-item">
                  <div class="stat-number">50K+</div>
                  <div class="stat-label">Observasi</div>
              </div>
              <div class="stat-item">
                  <div class="stat-number">1,200+</div>
                  <div class="stat-label">Relawan Aktif</div>
              </div>
              <div class="stat-item">
                  <div class="stat-number">100K+</div>
                  <div class="stat-label">Pohon Ditanam</div>
              </div>
          </div>
      </div>
  </section>
  <!-- Entities Section -->
  <section class="section" id="entities">
      <div class="section-container">
          <div class="section-header">
              <div class="section-badge">
                  <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg></span>
                  <span>Entitas Sistem</span>
              </div>
              <h2 class="section-title">Platform Utama</h2>
              <p class="section-description">
                  BIOGUARD mengelola 15 entitas utama yang saling terintegrasi untuk pemantauan dan perlindungan
                  keanekaragaman hayati secara komprehensif.
              </p>
          </div>

          <div class="features-grid">
              <!-- 1. User -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-green"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                  <h3 class="feature-title">Pengguna</h3>
                  <p class="feature-description">Manajemen pengguna platform termasuk profil, preferensi, dan riwayat
                      aktivitas dalam sistem BIOGUARD.</p>
              </div>

              <!-- 2. Role -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-violet"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
                  <h3 class="feature-title">Peran</h3>
                  <p class="feature-description">Sistem peran dan hak akses untuk mengatur izin pengguna seperti Admin,
                      Researcher, dan Volunteer.</p>
              </div>

              <!-- 3. Species -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-lime"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 21h8"/><path d="M12 17a5 5 0 0 0 5-5c0-4-5-9-5-9s-5 5-5 9a5 5 0 0 0 5 5Z"/><path d="m9.5 14.5 5-5"/></svg></div>
                  <h3 class="feature-title">Spesies (Flora & Fauna)</h3>
                  <p class="feature-description">Database lengkap spesies flora dan fauna termasuk taksonomi, status
                      konservasi, dan karakteristik.</p>
              </div>

              <!-- 4. Observation -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-cyan"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg></div>
                  <h3 class="feature-title">Observasi</h3>
                  <p class="feature-description">Pencatatan observasi lapangan dengan lokasi GPS, waktu, kondisi cuaca,
                      dan detail pengamatan.</p>
              </div>

              <!-- 5. Media -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-rose"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg></div>
                  <h3 class="feature-title">Media (Foto, Video, Audio)</h3>
                  <p class="feature-description">Penyimpanan dan pengelolaan media dokumentasi termasuk foto, video,
                      dan rekaman audio spesies.</p>
              </div>

              <!-- 6. Habitat -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-green"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 10.5V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v5.5"/><path d="M12 2v3"/><path d="M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"/><path d="M12 22c-4.97 0-9-4.03-9-9 0-3.21 1.68-6.03 4.22-7.64"/><path d="M12 22c4.97 0 9-4.03 9-9 0-3.21-1.68-6.03-4.22-7.64"/></svg></div>
                  <h3 class="feature-title">Habitat</h3>
                  <p class="feature-description">Informasi habitat alami termasuk tipe ekosistem, kondisi lingkungan,
                      dan peta sebaran geografis.</p>
              </div>

              <!-- 7. Environmental Data -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-blue"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"/></svg></div>
                  <h3 class="feature-title">Data Lingkungan</h3>
                  <p class="feature-description">Data lingkungan real-time seperti suhu, kelembaban, curah hujan, dan
                      kualitas udara dari sensor IoT.</p>
              </div>

              <!-- 8. Threat / Incident -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-orange"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
                  <h3 class="feature-title">Ancaman</h3>
                  <p class="feature-description">Pelaporan dan pelacakan ancaman seperti kebakaran hutan, perburuan
                      liar, dan kerusakan habitat.</p>
              </div>

              <!-- 9. AI Analysis Result -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-violet"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg></div>
                  <h3 class="feature-title">Hasil Analisis Ai</h3>
                  <p class="feature-description">Hasil analisis AI untuk identifikasi spesies, deteksi ancaman, dan
                      prediksi tren populasi.</p>
              </div>

              <!-- 10. Reforestation Program -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-lime"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg></div>
                  <h3 class="feature-title">Program Reforestasi</h3>
                  <p class="feature-description">Program penanaman pohon dan restorasi habitat termasuk pelacakan
                      kemajuan dan pengukuran dampak.</p>
              </div>

              <!-- 11. Volunteer Activity -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-cyan"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 17a1 1 0 0 1 2 0c0 .5-.34 3-.5 4.5a.5.5 0 0 1-1 0c-.16-1.5-.5-4-.5-4.5Z"/><path d="M8 14a5 5 0 1 1 8 0"/><path d="M17 18.5a9 9 0 1 0-10 0"/></svg></div>
                  <h3 class="feature-title">Aktivitas Relawan</h3>
                  <p class="feature-description">Manajemen kegiatan relawan termasuk pendaftaran, penjadwalan, dan
                      pencatatan kontribusi.

                  </p>
              </div>

              <!-- 12. Gamification -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-amber"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg></div>
                  <h3 class="feature-title">gamifikasi</h3>
                  <p class="feature-description">Sistem poin, lencana, dan papan peringkat untuk meningkatkan
                      keterlibatan dan motivasi pengguna.</p>
              </div>

              <!-- 13. Region / Location -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-blue"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></div>
                  <h3 class="feature-title">Wilayah / Lokasi</h3>
                  <p class="feature-description">Pengelolaan wilayah geografis termasuk zona konservasi, taman
                      nasional, dan area lindung.</p>
              </div>

              <!-- 14. Notification -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-rose"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg></div>
                  <h3 class="feature-title">Notifikasi</h3>
                  <p class="feature-description">Sistem notifikasi real-time untuk peringatan ancaman, pembaruan
                      observasi, dan pengingat kegiatan.</p>
              </div>

              <!-- 15. Report / Citizen Report -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-orange"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg></div>
                  <h3 class="feature-title">Laporan / Laporan Warga</h3>
                  <p class="feature-description">Laporan warga dan citizen science untuk melaporkan temuan, pengamatan,
                      dan insiden lingkungan.# Modul dan Fitur BIOGUARD</p>
              </div>
          </div>
      </div>
  </section>



  <!-- CTA Section -->
  <section class="section cta-section " id="about">
      <div class="section-container">
          <div class="cta-container">
              <div class="section-badge">
                  <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></span>
                  <span>Gabung Sekarang</span>
              </div>
              <h2 class="cta-title">Mulai Berkontribusi untuk Konservasi</h2>
              <p class="cta-description">
                  Jadilah bagian dari gerakan perlindungan keanekaragaman hayati Indonesia. Daftar sekarang dan mulai
                  berkontribusi!
              </p>
              <div class="cta-buttons">
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="btn btn-primary btn-large">
                      Daftar Sekarang
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2">
                          <path d="M5 12h14M12 5l7 7-7 7" />
                      </svg>
                  </a>
                  @endif
                  <a href="#entities" class="btn btn-outline btn-large">
                      Lihat Fitur
                  </a>
              </div>
          </div>
      </div>
  </section>
  @endsection