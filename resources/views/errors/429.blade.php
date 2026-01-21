<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 - Terlalu Banyak Permintaan | BioGuard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/dinacom_notext.png') }}">
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
                        rose: { 50: '#fff1f2', 100: '#ffe4e6', 200: '#fecdd3', 500: '#f43f5e', 700: '#be123c' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'hop': 'hop 1s ease-in-out infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        hop: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-10px)' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-busy { background: linear-gradient(135deg, #f0fdf4 0%, #ffe4e6 50%, #e0f2fe 100%); }
        .text-gradient-busy { background: linear-gradient(135deg, #e11d48, #f43f5e); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-busy min-h-screen overflow-x-hidden relative">
    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none" style="filter: drop-shadow(0 10px 20px rgba(244, 63, 94, 0.15));">
                <ellipse cx="100" cy="80" rx="45" ry="50" fill="#FDE68A"/>
                <path d="M60 60 Q100 50 140 60" stroke="#F59E0B" stroke-width="3" fill="none"/>
                <path d="M55 80 Q100 70 145 80" stroke="#F59E0B" stroke-width="3" fill="none"/>
                <path d="M55 100 Q100 90 145 100" stroke="#F59E0B" stroke-width="3" fill="none"/>
                <ellipse cx="100" cy="115" rx="15" ry="12" fill="#854D0E"/>
                <rect x="95" y="25" width="10" height="20" fill="#8B7355"/>
                <path d="M70 20 Q100 30 130 20" stroke="#8B7355" stroke-width="8" fill="none"/>
                <g class="animate-hop" style="animation-delay: 0s;">
                    <ellipse cx="45" cy="70" rx="8" ry="6" fill="#FCD34D"/>
                    <ellipse cx="45" cy="70" rx="3" ry="4" fill="#1F2937"/>
                </g>
                <g class="animate-hop" style="animation-delay: 0.3s;">
                    <ellipse cx="155" cy="65" rx="8" ry="6" fill="#FCD34D"/>
                    <ellipse cx="155" cy="65" rx="3" ry="4" fill="#1F2937"/>
                </g>
                <g class="animate-hop" style="animation-delay: 0.6s;">
                    <ellipse cx="70" cy="45" rx="7" ry="5" fill="#FCD34D"/>
                    <ellipse cx="70" cy="45" rx="2.5" ry="3.5" fill="#1F2937"/>
                </g>
                <g class="animate-hop" style="animation-delay: 0.9s;">
                    <ellipse cx="135" cy="40" rx="7" ry="5" fill="#FCD34D"/>
                    <ellipse cx="135" cy="40" rx="2.5" ry="3.5" fill="#1F2937"/>
                </g>
                <ellipse cx="100" cy="180" rx="80" ry="12" fill="#86EFAC" opacity="0.6"/>
                <circle cx="50" cy="172" r="5" fill="#F472B6"/><circle cx="50" cy="172" r="2" fill="#FBBF24"/>
                <circle cx="150" cy="170" r="5" fill="#A78BFA"/><circle cx="150" cy="170" r="2" fill="#FCD34D"/>
                <circle cx="80" cy="175" r="4" fill="#60A5FA"/><circle cx="80" cy="175" r="1.5" fill="#FDE047"/>
                <circle cx="120" cy="173" r="4" fill="#4ADE80"/><circle cx="120" cy="173" r="1.5" fill="#FBBF24"/>
            </svg>
            <span class="absolute -top-2 -right-2 text-3xl animate-bounce-slow">🐝</span>
            <span class="absolute top-1/3 -left-6 text-2xl animate-float">🌻</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-gradient-to-r from-rose-100 to-rose-200 rounded-full text-rose-700 font-display font-bold text-xl tracking-wider mb-6">
            ERROR 429 | SERVER SEDANG SIBUK
        </span>

       
    
</body>
</html>
