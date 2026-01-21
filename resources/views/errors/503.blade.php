<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Layanan Tidak Tersedia | BioGuard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/dinacom_notext.webp') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: { 50: '#f0fdf4', 200: '#bbf7d0', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                        sky: { 50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 500: '#0ea5e9', 700: '#0369a1' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'rain': 'rain 1s linear infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        rain: { '0%': { transform: 'translateY(-10px)', opacity: '0' }, '50%': { opacity: '1' }, '100%': { transform: 'translateY(20px)', opacity: '0' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-rain { background: linear-gradient(180deg, #94a3b8 0%, #cbd5e1 30%, #e0f2fe 60%, #f0fdf4 100%); }
        .text-gradient-rain { background: linear-gradient(135deg, #0284c7, #0ea5e9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .raindrop { position: absolute; width: 2px; height: 15px; background: linear-gradient(to bottom, transparent, #60a5fa); border-radius: 0 0 2px 2px; animation: rain 1s linear infinite; }
    </style>
</head>
<body class="bg-rain min-h-screen overflow-x-hidden relative">
    <!-- Rain Effect -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <span class="raindrop" style="left:10%;animation-delay:0s"></span>
        <span class="raindrop" style="left:20%;animation-delay:.2s"></span>
        <span class="raindrop" style="left:30%;animation-delay:.4s"></span>
        <span class="raindrop" style="left:50%;animation-delay:.3s"></span>
        <span class="raindrop" style="left:70%;animation-delay:.15s"></span>
        <span class="raindrop" style="left:90%;animation-delay:.25s"></span>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none" style="filter: drop-shadow(0 10px 20px rgba(14, 165, 233, 0.15));">
                <ellipse cx="100" cy="50" rx="50" ry="25" fill="#94A3B8"/>
                <ellipse cx="70" cy="45" rx="30" ry="18" fill="#CBD5E1"/>
                <ellipse cx="130" cy="48" rx="28" ry="16" fill="#CBD5E1"/>
                <ellipse cx="100" cy="40" rx="35" ry="20" fill="#E2E8F0"/>
                <line x1="70" y1="70" x2="70" y2="85" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                <line x1="90" y1="75" x2="90" y2="90" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                <line x1="110" y1="73" x2="110" y2="88" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                <line x1="130" y1="70" x2="130" y2="85" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                <ellipse cx="100" cy="180" rx="85" ry="15" fill="#86EFAC" opacity="0.6"/>
                <rect x="95" y="120" width="10" height="50" fill="#8B7355" rx="2"/>
                <path d="M60 115 Q100 80 140 115 Q100 105 60 115" fill="#22C55E"/>
                <path d="M65 118 Q100 88 135 118 Q100 108 65 118" fill="#16A34A"/>
                <ellipse cx="75" cy="165" rx="10" ry="7" fill="#A78BFA"/>
                <ellipse cx="125" cy="165" rx="8" ry="6" fill="#FCD34D"/>
                <g class="animate-spin-slow" style="transform-origin: 160px 100px;">
                    <circle cx="160" cy="100" r="15" fill="none" stroke="#64748B" stroke-width="3"/>
                    <rect x="156" y="85" width="8" height="6" fill="#64748B" rx="1"/>
                    <rect x="156" y="109" width="8" height="6" fill="#64748B" rx="1"/>
                    <rect x="145" y="96" width="6" height="8" fill="#64748B" rx="1"/>
                    <rect x="169" y="96" width="6" height="8" fill="#64748B" rx="1"/>
                </g>
                <circle cx="50" cy="173" r="4" fill="#F472B6"/><circle cx="50" cy="173" r="1.5" fill="#FBBF24"/>
                <circle cx="150" cy="172" r="4" fill="#34D399"/><circle cx="150" cy="172" r="1.5" fill="#FCD34D"/>
            </svg>
            <span class="absolute -top-2 -right-2 text-3xl animate-float">🌧️</span>
            <span class="absolute top-1/3 -left-6 text-2xl">🔧</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-gradient-to-r from-sky-100 to-sky-200 rounded-full text-sky-700 font-display font-bold text-xl tracking-wider mb-6">
            ERROR 503 | SERVER SEDANG DALAM Pemeliharaan
        </span>

       
</body>
</html>
