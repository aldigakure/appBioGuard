<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | BioGuard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/dinacom_notext.webp') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: { 50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                        sky: { 50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 2s infinite',
                        'flutter': 'flutter 3s ease-in-out infinite',
                        'leaf-fall': 'leafFall 10s linear infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } },
                        flutter: { '0%, 100%': { transform: 'translateY(0) rotate(0deg)' }, '50%': { transform: 'translateY(-10px) rotate(5deg)' } },
                        leafFall: { '0%': { transform: 'translateY(-100px) rotate(0deg)', opacity: '0' }, '10%': { opacity: '1' }, '90%': { opacity: '1' }, '100%': { transform: 'translateY(100vh) rotate(720deg)', opacity: '0' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-nature { background: linear-gradient(135deg, #f0fdf4 0%, #ecfeff 25%, #f0f9ff 50%, #fdf8f6 75%, #f0fdf4 100%); }
        .text-gradient-nature { background: linear-gradient(135deg, #16a34a, #0ea5e9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .leaf-particle { position: absolute; font-size: 1.5rem; animation: leafFall 10s linear infinite; opacity: 0; }
    </style>
</head>
<body class="bg-nature min-h-screen overflow-x-hidden relative">
    <!-- Floating Nature Elements -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <span class="leaf-particle" style="left: 10%; animation-delay: 0s;">🍃</span>
        <span class="leaf-particle" style="left: 30%; animation-delay: 2s;">🌿</span>
        <span class="leaf-particle" style="left: 50%; animation-delay: 4s;">🍂</span>
        <span class="leaf-particle" style="left: 70%; animation-delay: 1s;">🍃</span>
        <span class="leaf-particle" style="left: 90%; animation-delay: 3s;">🌱</span>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Nature Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 10px 20px rgba(22, 163, 74, 0.2));">
                <ellipse cx="100" cy="180" rx="90" ry="15" fill="url(#groundGradient)" opacity="0.6"/>
                <rect x="92" y="120" width="16" height="60" fill="url(#trunkGradient)" rx="3"/>
                <ellipse cx="100" cy="70" rx="45" ry="40" fill="url(#foliageGradient1)"/>
                <ellipse cx="85" cy="85" rx="30" ry="28" fill="url(#foliageGradient2)"/>
                <ellipse cx="115" cy="85" rx="30" ry="28" fill="url(#foliageGradient2)"/>
                <ellipse cx="100" cy="55" rx="35" ry="30" fill="url(#foliageGradient3)"/>
                <rect x="35" y="150" width="8" height="30" fill="#8B7355" rx="2"/>
                <ellipse cx="39" cy="135" rx="18" ry="20" fill="#34D399"/>
                <ellipse cx="39" cy="128" rx="14" ry="15" fill="#10B981"/>
                <rect x="157" y="150" width="8" height="30" fill="#8B7355" rx="2"/>
                <ellipse cx="161" cy="138" rx="16" ry="18" fill="#34D399"/>
                <ellipse cx="161" cy="132" rx="12" ry="13" fill="#10B981"/>
                <g class="animate-flutter" style="transform-origin: 150px 50px;">
                    <path d="M145 48 Q148 45 150 48 Q152 45 155 48 Q152 51 150 48 Q148 51 145 48" fill="#F472B6"/>
                    <path d="M145 52 Q148 55 150 52 Q152 55 155 52 Q152 49 150 52 Q148 49 145 52" fill="#A78BFA"/>
                </g>
                <g class="animate-flutter" style="transform-origin: 55px 40px; animation-delay: 1s;">
                    <path d="M50 38 Q53 35 55 38 Q57 35 60 38 Q57 41 55 38 Q53 41 50 38" fill="#FBBF24"/>
                    <path d="M50 42 Q53 45 55 42 Q57 45 60 42 Q57 39 55 42 Q53 39 50 42" fill="#FB923C"/>
                </g>
                <circle cx="50" cy="170" r="5" fill="#F472B6"/><circle cx="50" cy="170" r="2" fill="#FBBF24"/>
                <circle cx="150" cy="168" r="5" fill="#A78BFA"/><circle cx="150" cy="168" r="2" fill="#FCD34D"/>
                <circle cx="75" cy="175" r="4" fill="#60A5FA"/><circle cx="75" cy="175" r="1.5" fill="#FDE047"/>
                <circle cx="130" cy="173" r="4" fill="#4ADE80"/><circle cx="130" cy="173" r="1.5" fill="#FBBF24"/>
                <defs>
                    <linearGradient id="groundGradient" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#86EFAC"/><stop offset="50%" stop-color="#4ADE80"/><stop offset="100%" stop-color="#86EFAC"/></linearGradient>
                    <linearGradient id="trunkGradient" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#A8896C"/><stop offset="100%" stop-color="#6B5344"/></linearGradient>
                    <linearGradient id="foliageGradient1" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#22C55E"/><stop offset="100%" stop-color="#15803D"/></linearGradient>
                    <linearGradient id="foliageGradient2" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#4ADE80"/><stop offset="100%" stop-color="#22C55E"/></linearGradient>
                    <linearGradient id="foliageGradient3" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#86EFAC"/><stop offset="100%" stop-color="#4ADE80"/></linearGradient>
                </defs>
            </svg>
            <span class="absolute -top-2 -right-2 text-3xl animate-float">🦋</span>
            <span class="absolute top-1/4 -left-4 text-2xl animate-float-delayed">🌸</span>
            <span class="absolute -bottom-2 -right-4 text-2xl animate-float" style="animation-delay: 1s;">🌺</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-gradient-to-r from-forest-100 to-sky-100 rounded-full text-forest-700 font-display font-bold text-xl tracking-wider mb-6">
             404 | HALAMAN TIDAK DITEMUKAN
        </span>

      
      
</body>
</html>
