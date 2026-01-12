  @extends('layouts.app')

  @section('content')
      <!-- Hero Section -->
      <section class="hero bg-mesh">
          <div class="hero-container">
              <div class="hero-content">
                  <div class="hero-badge">
                      <span>🤖</span>
                      <span>Powered by Stemtarda</span>
                  </div>
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

              <div class="hero-visual">
                  <div class="hero-blob"></div>
                 <img src="{{ asset('assets/images/dinacommaskot.png') }}" alt="maskot">
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

      <!-- Entities Section -->
      <section class="section" id="entities" style="background: white;">
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
                      <h3 class="feature-title">User</h3>
                      <p class="feature-description">Manajemen pengguna platform termasuk profil, preferensi, dan riwayat
                          aktivitas dalam sistem BIOGUARD.</p>
                  </div>

                  <!-- 2. Role -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-violet">🔐</div>
                      <h3 class="feature-title">Role</h3>
                      <p class="feature-description">Sistem peran dan hak akses untuk mengatur izin pengguna seperti Admin,
                          Researcher, dan Volunteer.</p>
                  </div>

                  <!-- 3. Species -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-lime">🦋</div>
                      <h3 class="feature-title">Species (Flora & Fauna)</h3>
                      <p class="feature-description">Database lengkap spesies flora dan fauna termasuk taksonomi, status
                          konservasi, dan karakteristik.</p>
                  </div>

                  <!-- 4. Observation -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-cyan">🔭</div>
                      <h3 class="feature-title">Observation</h3>
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
                      <h3 class="feature-title">Environmental Data</h3>
                      <p class="feature-description">Data lingkungan real-time seperti suhu, kelembaban, curah hujan, dan
                          kualitas udara dari sensor IoT.</p>
                  </div>

                  <!-- 8. Threat / Incident -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-orange">⚠️</div>
                      <h3 class="feature-title">Threat / Incident</h3>
                      <p class="feature-description">Pelaporan dan tracking ancaman seperti kebakaran hutan, perburuan
                          liar, dan kerusakan habitat.</p>
                  </div>

                  <!-- 9. AI Analysis Result -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-violet">🤖</div>
                      <h3 class="feature-title">AI Analysis Result</h3>
                      <p class="feature-description">Hasil analisis AI untuk identifikasi spesies, deteksi ancaman, dan
                          prediksi tren populasi.</p>
                  </div>

                  <!-- 10. Reforestation Program -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-lime">🌱</div>
                      <h3 class="feature-title">Reforestation Program</h3>
                      <p class="feature-description">Program penanaman pohon dan restorasi habitat termasuk tracking
                          progress dan impact measurement.</p>
                  </div>

                  <!-- 11. Volunteer Activity -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-cyan">🤝</div>
                      <h3 class="feature-title">Volunteer Activity</h3>
                      <p class="feature-description">Manajemen kegiatan relawan termasuk pendaftaran, penjadwalan, dan
                          pencatatan kontribusi.</p>
                  </div>

                  <!-- 12. Gamification -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-amber">🏆</div>
                      <h3 class="feature-title">Gamification</h3>
                      <p class="feature-description">Sistem poin, badge, dan leaderboard untuk meningkatkan engagement dan
                          motivasi pengguna.</p>
                  </div>

                  <!-- 13. Region / Location -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-blue">📍</div>
                      <h3 class="feature-title">Region / Location</h3>
                      <p class="feature-description">Pengelolaan wilayah geografis termasuk zona konservasi, taman
                          nasional, dan area lindung.</p>
                  </div>

                  <!-- 14. Notification -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-rose">🔔</div>
                      <h3 class="feature-title">Notification</h3>
                      <p class="feature-description">Sistem notifikasi real-time untuk alert ancaman, update observasi, dan
                          pengingat kegiatan.</p>
                  </div>

                  <!-- 15. Report / Citizen Report -->
                  <div class="feature-card card-hover">
                      <div class="feature-icon icon-orange">📋</div>
                      <h3 class="feature-title">Report / Citizen Report</h3>
                      <p class="feature-description">Laporan warga dan citizen science untuk melaporkan temuan, sighting,
                          dan insiden lingkungan.</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- Stats Section -->
      <section class="section stats-section" id="stats">
          <div class="section-container">
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

              <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
                  <div class="feature-card card-hover" style="background: linear-gradient(135deg, #f0fdf4, #ecfeff);">
                      <div class="feature-icon icon-green">🔍</div>
                      <h3 class="feature-title">AI Species Recognition</h3>
                      <p class="feature-description">Identifikasi otomatis spesies dari foto menggunakan machine learning
                          dengan akurasi tinggi.</p>
                  </div>

                  <div class="feature-card card-hover" style="background: linear-gradient(135deg, #fef3c7, #ffedd5);">
                      <div class="feature-icon icon-amber">📊</div>
                      <h3 class="feature-title">Real-time Analytics</h3>
                      <p class="feature-description">Dashboard analitik real-time untuk monitoring populasi dan tren
                          biodiversitas.</p>
                  </div>

                  <div class="feature-card card-hover" style="background: linear-gradient(135deg, #fce7f3, #ede9fe);">
                      <div class="feature-icon icon-rose">🗺️</div>
                      <h3 class="feature-title">GIS Mapping</h3>
                      <p class="feature-description">Peta interaktif dengan tracking GPS untuk visualisasi sebaran spesies
                          dan habitat.</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- CTA Section -->
      <section class="section cta-section" id="about">
          <div class="section-container">
              <div class="cta-container">
                  <div class="section-badge">
                      <span>🚀</span>
                      <span>Bergabung Sekarang</span>
                  </div>
                  <h2 class="cta-title">Mulai Berkontribusi untuk Konservasi</h2>
                  <p class="cta-description">
                      Jadilah bagian dari gerakan perlindungan keanekaragaman hayati Indonesia. Daftar sekarang dan mulai
                      berkontribusi!
                  </p>
                  <div class="cta-buttons">
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="btn btn-primary btn-large">
                              Daftar Gratis
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
