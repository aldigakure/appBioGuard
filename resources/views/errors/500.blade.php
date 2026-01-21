<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | BioGuard</title>
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
                        forest: { 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                        sunset: { 200: '#fed7aa', 300: '#fdba74', 400: '#fb923c' }
                    },
                    fontFamily: { display: ['Outfit'], body: ['Nunito'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'sleep': 'sleep 3s ease-in-out infinite',
                        'twinkle': 'twinkle 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        sleep: { '0%, 100%': { opacity: '0.3', transform: 'translateY(0)' }, '50%': { opacity: '1', transform: 'translateY(-10px)' } },
                        twinkle: { '0%, 100%': { opacity: '0.3' }, '50%': { opacity: '1' } }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        h1, .font-display { font-family: 'Outfit', sans-serif; }
        .bg-night { background: linear-gradient(180deg, #1e3a5f 0%, #0a1929 60%, #14532d 100%); }
        .text-gradient-moon { background: linear-gradient(135deg, #fef3c7, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .star { position: absolute; animation: twinkle 2s ease-in-out infinite; }
        .firefly { position: absolute; width: 4px; height: 4px; background: #fef08a; border-radius: 50%; animation: twinkle 2s ease-in-out infinite; box-shadow: 0 0 10px #fef08a; }
    </style>
</head>
<body class="bg-night min-h-screen overflow-x-hidden relative">
    <!-- Stars & Fireflies -->
    <div class="fixed inset-0 pointer-events-none">
        <span class="star text-white text-xs" style="left:10%;top:15%">✦</span>
        <span class="star text-white text-xs" style="left:25%;top:8%;animation-delay:.5s">✧</span>
        <span class="star text-yellow-200 text-sm" style="left:45%;top:12%;animation-delay:1s">★</span>
        <span class="star text-white text-xs" style="left:75%;top:18%;animation-delay:.8s">✧</span>
        <span class="star text-white text-xs" style="left:85%;top:10%;animation-delay:1.2s">✦</span>
        <span class="firefly" style="left:20%;top:60%"></span>
        <span class="firefly" style="left:65%;top:65%;animation-delay:1s"></span>
        <span class="firefly" style="left:80%;top:75%;animation-delay:.7s"></span>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative z-10">
        <!-- Night Scene Illustration -->
        <div class="relative mb-8">
            <svg class="w-48 h-48 md:w-64 md:h-64 mx-auto" viewBox="0 0 200 200" fill="none">
                <circle cx="100" cy="60" r="35" fill="url(#moon)" style="filter:drop-shadow(0 0 30px rgba(253,230,138,0.4))"/>
                <circle cx="90" cy="50" r="5" fill="#F59E0B" opacity="0.3"/>
                <circle cx="105" cy="65" r="7" fill="#F59E0B" opacity="0.2"/>
                <text x="140" y="45" fill="#FEF3C7" font-size="14" font-weight="bold" class="animate-sleep">z</text>
                <text x="152" y="35" fill="#FEF3C7" font-size="18" font-weight="bold" class="animate-sleep" style="animation-delay:.5s">Z</text>
                <text x="168" y="22" fill="#FEF3C7" font-size="22" font-weight="bold" class="animate-sleep" style="animation-delay:1s">Z</text>
                <path d="M0 170 Q50 150, 100 160 Q150 170, 200 155 L200 200 L0 200 Z" fill="#166534"/>
                <path d="M0 180 Q60 165, 120 175 Q180 185, 200 170 L200 200 L0 200 Z" fill="#15803D"/>
                <rect x="85" y="130" width="12" height="40" fill="#5D4E37" rx="3"/>
                <ellipse cx="91" cy="110" rx="30" ry="28" fill="#166534"/>
                <ellipse cx="91" cy="95" rx="22" ry="20" fill="#22C55E"/>
                <ellipse cx="110" cy="105" rx="10" ry="12" fill="#8B7355"/>
                <path d="M106 101 Q108 103 110 101" stroke="#5D4E37" stroke-width="1.5" fill="none"/>
                <path d="M110 101 Q112 103 114 101" stroke="#5D4E37" stroke-width="1.5" fill="none"/>
                <ellipse cx="110" cy="106" rx="2" ry="1.5" fill="#F97316"/>
                <defs><radialGradient id="moon" cx="40%" cy="40%"><stop offset="0%" stop-color="#FEF3C7"/><stop offset="100%" stop-color="#FBBF24"/></radialGradient></defs>
            </svg>
            <span class="absolute -top-2 -right-4 text-2xl animate-float">🌙</span>
            <span class="absolute top-1/3 -left-6 text-xl animate-float" style="animation-delay:1s">🦉</span>
        </div>

        <!-- Error Badge -->
        <span class="inline-block px-6 py-2 bg-sunset-200/20 rounded-full text-sunset-200 font-display font-bold text-xl tracking-wider border border-sunset-400/30 mb-6">
            ERROR 500 | SERVER SEDANG TERGANGGU
        </span>

       

      
</body>
</html>
