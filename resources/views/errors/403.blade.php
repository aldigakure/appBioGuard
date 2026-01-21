<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | BioGuard</title>
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
                        forest: { 50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                        amber: { 50: '#fffbeb', 100: '#fef3c7', 200: '#fde68a', 500: '#f59e0b', 600: '#d97706', 700: '#b45309' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'shake': 'shake 0.5s ease-in-out infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        shake: { '0%, 100%': { transform: 'translateX(0)' }, '25%': { transform: 'translateX(-3px)' }, '75%': { transform: 'translateX(3px)' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-nature { background: linear-gradient(135deg, #fef3c7 0%, #f0fdf4 50%, #e0f2fe 100%); }
        .text-gradient-warning { background: linear-gradient(135deg, #d97706, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-nature min-h-screen overflow-x-hidden relative">
    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none" style="filter: drop-shadow(0 10px 20px rgba(217, 119, 6, 0.15));">
                <rect x="85" y="100" width="10" height="80" fill="#8B7355" rx="2"/>
                <rect x="60" y="45" width="80" height="60" fill="#FEF3C7" rx="8" stroke="#D97706" stroke-width="3"/>
                <text x="100" y="70" text-anchor="middle" fill="#D97706" font-size="12" font-weight="bold">KAWASAN</text>
                <text x="100" y="85" text-anchor="middle" fill="#D97706" font-size="12" font-weight="bold">DILINDUNGI</text>
                <text x="100" y="105" text-anchor="middle" fill="#D97706" font-size="20"></text>
                <ellipse cx="100" cy="180" rx="80" ry="12" fill="#86EFAC" opacity="0.6"/>
                <rect x="20" y="140" width="6" height="40" fill="#A8896C" rx="1"/>
                <rect x="40" y="140" width="6" height="40" fill="#A8896C" rx="1"/>
                <rect x="154" y="140" width="6" height="40" fill="#A8896C" rx="1"/>
                <rect x="174" y="140" width="6" height="40" fill="#A8896C" rx="1"/>
                <rect x="18" y="145" width="35" height="4" fill="#8B7355"/>
                <rect x="18" y="160" width="35" height="4" fill="#8B7355"/>
                <rect x="147" y="145" width="35" height="4" fill="#8B7355"/>
                <rect x="147" y="160" width="35" height="4" fill="#8B7355"/>
                <ellipse cx="30" cy="125" rx="15" ry="18" fill="#22C55E"/>
                <ellipse cx="170" cy="125" rx="15" ry="18" fill="#22C55E"/>
                <circle cx="55" cy="172" r="4" fill="#F472B6"/><circle cx="55" cy="172" r="1.5" fill="#FBBF24"/>
                <circle cx="145" cy="170" r="4" fill="#A78BFA"/><circle cx="145" cy="170" r="1.5" fill="#FCD34D"/>
            </svg>
            <span class="absolute -top-2 -right-2 text-3xl animate-shake">⚠️</span>
            <span class="absolute top-1/4 -left-4 text-2xl animate-float">🌳</span>
            <span class="absolute top-0 right-1/4 text-xl animate-float" style="animation-delay: 1s;">🦅</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-gradient-to-r from-amber-100 to-amber-200 rounded-full text-amber-700 font-display font-bold text-xl tracking-wider mb-6">
            ERROR 403 | AKSES DI TOLAK
        </span>

       


      
</body>
</html>
