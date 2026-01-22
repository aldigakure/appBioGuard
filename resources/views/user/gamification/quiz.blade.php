@extends('layouts.app')

@section('title', 'BioGuard Brain Match')

@section('styles')
<script src="https://cdn.tailwindcss.com"></script>
{{-- TAMBAHAN: Library SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* --- ANIMASI & EFEK VISUAL --- */
    .fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Card Pilihan Flora/Fauna */
    .category-card-modern {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .category-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .category-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .category-card-modern:hover::before {
        opacity: 1;
    }

    .category-card-modern.selected {
        border: 2px solid #10b981;
        transform: scale(1.02);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
    }

    /* Tombol Jawaban (Game Options) */
    .option-btn-modern {
        transition: all 0.2s;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border-bottom: 3px solid #e2e8f0;
        /* Efek 3D */
    }

    .option-btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border-color: #cbd5e1;
    }

    .option-btn-modern:active {
        transform: translateY(1px);
        border-bottom-width: 0px;
        margin-top: 3px;
    }

    /* Status Jawaban */
    .correct-anim {
        background: #ecfdf5 !important;
        border-color: #10b981 !important;
        color: #065f46 !important;
        border-bottom-color: #059669 !important;
    }

    .wrong-anim {
        background: #fef2f2 !important;
        border-color: #ef4444 !important;
        color: #991b1b !important;
        border-bottom-color: #b91c1c !important;
        animation: shakeRed 0.4s ease-in-out;
    }

    @keyframes shakeRed {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        75% {
            transform: translateX(5px);
        }
    }

    .bg-pattern {
        background-color: #f8fafc;
        background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
        background-size: 24px 24px;
    }

    .glass-hud {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* CUSTOM SWEETALERT STYLE */
    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        background-color: #059669 !important;
        /* Warna Emerald */
        border-radius: 12px !important;
    }

    div:where(.swal2-container) {
        z-index: 9999 !important;
    }
</style>
@endsection

@section('content')
@include('layouts.navbar-landing')

<div id="game-config"
    data-auth="{{ auth()->check() ? 'true' : 'false' }}"
    data-login="{{ route('login') }}"
    data-register="{{ route('register') }}"
    data-quiz-data="{{ route('quiz.data') }}"
    data-quiz-store="{{ route('quiz.store') }}"
    data-dashboard="{{ route('dashboard') }}"
    data-csrf="{{ csrf_token() }}"
    class="hidden">
</div>

<div class="bioguard-header bg-white relative z-20 shadow-sm">
    <div class="bioguard-header-content">
        <div class="bioguard-header-nav">
            <a href="{{ route('dashboard') }}" class="bioguard-back-btn hover:text-emerald-600 transition-colors">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Kembali
            </a>
            <div class="bioguard-header-badge">
                <span>🎮</span>
                <span class="font-bold">BioGuard Game</span>
            </div>
        </div>
        <h1 class="bioguard-header-title text-gray-800">Uji Pengetahuan <span class="text-gradient bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">Konservasi Alam</span></h1>
        <p class="bioguard-header-desc text-gray-500">
            Tantang dirimu mengenali flora & fauna langka Indonesia. Kumpulkan poin tertinggi!
        </p>
    </div>
</div>

<section class="bioguard-section bg-pattern min-h-screen pt-10 pb-20 relative">
    <div class="absolute top-20 left-10 w-64 h-64 bg-emerald-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-64 h-64 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 2s"></div>

    <div class="bioguard-container relative z-10">
        <div id="game-wrapper" class="w-full max-w-4xl mx-auto">

            {{-- HUD (Score & Timer) --}}
            <div id="game-header" class="hidden glass-hud rounded-2xl shadow-lg border border-white/50 mb-8 sticky top-24 z-30 transition-all duration-500">
                <div class="p-4 md:p-6 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-br from-emerald-400 to-teal-500 p-3 rounded-xl text-white shadow-lg shadow-emerald-200">
                            <i class="fas fa-star text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Total Skor</p>
                            <h2 id="score-display" class="text-3xl font-black text-gray-800 tabular-nums">0</h2>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-1 mx-10 flex-col justify-center">
                        <div class="flex justify-between text-xs font-bold text-gray-400 mb-2">
                            <span>WAKTU TERSISA</span>
                            <span id="timer-text" class="text-emerald-600">15s</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden shadow-inner ring-1 ring-gray-100">
                            <div id="timer-fill" class="h-full bg-gradient-to-r from-emerald-500 to-teal-400 w-full transition-all duration-1000 ease-linear rounded-full"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Streak</p>
                        <div id="streak-display" class="text-2xl font-black text-orange-500 flex items-center justify-end gap-2">
                            <span>0</span> <i class="fas fa-fire animate-pulse"></i>
                        </div>
                    </div>
                </div>
                <div class="md:hidden h-1.5 w-full bg-gray-100">
                    <div id="timer-fill-mobile" class="h-full bg-emerald-500 transition-all duration-1000 ease-linear"></div>
                </div>
            </div>

            {{-- MAIN CARD CONTAINER --}}
            <div class="bg-white/80 backdrop-blur-sm rounded-[2rem] shadow-xl border border-white/60 min-h-[500px] flex flex-col relative overflow-hidden transition-all duration-500">

                {{-- SCREEN 1: LOBBY --}}
                <div id="screen-lobby" class="flex-1 flex flex-col items-center justify-center p-8 md:p-12 text-center fade-in-up">
                    <div class="mb-8">
                        <span class="px-4 py-1.5 bg-gray-100 text-gray-600 rounded-full text-xs font-bold uppercase tracking-wider border border-gray-200">Misi Baru</span>
                        <h2 class="text-4xl font-black text-gray-900 mt-4 mb-2">Pilih Target Operasi</h2>
                        <p class="text-gray-500 max-w-md mx-auto">Tentukan spesialisasi konservasimu hari ini. Apakah Flora atau Fauna?</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-2xl mb-8">
                        <button onclick="selectCategory('flora')" id="btn-flora" class="category-card-modern group text-left relative bg-white border border-emerald-100 rounded-3xl p-6 hover:border-emerald-500">
                            <div class="bg-emerald-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                                <i class="fas fa-leaf text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-emerald-700">Patroli Flora</h3>
                            <p class="text-sm text-gray-500 mt-1">Identifikasi jenis tumbuhan.</p>
                            <div class="absolute bottom-0 right-0 opacity-10 transform translate-x-4 translate-y-4">
                                <i class="fas fa-leaf text-9xl text-emerald-800"></i>
                            </div>
                        </button>
                        <button onclick="selectCategory('fauna')" id="btn-fauna" class="category-card-modern group text-left relative bg-white border border-orange-100 rounded-3xl p-6 hover:border-orange-500">
                            <div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                                <i class="fas fa-paw text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-orange-700">Patroli Fauna</h3>
                            <p class="text-sm text-gray-500 mt-1">Identifikasi satwa liar.</p>
                            <div class="absolute bottom-0 right-0 opacity-10 transform translate-x-4 translate-y-4">
                                <i class="fas fa-paw text-9xl text-orange-800"></i>
                            </div>
                        </button>
                    </div>

                    <div class="w-full max-w-xs relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400"><i class="fas fa-layer-group"></i></div>
                        <select id="difficulty-select" class="w-full pl-10 pr-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 font-bold text-gray-700 cursor-pointer appearance-none transition-all hover:border-gray-300">
                            <option value="mudah">Pemula (Mudah)</option>
                            <option value="sedang">Ranger (Sedang)</option>
                            <option value="sulit">Ahli (Sulit)</option>
                            <option value="sangat_sulit">Ekspedisi (Sangat Sulit)</option>
                            <option value="all">Campuran (Semua Level)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400"><i class="fas fa-chevron-down"></i></div>
                    </div>

                    <button onclick="fetchQuestions()" class="mt-8 w-full max-w-sm bg-gray-900 hover:bg-black text-white font-bold py-4 rounded-xl shadow-xl shadow-gray-200 transform transition hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2">
                        <span>MULAI MISI</span> <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                {{-- SCREEN 2: GAMEPLAY --}}
                <div id="screen-game" class="hidden flex-1 flex flex-col p-6 md:p-10 fade-in-up">
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-4">
                            <span id="q-category" class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-extrabold rounded-md uppercase tracking-wide">FLORA</span>
                            <span id="q-difficulty" class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-extrabold rounded-md uppercase tracking-wide">MUDAH</span>
                            <span class="flex-1"></span>
                            <span id="q-number" class="text-xs font-bold text-gray-400">Soal 1/10</span>
                        </div>
                        <div id="q-image-container" class="hidden mb-6 rounded-2xl overflow-hidden shadow-lg border border-gray-100 relative group">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity z-10"></div>
                            <img id="q-image" src="" alt="Soal Gambar" class="w-full h-56 object-cover md:h-72 transform group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <h2 id="q-text" class="text-2xl md:text-3xl font-bold text-gray-800 leading-snug min-h-[60px]">Loading...</h2>
                    </div>
                    <div id="options-container" class="grid grid-cols-1 gap-4 mt-auto"></div>
                </div>

                {{-- SCREEN 3: RESULT --}}
                <div id="screen-result" class="hidden flex-1 flex flex-col items-center justify-center p-8 text-center space-y-8 fade-in-up">
                    <div class="relative">
                        <div class="absolute inset-0 bg-emerald-200 rounded-full blur-2xl opacity-30 animate-pulse"></div>
                        <div class="w-48 h-48 bg-white rounded-full flex flex-col items-center justify-center shadow-2xl relative border-8 border-emerald-50 z-10">
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Skor Akhir</span>
                            <span id="final-score" class="text-6xl font-black text-emerald-600 tracking-tighter">0</span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-4xl font-black text-gray-800 mb-2">Misi Selesai!</h2>
                        <p id="final-msg" class="text-xl text-gray-600 font-medium">Luar biasa, Ranger!</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 w-full max-w-md">
                        <div class="bg-blue-50 p-4 rounded-2xl border border-blue-100">
                            <div class="text-xs text-blue-400 font-bold uppercase mb-1">Akurasi</div>
                            <div id="final-accuracy" class="text-3xl font-black text-blue-600">0%</div>
                        </div>
                        <div class="bg-orange-50 p-4 rounded-2xl border border-orange-100">
                            <div class="text-xs text-orange-400 font-bold uppercase mb-1">Max Streak</div>
                            <div id="final-streak" class="text-3xl font-black text-orange-600">0</div>
                        </div>
                    </div>
                    <div id="result-actions" class="w-full max-w-sm pt-4 space-y-3"></div>
                </div>

                {{-- LOADING OVERLAY --}}
                <div id="loading-overlay" class="hidden absolute inset-0 bg-white/90 z-50 flex items-center justify-center backdrop-blur-sm">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 border-4 border-emerald-200 border-t-emerald-600 rounded-full animate-spin mb-4"></div>
                        <p class="text-emerald-800 font-bold animate-pulse tracking-wide">MENGHUBUNGKAN SATELIT...</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- JAVASCRIPT --}}
<script>
    // --- KONFIGURASI DAN STATE ---
    const configEl = document.getElementById('game-config');
    const gameConfig = {
        isLoggedIn: configEl.dataset.auth === 'true',
        loginUrl: configEl.dataset.login,
        registerUrl: configEl.dataset.register,
        routes: {
            quizData: configEl.dataset.quizData,
            quizStore: configEl.dataset.quizStore,
            dashboard: configEl.dataset.dashboard
        },
        csrfToken: configEl.dataset.csrf
    };

    let state = {
        questions: [],
        currentIdx: 0,
        score: 0,
        streak: 0,
        maxStreak: 0,
        correctCount: 0,
        timer: null,
        timeLeft: 15,
        isAnswering: false // Flag penting untuk mencegah double-click
    };

    const SCREENS = {
        lobby: document.getElementById('screen-lobby'),
        game: document.getElementById('screen-game'),
        result: document.getElementById('screen-result'),
        loading: document.getElementById('loading-overlay'),
        header: document.getElementById('game-header')
    };

    let selectedCat = null;

    // --- HELPER FUNCTIONS ---
    function selectCategory(cat) {
        selectedCat = cat;
        document.querySelectorAll('.category-card-modern').forEach(el => el.classList.remove('selected'));
        document.getElementById(`btn-${cat}`).classList.add('selected');
    }

    // --- FETCH DATA ---
    async function fetchQuestions() {
        if (!selectedCat) {
            Swal.fire({
                icon: 'warning',
                title: 'Target Belum Dipilih!',
                text: 'Silakan pilih patroli Flora atau Fauna terlebih dahulu.',
                confirmButtonColor: '#059669',
            });
            return;
        }

        const diff = document.getElementById('difficulty-select').value;
        SCREENS.loading.classList.remove('hidden');

        try {
            const url = `${gameConfig.routes.quizData}?category=${selectedCat}&difficulty=${diff}`;
            const res = await fetch(url);
            const data = await res.json();

            if (data.length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Data Kosong',
                    text: 'Maaf, belum ada data soal untuk kategori ini.',
                    confirmButtonColor: '#059669'
                });
                return;
            }
            state.questions = data;
            startGame();
        } catch (err) {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Gagal Memuat',
                text: 'Terjadi kesalahan koneksi.',
                confirmButtonColor: '#ef4444'
            });
        } finally {
            SCREENS.loading.classList.add('hidden');
        }
    }

    // --- GAME ENGINE ---
    function startGame() {
        SCREENS.lobby.classList.add('hidden');
        SCREENS.game.classList.remove('hidden');
        SCREENS.header.classList.remove('hidden');
        state.currentIdx = 0;
        state.score = 0;
        state.streak = 0;
        state.maxStreak = 0;
        state.correctCount = 0;
        updateScoreUI();
        loadQuestion();
    }

    function loadQuestion() {
        if (state.currentIdx >= state.questions.length) {
            showResult();
            return;
        }

        const q = state.questions[state.currentIdx];
        state.isAnswering = false;
        state.timeLeft = 15;

        // --- RENDER TEKS SOAL ---
        document.getElementById('q-category').innerText = q.category;
        document.getElementById('q-difficulty').innerText = q.difficulty;
        document.getElementById('q-number').innerText = `Misi ${state.currentIdx + 1} / ${state.questions.length}`;
        document.getElementById('q-text').innerText = q.question;

        // --- RENDER GAMBAR (Cek Null) ---
        const imgContainer = document.getElementById('q-image-container');
        const imgElement = document.getElementById('q-image');
        if (q.image) {
            imgContainer.classList.remove('hidden');
            imgElement.src = `/assets/images/quiz/${q.image}`;
        } else {
            imgContainer.classList.add('hidden');
        }

        updateTimerUI(100, 'bg-gradient-to-r from-emerald-500 to-teal-400');

        // --- LOGIC BARU: PENGACAKAN OPSI ---
        const cont = document.getElementById('options-container');
        cont.innerHTML = '';

        // 1. Ambil opsi mentah (Array string)
        const rawOptions = typeof q.options === 'string' ? JSON.parse(q.options) : q.options;

        // 2. Petakan opsi dengan Indeks Aslinya (Biar kita tahu mana kunci jawaban setelah diacak)
        // Hasilnya: [{text: "Jati", originalIdx: 0}, {text: "Padi", originalIdx: 1}, ...]
        let mappedOptions = rawOptions.map((opt, index) => {
            return {
                text: opt,
                originalIdx: index
            };
        });

        // 3. Acak posisinya!
        mappedOptions = shuffleArray(mappedOptions);

        // 4. Render tombol berdasarkan urutan yang SUDAH DIACAK
        mappedOptions.forEach((item, displayIndex) => {
            const btn = document.createElement('button');

            // Kita simpan originalIdx di atribut data HTML untuk dipakai nanti saat pengecekan
            btn.dataset.originalIdx = item.originalIdx;

            btn.className = 'option-btn-modern w-full text-left px-6 py-5 rounded-xl bg-white border border-gray-200 font-bold text-gray-700 flex justify-between items-center group transform transition-all hover:scale-[1.01] active:scale-95';

            btn.innerHTML = `
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center font-black text-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors">${String.fromCharCode(65 + displayIndex)}</div>
                    <span class="text-lg leading-snug group-hover:text-emerald-700 transition-colors">${item.text}</span>
                </div>
                <div class="icon-result text-2xl ml-2"></div>
            `;

            // Saat diklik, kirim Indeks Asli (item.originalIdx) ke fungsi cek jawaban
            // Kita juga kirim rawOptions (urutan asli) agar teks jawaban benar bisa diambil
            btn.onclick = () => checkAnswer(item.originalIdx, q.correct_index, q.points, btn, rawOptions);

            cont.appendChild(btn);
        });

        startTimer();
    }

    // Algoritma Fisher-Yates Shuffle (Standar Industri untuk pengacakan murni)
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // --- LOGIC UTAMA (REVISI) ---
    function checkAnswer(chosenOriginalIdx, correctIdx, points, btnElement, rawOptionsArray) {
        if (state.isAnswering) return;
        state.isAnswering = true;
        clearInterval(state.timer);

        const q = state.questions[state.currentIdx];
        const explanationText = q.explanation || "Penjelasan detail belum tersedia untuk soal ini.";
        const correctAnswerText = rawOptionsArray[correctIdx]; // Ambil teks jawaban benar dari array asli

        const isCorrect = (chosenOriginalIdx === correctIdx);

        // Update UI Button yang diklik
        const iconDiv = btnElement.querySelector('.icon-result');
        if (isCorrect) {
            btnElement.classList.add('correct-anim');
            iconDiv.innerHTML = '<i class="fas fa-check-circle"></i>';

            // Logic Skor
            state.streak++;
            if (state.streak > state.maxStreak) state.maxStreak = state.streak;
            const timeBonus = state.timeLeft * 5;
            const streakBonus = state.streak * 10;
            state.score += (points + timeBonus + streakBonus);
            state.correctCount++;
            document.getElementById('streak-display').innerHTML = `${state.streak} <i class="fas fa-fire animate-pulse text-orange-500"></i>`;
        } else {
            btnElement.classList.add('wrong-anim');
            iconDiv.innerHTML = '<i class="fas fa-times-circle"></i>';

            // CARI TOMBOL YANG BENAR (Logic Baru)
            // Kita cari tombol di layar yang punya data-original-idx sama dengan kunci jawaban
            const correctBtn = document.querySelector(`button[data-original-idx="${correctIdx}"]`);
            if (correctBtn) {
                correctBtn.classList.add('ring-2', 'ring-emerald-400', 'bg-emerald-50');
                // Opsional: Kasih centang juga di tombol yang benar
                correctBtn.querySelector('.icon-result').innerHTML = '<i class="fas fa-check-circle text-emerald-600 opacity-50"></i>';
            }

            state.streak = 0;
            document.getElementById('streak-display').innerHTML = `0 <i class="fas fa-fire text-gray-300"></i>`;
        }
        updateScoreUI();

        // --- POPUP EDUKATIF (Tetap sama) ---
        setTimeout(() => {
            if (isCorrect) {
                Swal.fire({
                    title: 'Jawaban Tepat! 🎉',
                    html: `
                        <div class="text-left mt-2">
                            <p class="text-emerald-600 font-bold mb-2">+${points} Poin (Bonus Waktu: ${state.timeLeft*5})</p>
                            <div class="bg-emerald-50 p-4 rounded-xl border border-emerald-100 text-sm text-gray-700 leading-relaxed">
                                <strong class="block text-emerald-800 mb-1">Fakta Menarik:</strong>
                                ${explanationText}
                            </div>
                        </div>
                    `,
                    icon: 'success',
                    confirmButtonText: 'Lanjut Misi <i class="fas fa-arrow-right ml-2"></i>',
                    confirmButtonColor: '#059669',
                    allowOutsideClick: false
                }).then(() => nextQuestion());
            } else {
                Swal.fire({
                    title: 'Kurang Tepat 😅',
                    html: `
                        <div class="text-left mt-2 space-y-3">
                            <div class="bg-red-50 p-3 rounded-lg border border-red-100 text-red-800 text-sm">
                                Jawaban yang benar adalah:<br>
                                <b class="text-lg">${correctAnswerText}</b>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-sm text-gray-600 leading-relaxed">
                                <strong class="block text-gray-800 mb-1">Penjelasan:</strong>
                                ${explanationText}
                            </div>
                        </div>
                    `,
                    icon: 'error',
                    confirmButtonText: 'Paham, Lanjut <i class="fas fa-arrow-right ml-2"></i>',
                    confirmButtonColor: '#374151',
                    allowOutsideClick: false
                }).then(() => nextQuestion());
            }
        }, 500);
    }

    function startTimer() {
        if (state.timer) clearInterval(state.timer);
        document.getElementById('timer-text').innerText = state.timeLeft + 's';

        state.timer = setInterval(() => {
            state.timeLeft--;
            document.getElementById('timer-text').innerText = state.timeLeft + 's';

            const percent = (state.timeLeft / 15) * 100;
            let colorClass = percent < 30 ? 'bg-red-500' : (percent < 60 ? 'bg-yellow-500' : 'bg-gradient-to-r from-emerald-500 to-teal-400');
            updateTimerUI(percent, colorClass);

            if (state.timeLeft <= 0) {
                clearInterval(state.timer);
                timeOut();
            }
        }, 1000);
    }

    function timeOut() {
        state.isAnswering = true;
        state.streak = 0;
        document.getElementById('streak-display').innerHTML = `0 <i class="fas fa-fire text-gray-300"></i>`;

        const q = state.questions[state.currentIdx];
        const explanationText = q.explanation || "Waktu habis!";
        const rawOptions = typeof q.options === 'string' ? JSON.parse(q.options) : q.options;
        const correctAnswerText = rawOptions[q.correct_index];

        // HIGHLIGHT JAWABAN BENAR (Logic Baru)
        const correctBtn = document.querySelector(`button[data-original-idx="${q.correct_index}"]`);
        if (correctBtn) {
            correctBtn.classList.add('bg-emerald-50', 'border-emerald-500', 'text-emerald-800');
            correctBtn.querySelector('.icon-result').innerHTML = '<i class="fas fa-check-circle text-emerald-600"></i>';
        }

        Swal.fire({
            title: 'Waktu Habis! ⏰',
            html: `
                <div class="text-left mt-2 space-y-3">
                    <div class="bg-orange-50 p-3 rounded-lg border border-orange-100 text-orange-800 text-sm">
                        Jawaban yang benar adalah:<br>
                        <b class="text-lg">${correctAnswerText}</b>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-sm text-gray-600 leading-relaxed">
                        <strong class="block text-gray-800 mb-1">Penjelasan:</strong>
                        ${explanationText}
                    </div>
                </div>
            `,
            icon: 'warning',
            confirmButtonText: 'Lanjut Misi',
            confirmButtonColor: '#f97316',
            allowOutsideClick: false
        }).then(() => nextQuestion());
    }

    function updateTimerUI(percent, colorClass) {
        const bars = [document.getElementById('timer-fill'), document.getElementById('timer-fill-mobile')];
        bars.forEach(bar => {
            if (bar) {
                bar.style.width = percent + '%';
                // Reset class dulu agar warna berubah mulus
                bar.className = `h-full w-full transition-all duration-1000 ease-linear rounded-full ${colorClass}`;
            }
        });
    }

    function nextQuestion() {
        state.currentIdx++;
        loadQuestion(); // loadQuestion akan cek sendiri apakah sudah finish
    }

    function updateScoreUI() {
        document.getElementById('score-display').innerText = state.score;
    }

    function showResult() {
        SCREENS.game.classList.add('hidden');
        SCREENS.header.classList.add('hidden');
        SCREENS.result.classList.remove('hidden');

        document.getElementById('final-score').innerText = state.score;
        document.getElementById('final-streak').innerText = state.maxStreak;

        const accuracy = Math.round((state.correctCount / state.questions.length) * 100) || 0;
        document.getElementById('final-accuracy').innerText = accuracy + '%';

        let msg = accuracy > 80 ? "Sempurna! Kamu Ranger sejati." : (accuracy > 50 ? "Hebat! Terus tingkatkan." : "Jangan menyerah, coba lagi!");
        document.getElementById('final-msg').innerText = msg;

        renderResultActions(accuracy);
    }

    function renderResultActions(accuracy) {
        const actionsDiv = document.getElementById('result-actions');

        if (gameConfig.isLoggedIn) {
            actionsDiv.innerHTML = `
                <div id="save-status" class="bg-emerald-50 p-4 rounded-xl border border-emerald-100 mb-4 flex items-center justify-center gap-2">
                    <div class="w-4 h-4 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
                    <span class="text-emerald-700 font-bold">Menyimpan Skor...</span>
                </div>
                <button onclick="location.reload()" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold shadow-lg hover:bg-emerald-700 transition hover:-translate-y-1">Main Lagi</button>
                <a href="${gameConfig.routes.dashboard}" class="block w-full bg-white text-gray-600 border-2 border-gray-200 py-4 rounded-xl font-bold hover:bg-gray-50 transition text-center mt-3">Kembali ke Dashboard</a>
            `;
            saveScoreToDatabase(accuracy);
        } else {
            actionsDiv.innerHTML = `
                <div class="bg-orange-50 p-4 rounded-xl border border-orange-200 mb-4 text-left">
                    <p class="text-gray-800 font-bold text-sm mb-1"><i class="fas fa-exclamation-triangle text-orange-500 mr-1"></i> Skor Belum Disimpan!</p>
                    <p class="text-xs text-gray-600">Login sekarang agar skormu <b>${state.score}</b> tidak hilang.</p>
                </div>
                <button onclick="saveAndLogin()" class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white py-4 rounded-xl font-extrabold shadow-lg hover:shadow-orange-200 transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-save"></i> LOGIN UNTUK SIMPAN
                </button>
                <div class="grid grid-cols-2 gap-3 mt-3">
                    <button onclick="location.reload()" class="w-full bg-gray-100 text-gray-500 py-3 rounded-xl font-bold hover:bg-gray-200 text-xs">Main Tanpa Simpan</button>
                    <a href="${gameConfig.registerUrl}" class="flex items-center justify-center w-full bg-white text-emerald-600 border border-emerald-200 py-3 rounded-xl font-bold hover:bg-emerald-50 text-xs">Daftar Akun</a>
                </div>
            `;
        }
    }

    function saveAndLogin() {
        const gameData = {
            score: state.score,
            streak: state.maxStreak,
            date: new Date().toISOString()
        };
        localStorage.setItem('pending_game_score', JSON.stringify(gameData));
        window.location.href = gameConfig.loginUrl;
    }

    async function saveScoreToDatabase() { 
        // 1. Ambil data akurasi
        const accuracy = Math.round((state.correctCount / state.questions.length) * 100); 
        
        // Debug: Intip data yang mau dikirim di Console (Tekan F12 > Console)
        console.log("Mengirim Skor:", { score: state.score, streak: state.maxStreak });

        try { 
            // 2. Kirim ke Server
            const response = await fetch(gameConfig.routes.quizStore, { 
                method: "POST", 
                headers: { 
                    "Content-Type": "application/json", 
                    "X-CSRF-TOKEN": gameConfig.csrfToken 
                }, 
                body: JSON.stringify({ 
                    score: state.score, 
                    streak: state.maxStreak
                    // Note: 'accuracy' tidak dikirim karena Controller kamu belum menerimanya, tapi tidak apa-apa.
                }) 
            }); 
            
            // 3. Cek apakah Server menolak (Misal: Error 500 atau 401)
            if (!response.ok) {
                // Jika error, kita paksa masuk ke blok catch
                throw new Error(`Server Error: ${response.status} ${response.statusText}`);
            }

            const result = await response.json(); 
            
            // --- SUKSES (Tampilkan Popup Hijau) ---
            document.getElementById('save-status').innerHTML = `<p class="text-emerald-700 font-bold flex items-center justify-center"><i class="fas fa-check-circle mr-2"></i> Skor Tersimpan!</p>`; 
            
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Diamankan!',
                text: `Total Poin kamu sekarang: ${result.total_points}`,
                confirmButtonColor: '#059669'
            });

        } catch (error) { 
            // --- GAGAL (Tampilkan Popup Merah) ---
            console.error("Gagal Menyimpan:", error); // Cek detailnya di Console Browser
            
            document.getElementById('save-status').innerHTML = `<p class="text-red-600 font-bold flex items-center justify-center text-xs"><i class="fas fa-exclamation-circle mr-1"></i> Gagal. Cek Koneksi.</p>`; 
            
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan!',
                text: 'Terjadi kesalahan sistem. Cek Console (F12) untuk detailnya.',
                confirmButtonColor: '#ef4444'
            });
        } 
    }
</script>
@endsection