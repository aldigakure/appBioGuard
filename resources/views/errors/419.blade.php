<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Sesi Kadaluarsa | BioGuard</title>
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
                        amber: { 50: '#fffbeb', 100: '#fef3c7', 200: '#fde68a', 500: '#f59e0b', 700: '#b45309' },
                        earth: { 100: '#f2e8e5', 200: '#eaddd7', 500: '#bfa094' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fall-leaf': 'fallLeaf 4s ease-in-out infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        fallLeaf: { '0%': { transform: 'translateY(0) rotate(0deg)', opacity: '1' }, '100%': { transform: 'translateY(30px) rotate(45deg)', opacity: '0.3' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-autumn { background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 30%, #fef3c7 60%, #f0fdf4 100%); }
        .text-gradient-autumn { background: linear-gradient(135deg, #d97706, #a18072); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .falling-leaf { position: absolute; animation: fallLeaf 4s ease-in-out infinite; }
    </style>
</head>
<body class="bg-autumn min-h-screen overflow-x-hidden relative">
    <!-- Falling Leaves -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <span class="falling-leaf text-2xl" style="left:15%;top:20%;animation-delay:0s">🍂</span>
        <span class="falling-leaf text-xl" style="left:45%;top:15%;animation-delay:1s">🍁</span>
        <span class="falling-leaf text-2xl" style="left:75%;top:25%;animation-delay:2s">🍂</span>
        <span class="falling-leaf text-xl" style="left:85%;top:10%;animation-delay:0.5s">🍁</span>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none" style="filter: drop-shadow(0 10px 20px rgba(217, 119, 6, 0.15));">
                <path d="M70 40 L130 40 L130 50 L115 80 L115 120 L130 150 L130 160 L70 160 L70 150 L85 120 L85 80 L70 50 Z" fill="none" stroke="#D97706" stroke-width="3"/>
                <path d="M80 55 L120 55 L105 80 L105 85 L95 85 L95 80 Z" fill="#F59E0B" opacity="0.8"/>
                <ellipse cx="100" cy="140" rx="20" ry="10" fill="#F59E0B" opacity="0.5"/>
                <line x1="100" y1="90" x2="100" y2="110" stroke="#F59E0B" stroke-width="2"/>
                <ellipse cx="100" cy="180" rx="80" ry="12" fill="#EAB308" opacity="0.3"/>
                <rect x="158" y="130" width="4" height="40" fill="#22C55E"/>
                <circle cx="160" cy="120" r="12" fill="#F472B6" opacity="0.6"/>
                <circle cx="160" cy="120" r="5" fill="#D97706"/>
            </svg>
            <span class="absolute -top-2 -right-2 text-3xl animate-float">⏳</span>
            <span class="absolute top-1/3 -left-6 text-2xl animate-fall-leaf">🍂</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-gradient-to-r from-amber-100 to-earth-100 rounded-full text-amber-700 font-display font-bold text-xl tracking-wider mb-6">
            ERROR 419 | HALAMAN KADALUARSA
        </span>


       
</body>
</html>
