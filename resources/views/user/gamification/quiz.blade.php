@extends('layouts.app')

@section('title', 'BioGuard Brain Match')

@section('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .correct-anim {
            background-color: #d1fae5 !important;
            border-color: #10b981 !important;
            color: #065f46 !important;
            animation: pulseGreen 0.5s ease-in-out;
        }
        .wrong-anim {
            background-color: #fee2e2 !important;
            border-color: #ef4444 !important;
            color: #991b1b !important;
            animation: shakeRed 0.5s ease-in-out;
        }
        .selected-category {
            border-color: #10b981 !important;
            background-color: #ecfdf5 !important;
            transform: scale(1.02);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1);
        }
        @keyframes pulseGreen {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        @keyframes shakeRed {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .floating-icon { animation: float 3s ease-in-out infinite; }
    </style>
@endsection

@section('content')

{{-- Navbar Logic --}}
@auth
    @include('layouts.navbar-dashboard')
@else
    @include('layouts.navbar-landing')
@endauth

{{-- BACKGROUND AREA --}}
<div class="min-h-screen bg-gray-50 py-10" 
     style="background-image: url('{{ asset('assets/images/game-bg.jpg') }}'); background-size: cover; background-position: center; background-blend-mode: overlay; background-color: rgba(255,255,255,0.92);">
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        
        <div id="game-header" class="hidden bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden mb-6 border border-emerald-100 relative transition-all duration-500">
            <div class="p-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="bg-emerald-100 p-3 rounded-xl text-emerald-600">
                        <i class="fas fa-star text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Skor</p>
                        <h2 id="score-display" class="text-3xl font-extrabold text-gray-800">0</h2>
                    </div>
                </div>

                <div class="hidden md:block flex-1 mx-8">
                    <div class="flex justify-between text-xs font-bold text-gray-400 mb-1">
                        <span>WAKTU MISI</span>
                        <span id="timer-text">15s</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div id="timer-fill" class="h-full bg-emerald-500 w-full transition-all duration-1000 ease-linear"></div>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Streak</p>
                    <div id="streak-display" class="text-2xl font-bold text-orange-500">
                        🔥 0
                    </div>
                </div>
            </div>
            <div class="md:hidden w-full bg-gray-200 h-2">
                <div id="timer-fill-mobile" class="h-full bg-emerald-500 w-full transition-all duration-1000 ease-linear"></div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 min-h-[550px] flex flex-col relative overflow-hidden">
            
            <div id="screen-intro" class="flex-1 flex flex-col items-center justify-center p-8 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-400 to-blue-500"></div>
                
                <div class="floating-icon mb-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-blue-100 rounded-full flex items-center justify-center shadow-lg mx-auto">
                        <i class="fas fa-user-secret text-5xl text-emerald-600"></i>
                    </div>
                </div>

                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">Misi Patroli #001</h1>
                <p class="text-lg text-gray-500 mb-8 max-w-md mx-auto">Selamat datang, Ranger! Biodiversitas kita sedang terancam. Kami butuh bantuanmu.</p>

                <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100 max-w-lg w-full text-left mb-8 space-y-4">
                    <h3 class="font-bold text-gray-800 flex items-center text-sm uppercase tracking-wide">
                        <i class="fas fa-file-contract mr-2 text-emerald-600"></i> Protokol Misi
                    </h3>
                    <div class="grid gap-3">
                        <div class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-emerald-50">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3 font-bold">1</div>
                            <span class="text-sm text-gray-600 font-medium">Pilih target (Flora/Fauna)</span>
                        </div>
                        <div class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-emerald-50">
                            <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mr-3 font-bold">2</div>
                            <span class="text-sm text-gray-600 font-medium">Jawab cepat (Max 15 detik)</span>
                        </div>
                        <div class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-emerald-50">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3 font-bold">3</div>
                            <span class="text-sm text-gray-600 font-medium">Jawab benar berturut-turut = Bonus!</span>
                        </div>
                    </div>
                </div>

                <button onclick="enterLobby()" class="group relative px-8 py-4 bg-emerald-600 rounded-xl text-white font-bold shadow-lg shadow-emerald-200 transition-all hover:scale-105 hover:bg-emerald-700 w-full max-w-xs">
                    <span class="mr-2">SIAP LAKSANAKAN</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>

            <div id="screen-lobby" class="hidden flex-1 flex flex-col items-center justify-center p-8 text-center space-y-6">
                <div>
                    <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-bold uppercase tracking-wide">Persiapan</span>
                    <h2 class="text-3xl font-extrabold text-gray-800 mt-3">Pilih Target Operasi</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full max-w-lg">
                    <button onclick="selectCategory('flora')" id="btn-flora" class="category-card group p-6 border-2 border-gray-200 rounded-2xl hover:border-emerald-500 hover:bg-emerald-50 transition-all duration-300 text-left relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full -mr-4 -mt-4 opacity-50 group-hover:scale-110 transition-transform"></div>
                        <i class="fas fa-leaf text-3xl text-emerald-500 mb-3 relative z-10"></i>
                        <h3 class="text-lg font-bold text-gray-800 relative z-10">Patroli Flora</h3>
                        <p class="text-xs text-gray-500 mt-1 relative z-10">Identifikasi tumbuhan langka</p>
                    </button>
                    <button onclick="selectCategory('fauna')" id="btn-fauna" class="category-card group p-6 border-2 border-gray-200 rounded-2xl hover:border-orange-500 hover:bg-orange-50 transition-all duration-300 text-left relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-orange-100 rounded-bl-full -mr-4 -mt-4 opacity-50 group-hover:scale-110 transition-transform"></div>
                        <i class="fas fa-paw text-3xl text-orange-500 mb-3 relative z-10"></i>
                        <h3 class="text-lg font-bold text-gray-800 relative z-10">Patroli Fauna</h3>
                        <p class="text-xs text-gray-500 mt-1 relative z-10">Identifikasi satwa liar</p>
                    </button>
                </div>

                <div class="w-full max-w-xs pt-4">
                    <label class="block text-left text-xs font-bold text-gray-400 mb-2 ml-1">TINGKAT KESULITAN</label>
                    <select id="difficulty-select" class="w-full p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 font-bold text-gray-700 cursor-pointer hover:bg-white transition-colors">
                        <option value="mudah">Pemula (Mudah)</option>
                        <option value="sedang">Ranger (Sedang)</option>
                        <option value="sulit">Ahli (Sulit)</option>
                        <option value="sangat_sulit">Ekspedisi (Sangat Sulit)</option>
                        <option value="all">Campuran (Semua Level)</option>
                    </select>
                </div>

                <button onclick="fetchQuestions()" class="w-full max-w-md bg-gray-800 hover:bg-gray-900 text-white font-bold py-4 rounded-xl shadow-lg transform transition hover:-translate-y-1 active:scale-95 mt-4">
                    MULAI PATROLI
                </button>
            </div>

            <div id="screen-game" class="hidden flex-1 flex flex-col p-6 md:p-10">
                <div class="mb-4">
                    <div class="flex space-x-2 mb-4">
                        <span id="q-category" class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-full uppercase">FLORA</span>
                        <span id="q-difficulty" class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-full uppercase">MUDAH</span>
                        <span id="q-number" class="px-3 py-1 bg-blue-100 text-blue-600 text-[10px] font-bold rounded-full">Soal 1/10</span>
                    </div>

                    <div id="q-image-container" class="hidden mb-4 rounded-2xl overflow-hidden shadow-lg border-2 border-white ring-1 ring-gray-200">
                        <img id="q-image" src="" alt="Soal Gambar" class="w-full h-48 object-cover md:h-64 hover:scale-105 transition-transform duration-700">
                    </div>

                    <h2 id="q-text" class="text-xl md:text-2xl font-bold text-gray-800 leading-snug min-h-[60px]">
                        Loading...
                    </h2>
                </div>

                <div id="options-container" class="grid grid-cols-1 gap-3 mt-auto pb-4"></div>
            </div>

            <div id="screen-result" class="hidden flex-1 flex flex-col items-center justify-center p-8 text-center bg-emerald-50/50 space-y-6">
                
                <div class="relative">
                    <div class="w-40 h-40 bg-white rounded-full flex items-center justify-center shadow-2xl z-10 relative border-4 border-emerald-500">
                        <div class="text-center">
                            <span class="block text-xs text-gray-400 font-bold uppercase">Skor Akhir</span>
                            <span id="final-score" class="text-5xl font-extrabold text-emerald-600">0</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Misi Selesai!</h2>
                    <p id="final-msg" class="text-lg text-gray-600 font-medium">Luar biasa, Ranger!</p>
                </div>

                <div class="flex space-x-4 w-full max-w-md justify-center">
                    <div class="bg-white px-6 py-4 rounded-xl shadow-sm border border-gray-200 flex-1">
                        <div class="text-xs text-gray-400 font-bold uppercase">Akurasi</div>
                        <div id="final-accuracy" class="text-2xl font-bold text-blue-600">0%</div>
                    </div>
                    <div class="bg-white px-6 py-4 rounded-xl shadow-sm border border-gray-200 flex-1">
                        <div class="text-xs text-gray-400 font-bold uppercase">Max Streak</div>
                        <div id="final-streak" class="text-2xl font-bold text-orange-500">0</div>
                    </div>
                </div>

                <div id="result-actions" class="w-full max-w-sm pt-4 space-y-3">
                    </div>

            </div>

            <div id="loading-overlay" class="hidden absolute inset-0 bg-white/95 z-50 flex items-center justify-center backdrop-blur-sm">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-emerald-600 mb-3"></div>
                    <p class="text-emerald-800 font-bold animate-pulse">Menghubungkan ke Satelit...</p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // --- AUTH CHECK ---
    // Mengambil status login dari Laravel
    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    const loginUrl = "{{ route('login') }}";
    const registerUrl = "{{ route('register') }}";

    // --- STATE MACHINE ---
    let state = {
        questions: [], currentIdx: 0, score: 0, streak: 0, maxStreak: 0, correctCount: 0, timer: null, timeLeft: 15, isAnswering: false
    };

    const SCREENS = {
        intro: document.getElementById('screen-intro'),
        lobby: document.getElementById('screen-lobby'),
        game: document.getElementById('screen-game'),
        result: document.getElementById('screen-result'),
        loading: document.getElementById('loading-overlay'),
        header: document.getElementById('game-header')
    };

    let selectedCat = null;

    // --- NAVIGASI ---
    function enterLobby() {
        SCREENS.intro.classList.add('hidden');
        SCREENS.lobby.classList.remove('hidden');
    }

    function selectCategory(cat) {
        selectedCat = cat;
        document.querySelectorAll('.category-card').forEach(el => el.classList.remove('selected-category', 'ring-2', 'ring-emerald-500'));
        document.getElementById(`btn-${cat}`).classList.add('selected-category', 'ring-2', 'ring-emerald-500');
    }

    async function fetchQuestions() {
        if(!selectedCat) { alert("Pilih target patroli (Flora/Fauna) dulu ya!"); return; }
        const diff = document.getElementById('difficulty-select').value;
        SCREENS.loading.classList.remove('hidden');
        try {
            const res = await fetch(`{{ route('quiz.data') }}?category=${selectedCat}&difficulty=${diff}`);
            const data = await res.json();
            if(data.length === 0) { alert('Maaf, belum ada data soal.'); location.reload(); return; }
            state.questions = data;
            startGame();
        } catch (err) {
            console.error(err);
            alert('Gagal memuat soal.');
        } finally {
            SCREENS.loading.classList.add('hidden');
        }
    }

    function startGame() {
        SCREENS.lobby.classList.add('hidden');
        SCREENS.game.classList.remove('hidden');
        SCREENS.header.classList.remove('hidden');
        
        state.currentIdx = 0; state.score = 0; state.streak = 0; state.maxStreak = 0; state.correctCount = 0;
        updateScoreUI();
        loadQuestion();
    }

    function loadQuestion() {
        const q = state.questions[state.currentIdx];
        state.isAnswering = false;
        state.timeLeft = 15;
        
        document.getElementById('q-category').innerText = q.category;
        document.getElementById('q-difficulty').innerText = q.difficulty;
        document.getElementById('q-number').innerText = `Soal ${state.currentIdx + 1}/${state.questions.length}`;
        document.getElementById('q-text').innerText = q.question;

        const imgContainer = document.getElementById('q-image-container');
        const imgElement = document.getElementById('q-image');
        if (q.image) {
            imgContainer.classList.remove('hidden');
            imgElement.src = `/assets/images/quiz/${q.image}`;
        } else {
            imgContainer.classList.add('hidden');
        }

        updateTimerUI(100, 'bg-emerald-500');
        
        const cont = document.getElementById('options-container');
        cont.innerHTML = '';
        
        q.options.forEach((opt, idx) => {
            const btn = document.createElement('button');
            btn.className = 'option-btn w-full text-left p-4 rounded-xl border-2 border-gray-100 bg-white hover:bg-gray-50 hover:border-emerald-200 font-semibold text-gray-700 flex justify-between items-center transition-all duration-200 group';
            btn.innerHTML = `
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center font-bold mr-3 text-sm border shadow-sm group-hover:bg-white group-hover:text-emerald-600 transition-colors">${String.fromCharCode(65+idx)}</div>
                    <span class="text-base md:text-lg leading-snug">${opt}</span>
                </div>
                <div class="icon-result text-2xl ml-2"></div>
            `;
            btn.onclick = () => checkAnswer(idx, q.correct_index, q.points, btn);
            cont.appendChild(btn);
        });
        startTimer();
    }

    function checkAnswer(chosenIdx, correctIdx, points, btnElement) {
        if(state.isAnswering) return;
        state.isAnswering = true;
        clearInterval(state.timer);
        
        const allBtns = document.querySelectorAll('.option-btn');
        const correctBtn = allBtns[correctIdx];
        const chosenIconDiv = btnElement.querySelector('.icon-result');
        const correctIconDiv = correctBtn.querySelector('.icon-result');

        if(chosenIdx === correctIdx) {
            btnElement.classList.add('correct-anim');
            chosenIconDiv.innerHTML = '<i class="fas fa-check-circle text-emerald-600"></i>';
            state.streak++;
            if(state.streak > state.maxStreak) state.maxStreak = state.streak;
            const timeBonus = state.timeLeft * 5;
            const streakBonus = state.streak * 10;
            state.score += (points + timeBonus + streakBonus);
            state.correctCount++;
            document.getElementById('streak-display').innerHTML = `🔥 ${state.streak}`;
        } else {
            btnElement.classList.add('wrong-anim');
            chosenIconDiv.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
            state.streak = 0;
            document.getElementById('streak-display').innerHTML = `❄️ 0`;
            correctBtn.classList.add('bg-emerald-50', 'border-emerald-500', 'text-emerald-800');
            correctIconDiv.innerHTML = '<i class="fas fa-check-circle text-emerald-600 opacity-50"></i>';
        }
        updateScoreUI();
        setTimeout(nextQuestion, 3000);
    }

    function timeOut() {
        state.isAnswering = true; 
        state.streak = 0;
        document.getElementById('streak-display').innerHTML = `❄️ 0`;
        const q = state.questions[state.currentIdx];
        const allBtns = document.querySelectorAll('.option-btn');
        const correctBtn = allBtns[q.correct_index];
        const correctIconDiv = correctBtn.querySelector('.icon-result');
        correctBtn.classList.add('bg-emerald-50', 'border-emerald-500', 'text-emerald-800');
        correctIconDiv.innerHTML = '<i class="fas fa-check-circle text-emerald-600"></i>';
        setTimeout(nextQuestion, 3000);
    }

    function startTimer() {
        if(state.timer) clearInterval(state.timer);
        document.getElementById('timer-text').innerText = state.timeLeft + 's';
        state.timer = setInterval(() => {
            state.timeLeft--;
            document.getElementById('timer-text').innerText = state.timeLeft + 's';
            const percent = (state.timeLeft / 15) * 100;
            let colorClass = percent < 30 ? 'bg-red-500' : (percent < 60 ? 'bg-yellow-500' : 'bg-emerald-500');
            updateTimerUI(percent, colorClass);
            if(state.timeLeft <= 0) { clearInterval(state.timer); timeOut(); }
        }, 1000);
    }

    function updateTimerUI(percent, colorClass) {
        const bars = [document.getElementById('timer-fill'), document.getElementById('timer-fill-mobile')];
        bars.forEach(bar => { if(bar) { bar.style.width = percent + '%'; bar.className = `h-full w-full transition-all duration-1000 ease-linear ${colorClass}`; }});
    }

    function nextQuestion() {
        state.currentIdx++;
        if(state.currentIdx < state.questions.length) loadQuestion();
        else showResult();
    }

    function updateScoreUI() { document.getElementById('score-display').innerText = state.score; }

    function showResult() {
        SCREENS.game.classList.add('hidden');
        SCREENS.header.classList.add('hidden');
        SCREENS.result.classList.remove('hidden');

        // Update UI Stats
        document.getElementById('final-score').innerText = state.score;
        document.getElementById('final-streak').innerText = state.maxStreak;
        const accuracy = Math.round((state.correctCount / state.questions.length) * 100);
        document.getElementById('final-accuracy').innerText = accuracy + '%';

        let msg = accuracy > 80 ? "Sempurna! Kamu Ranger sejati." : (accuracy > 50 ? "Bagus, terus tingkatkan!" : "Jangan menyerah, coba lagi!");
        document.getElementById('final-msg').innerText = msg;

        // --- STRATEGI JEBAKAN BATMAN (GUEST VS MEMBER) ---
        const actionsDiv = document.getElementById('result-actions');
        
        if (isLoggedIn) {
            // == MEMBER VIEW ==
            actionsDiv.innerHTML = `
                <div id="save-status" class="bg-emerald-50 p-4 rounded-xl border border-emerald-100 mb-4 animate-pulse">
                    <p class="text-emerald-700 font-bold flex items-center justify-center">
                        <i class="fas fa-satellite-dish mr-2 fa-spin"></i> Mengirim Data ke Markas...
                    </p>
                </div>
                <button onclick="location.reload()" class="w-full bg-emerald-600 text-white py-3 rounded-xl font-bold shadow hover:bg-emerald-700 transition">Main Lagi</button>
                <a href="{{ route('dashboard') }}" class="block w-full bg-white text-gray-600 border border-gray-300 py-3 rounded-xl font-bold hover:bg-gray-50 transition text-center mt-2">Kembali ke Dashboard</a>
            `;

            // --- PROSES SAVE REAL-TIME ---
            saveScoreToDatabase();
        }   else {
            // == GUEST VIEW (PANCINGAN) ==
            actionsDiv.innerHTML = `
                <div class="bg-orange-50 p-4 rounded-xl border border-orange-200 mb-4 text-left">
                    <p class="text-gray-800 font-bold text-sm mb-1"><i class="fas fa-exclamation-triangle text-orange-500 mr-1"></i> Jangan Biarkan Skor Hilang!</p>
                    <p class="text-xs text-gray-600">Sayang banget skor setinggi <b>${state.score}</b> hangus begitu saja. Simpan prestasimu sekarang!</p>
                </div>
                
                <button onclick="saveAndLogin()" class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white py-4 rounded-xl font-extrabold shadow-lg hover:shadow-orange-200 transform hover:-translate-y-1 transition-all flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> LOGIN UNTUK SIMPAN
                </button>
                
                <div class="grid grid-cols-2 gap-3 mt-3">
                    <button onclick="location.reload()" class="w-full bg-gray-100 text-gray-500 py-3 rounded-xl font-bold hover:bg-gray-200 text-xs">Main Tanpa Simpan</button>
                    <a href="${registerUrl}" class="flex items-center justify-center w-full bg-white text-emerald-600 border border-emerald-200 py-3 rounded-xl font-bold hover:bg-emerald-50 text-xs">Daftar Akun Baru</a>
                </div>
            `;
        }
    }

    // --- FUNGSI JEBAKAN (SIMPAN SKOR SEMENTARA) ---
    function saveAndLogin() {
        // Simpan skor ke LocalStorage browser
        const gameData = {
            score: state.score,
            streak: state.maxStreak,
            date: new Date().toISOString()
        };
        localStorage.setItem('pending_game_score', JSON.stringify(gameData));
        
        // Lempar user ke halaman Login
        window.location.href = loginUrl;
    }

    async function saveScoreToDatabase() {
        const accuracy = Math.round((state.correctCount / state.questions.length) * 100);
        
        try {
            const response = await fetch("{{ route('quiz.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" 
                },
                body: JSON.stringify({
                    score: state.score,
                    streak: state.maxStreak,
                    accuracy: accuracy
                })
            });

            const result = await response.json();

            if (response.ok) {
                // Sukses
                document.getElementById('save-status').innerHTML = `...Berhasil...`;
                document.getElementById('save-status').classList.remove('animate-pulse');
            } else {
                throw new Error('Gagal simpan');
            }
        } catch (error) {
            console.error(error); // Cek Console (F12) untuk detail
            
            // TAMBAHAN: Tampilkan Alert Error Asli biar kita tau penyakitnya
            alert("Gagal Terhubung! Cek error ini: " + error.message);

            document.getElementById('save-status').innerHTML = `
                <p class="text-red-600 font-bold flex items-center justify-center">
                    <i class="fas fa-exclamation-circle mr-2"></i> Gagal Terhubung!
                </p>
            `;
        }
    }
</script>
@endsection