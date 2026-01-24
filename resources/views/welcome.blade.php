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
                  <div class="floating-icon icon-green">🌱</div>
                  <div>
                      <div style="font-weight: 600; color: #111827;">Species Tracked</div>
                      <div style="color: var(--primary-600); font-weight: 700;">5,000+</div>
                  </div>
              </div>

              <div class="floating-card floating-card-2">
                  <div class="floating-icon icon-cyan">🔍</div>
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
                  <span>✨</span>
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
                  <div class="feature-icon icon-green">🔍</div>
                  <h3 class="feature-title">BioGuard</h3>
                  <p class="feature-description">Identifikasi otomatis spesies dari foto menggunakan machine learning
                      dengan akurasi tinggi.</p>
              </div>

              <a href="{{ route('bioAi') }}" class="feature-card card-hover feature-card-clickable" id="bioaiCard" style="background: linear-gradient(135deg, #fef3c7, #ffedd5); text-decoration: none;">
                  <div class="feature-icon icon-amber">🌳</div>
                  <h3 class="feature-title">Bio-Ai</h3>
                  <p class="feature-description">Dashboard analitik real-time untuk monitoring populasi dan tren
                      biodiversitas.</p>
              </a>

              <a href="{{ route('peta') }}" class="feature-card card-hover feature-card-clickable"
                  style="background: linear-gradient(135deg, #fce7f3, #ede9fe); text-decoration: none;">
                  <div class="feature-icon icon-rose">🗺️</div>
                  <h3 class="feature-title">EcoDetect</h3>
                  <p class="feature-description">Peta interaktif dengan tracking GPS untuk visualisasi sebaran spesies
                      dan habitat.</p>
              </a>
              <div class="feature-card card-hover" id="plantIdCard" style="background: linear-gradient(135deg, #97e7b1, #ede9fe);">
                  <div class="feature-icon icon-rose">🤖</div>
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
              <div class="bioguard-modal-icon">🔍</div>
              <h2 class="bioguard-modal-title">BioGuard</h2>
              <p class="bioguard-modal-subtitle">Pilih jenis spesies yang ingin Anda identifikasi dan pantau</p>
          </div>
          <div class="bioguard-selection-grid">
              <a href="{{ route('bioguard.flora') }}" class="bioguard-selection-card flora">
                  <div class="bioguard-selection-icon">🌿</div>
                  <h3 class="bioguard-selection-title">Flora</h3>
                  <p class="bioguard-selection-desc">Identifikasi dan pantau tumbuhan, bunga, dan vegetasi langka
                      Indonesia</p>
              </a>
              <a href="{{ route('bioguard.fauna') }}" class="bioguard-selection-card fauna">
                  <div class="bioguard-selection-icon">🦋</div>
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
                  <span>📊</span>
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
                  <span>📊</span>
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
                  <div class="feature-icon icon-green">👤</div>
                  <h3 class="feature-title">Pengguna</h3>
                  <p class="feature-description">Manajemen pengguna platform termasuk profil, preferensi, dan riwayat
                      aktivitas dalam sistem BIOGUARD.</p>
              </div>

              <!-- 2. Role -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-violet">🔐</div>
                  <h3 class="feature-title">Peran</h3>
                  <p class="feature-description">Sistem peran dan hak akses untuk mengatur izin pengguna seperti Admin,
                      Researcher, dan Volunteer.</p>
              </div>

              <!-- 3. Species -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-lime">🦋</div>
                  <h3 class="feature-title">Spesies (Flora & Fauna)</h3>
                  <p class="feature-description">Database lengkap spesies flora dan fauna termasuk taksonomi, status
                      konservasi, dan karakteristik.</p>
              </div>

              <!-- 4. Observation -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-cyan">🔭</div>
                  <h3 class="feature-title">Observasi</h3>
                  <p class="feature-description">Pencatatan observasi lapangan dengan lokasi GPS, waktu, kondisi cuaca,
                      dan detail pengamatan.</p>
              </div>

              <!-- 5. Media -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-rose">📸</div>
                  <h3 class="feature-title">Media (Foto, Video, Audio)</h3>
                  <p class="feature-description">Penyimpanan dan pengelolaan media dokumentasi termasuk foto, video,
                      dan rekaman audio spesies.</p>
              </div>

              <!-- 6. Habitat -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-green">🌳</div>
                  <h3 class="feature-title">Habitat</h3>
                  <p class="feature-description">Informasi habitat alami termasuk tipe ekosistem, kondisi lingkungan,
                      dan peta sebaran geografis.</p>
              </div>

              <!-- 7. Environmental Data -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-blue">🌡️</div>
                  <h3 class="feature-title">Data Lingkungan</h3>
                  <p class="feature-description">Data lingkungan real-time seperti suhu, kelembaban, curah hujan, dan
                      kualitas udara dari sensor IoT.</p>
              </div>

              <!-- 8. Threat / Incident -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-orange">⚠️</div>
                  <h3 class="feature-title">Ancaman</h3>
                  <p class="feature-description">Pelaporan dan pelacakan ancaman seperti kebakaran hutan, perburuan
                      liar, dan kerusakan habitat.</p>
              </div>

              <!-- 9. AI Analysis Result -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-violet">🤖</div>
                  <h3 class="feature-title">Hasil Analisis Ai</h3>
                  <p class="feature-description">Hasil analisis AI untuk identifikasi spesies, deteksi ancaman, dan
                      prediksi tren populasi.</p>
              </div>

              <!-- 10. Reforestation Program -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-lime">🌱</div>
                  <h3 class="feature-title">Program Reforestasi</h3>
                  <p class="feature-description">Program penanaman pohon dan restorasi habitat termasuk pelacakan
                      kemajuan dan pengukuran dampak.</p>
              </div>

              <!-- 11. Volunteer Activity -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-cyan">🤝</div>
                  <h3 class="feature-title">Aktivitas Relawan</h3>
                  <p class="feature-description">Manajemen kegiatan relawan termasuk pendaftaran, penjadwalan, dan
                      pencatatan kontribusi.

                  </p>
              </div>

              <!-- 12. Gamification -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-amber">🏆</div>
                  <h3 class="feature-title">gamifikasi</h3>
                  <p class="feature-description">Sistem poin, lencana, dan papan peringkat untuk meningkatkan
                      keterlibatan dan motivasi pengguna.</p>
              </div>

              <!-- 13. Region / Location -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-blue">📍</div>
                  <h3 class="feature-title">Wilayah / Lokasi</h3>
                  <p class="feature-description">Pengelolaan wilayah geografis termasuk zona konservasi, taman
                      nasional, dan area lindung.</p>
              </div>

              <!-- 14. Notification -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-rose">🔔</div>
                  <h3 class="feature-title">Notifikasi</h3>
                  <p class="feature-description">Sistem notifikasi real-time untuk peringatan ancaman, pembaruan
                      observasi, dan pengingat kegiatan.</p>
              </div>

              <!-- 15. Report / Citizen Report -->
              <div class="feature-card card-hover">
                  <div class="feature-icon icon-orange">📋</div>
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
                  <span>🚀</span>
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