<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOGUARD - AI-Powered Biodiversity Protection</title>
    <meta name="description" content="BIOGUARD adalah platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <style>
        :root {
            --primary-50: #ecfdf5;
            --primary-100: #d1fae5;
            --primary-200: #a7f3d0;
            --primary-300: #6ee7b7;
            --primary-400: #34d399;
            --primary-500: #10b981;
            --primary-600: #059669;
            --primary-700: #047857;
            --primary-800: #065f46;
            --primary-900: #064e3b;
            --primary-950: #022c22;
            
            --accent-400: #22d3ee;
            --accent-500: #06b6d4;
            --accent-600: #0891b2;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #fafafa;
            color: #1a1a1a;
            line-height: 1.6;
        }
        
        .font-heading {
            font-family: 'Outfit', system-ui, sans-serif;
        }
        
        /* Mesh Gradient Background */
        .bg-mesh {
            background: 
                radial-gradient(at 40% 20%, rgba(16, 185, 129, 0.25) 0px, transparent 50%),
                radial-gradient(at 80% 0%, rgba(6, 182, 212, 0.25) 0px, transparent 50%),
                radial-gradient(at 0% 50%, rgba(16, 185, 129, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 50%, rgba(6, 182, 212, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(16, 185, 129, 0.2) 0px, transparent 50%),
                radial-gradient(at 80% 100%, rgba(6, 182, 212, 0.15) 0px, transparent 50%),
                linear-gradient(180deg, #f0fdf4 0%, #ecfeff 100%);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-600), var(--accent-500));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.3); }
            50% { box-shadow: 0 0 40px rgba(16, 185, 129, 0.5); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        /* Card Hover Effect */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.15);
        }
        
        /* Navigation */
        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1rem 2rem;
            transition: all 0.3s ease;
        }
        
        .nav-scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-700);
            text-decoration: none;
        }
        
        .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary-500), var(--accent-500));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        
        .nav-link {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-600);
        }
        
        .nav-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-outline {
            background: transparent;
            color: var(--primary-700);
            border: 2px solid var(--primary-200);
        }
        
        .btn-outline:hover {
            background: var(--primary-50);
            border-color: var(--primary-400);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }
        
        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        
        .hero-content {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-700);
            padding: 0.5rem 1rem;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: 3.75rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: #111827;
        }
        
        .hero-description {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 2rem;
            max-width: 540px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .hero-visual {
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.2s backwards;
        }
        
        .hero-image {
            width: 100%;
            max-width: 600px;
            border-radius: 24px;
            box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.2);
        }
        
        .hero-blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.3), rgba(6, 182, 212, 0.3));
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .floating-card {
            position: absolute;
            background: white;
            padding: 1rem 1.25rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-card-1 {
            top: 10%;
            right: -10%;
            animation-delay: 0s;
        }
        
        .floating-card-2 {
            bottom: 15%;
            left: -5%;
            animation-delay: 2s;
        }
        
        .floating-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        /* Section Styles */
        .section {
            padding: 6rem 2rem;
        }
        
        .section-container {
            max-width: 1280px;
            margin: 0 auto;
        }
        
        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 4rem;
        }
        
        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-700);
            padding: 0.5rem 1rem;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #111827;
        }
        
        .section-description {
            font-size: 1.125rem;
            color: #6b7280;
        }
        
        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.25rem;
        }
        
        .feature-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #111827;
        }
        
        .feature-description {
            font-size: 0.95rem;
            color: #6b7280;
            line-height: 1.6;
        }
        
        /* Icon Colors */
        .icon-green { background: linear-gradient(135deg, #d1fae5, #a7f3d0); }
        .icon-cyan { background: linear-gradient(135deg, #cffafe, #a5f3fc); }
        .icon-amber { background: linear-gradient(135deg, #fef3c7, #fde68a); }
        .icon-rose { background: linear-gradient(135deg, #fce7f3, #fbcfe8); }
        .icon-violet { background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
        .icon-blue { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
        .icon-orange { background: linear-gradient(135deg, #ffedd5, #fed7aa); }
        .icon-lime { background: linear-gradient(135deg, #ecfccb, #d9f99d); }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-800));
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            position: relative;
            z-index: 1;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff, #a7f3d0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 500;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfeff 50%, #f0f9ff 100%);
            position: relative;
        }
        
        .cta-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }
        
        .cta-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #111827;
        }
        
        .cta-description {
            font-size: 1.125rem;
            color: #6b7280;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        /* Footer */
        .footer {
            background: #111827;
            color: white;
            padding: 4rem 2rem 2rem;
        }
        
        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-brand {
            max-width: 300px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }
        
        .footer-description {
            color: #9ca3af;
            font-size: 0.95rem;
            line-height: 1.7;
        }
        
        .footer-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: white;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-400);
        }
        
        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .footer-copyright {
            color: #9ca3af;
            font-size: 0.875rem;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: var(--primary-600);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .hero-content {
                order: 1;
            }
            
            .hero-visual {
                order: 0;
                margin-bottom: 2rem;
            }
            
            .hero-title {
                font-size: 2.75rem;
            }
            
            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .floating-card {
                display: none;
            }
            
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-title {
                font-size: 2.25rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="nav-container" id="navbar">
        <div class="nav-inner">
            <a href="/" class="logo">
                <div class="logo-icon">🌿</div>
                BIOGUARD
            </a>
            
            <div class="nav-links">
                <a href="#features" class="nav-link">Fitur</a>
                <a href="#entities" class="nav-link">Entitas</a>
                <a href="#stats" class="nav-link">Statistik</a>
                <a href="#about" class="nav-link">Tentang</a>
            </div>
            
            <div class="nav-buttons">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-mesh">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span>🤖</span>
                    <span>Powered by AI</span>
                </div>
                <h1 class="hero-title">
                    Lindungi <span class="text-gradient">Keanekaragaman Hayati</span> Indonesia
                </h1>
                <p class="hero-description">
                    Platform pemantauan dan perlindungan biodiversitas berbasis AI untuk konservasi alam Indonesia. Pantau spesies, laporkan ancaman, dan bergabung dalam program reboisasi.
                </p>
                <div class="hero-buttons">
                    <a href="#features" class="btn btn-primary btn-large">
                        Mulai Sekarang
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#about" class="btn btn-outline btn-large">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-blob"></div>
                <svg width="100%" viewBox="0 0 600 500" fill="none" xmlns="http://www.w3.org/2000/svg" class="hero-image">
                    <rect width="600" height="500" rx="24" fill="url(#heroGradient)"/>
                    <defs>
                        <linearGradient id="heroGradient" x1="0" y1="0" x2="600" y2="500">
                            <stop offset="0%" stop-color="#10b981"/>
                            <stop offset="100%" stop-color="#06b6d4"/>
                        </linearGradient>
                    </defs>
                    <!-- Forest illustration -->
                    <path d="M0 350 Q150 300 300 350 T600 350 L600 500 L0 500 Z" fill="#065f46" opacity="0.3"/>
                    <path d="M0 380 Q150 330 300 380 T600 380 L600 500 L0 500 Z" fill="#047857" opacity="0.5"/>
                    <path d="M0 420 Q150 370 300 420 T600 420 L600 500 L0 500 Z" fill="#059669" opacity="0.7"/>
                    <!-- Trees -->
                    <path d="M100 450 L130 350 L160 450 Z" fill="#065f46"/>
                    <path d="M200 450 L240 320 L280 450 Z" fill="#047857"/>
                    <path d="M350 450 L400 280 L450 450 Z" fill="#065f46"/>
                    <path d="M480 450 L520 340 L560 450 Z" fill="#047857"/>
                    <!-- Sun -->
                    <circle cx="480" cy="120" r="60" fill="#fbbf24" opacity="0.8"/>
                    <!-- Birds -->
                    <path d="M150 150 Q165 140 180 150" stroke="white" stroke-width="3" fill="none"/>
                    <path d="M200 120 Q215 110 230 120" stroke="white" stroke-width="3" fill="none"/>
                    <path d="M170 180 Q185 170 200 180" stroke="white" stroke-width="3" fill="none"/>
                    <!-- Clouds -->
                    <ellipse cx="100" cy="80" rx="50" ry="25" fill="white" opacity="0.6"/>
                    <ellipse cx="130" cy="80" rx="40" ry="20" fill="white" opacity="0.6"/>
                    <ellipse cx="350" cy="60" rx="45" ry="22" fill="white" opacity="0.5"/>
                    <ellipse cx="380" cy="60" rx="35" ry="18" fill="white" opacity="0.5"/>
                    <!-- Wildlife icons -->
                    <text x="300" y="250" font-size="80" text-anchor="middle">🦋</text>
                    <text x="450" y="200" font-size="50" text-anchor="middle">🦜</text>
                    <text x="150" y="280" font-size="50" text-anchor="middle">🦎</text>
                </svg>
                
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
                    BIOGUARD mengelola 15 entitas utama yang saling terintegrasi untuk pemantauan dan perlindungan keanekaragaman hayati secara komprehensif.
                </p>
            </div>
            
            <div class="features-grid">
                <!-- 1. User -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-green">👤</div>
                    <h3 class="feature-title">User</h3>
                    <p class="feature-description">Manajemen pengguna platform termasuk profil, preferensi, dan riwayat aktivitas dalam sistem BIOGUARD.</p>
                </div>
                
                <!-- 2. Role -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-violet">🔐</div>
                    <h3 class="feature-title">Role</h3>
                    <p class="feature-description">Sistem peran dan hak akses untuk mengatur izin pengguna seperti Admin, Researcher, dan Volunteer.</p>
                </div>
                
                <!-- 3. Species -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-lime">🦋</div>
                    <h3 class="feature-title">Species (Flora & Fauna)</h3>
                    <p class="feature-description">Database lengkap spesies flora dan fauna termasuk taksonomi, status konservasi, dan karakteristik.</p>
                </div>
                
                <!-- 4. Observation -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-cyan">🔭</div>
                    <h3 class="feature-title">Observation</h3>
                    <p class="feature-description">Pencatatan observasi lapangan dengan lokasi GPS, waktu, kondisi cuaca, dan detail pengamatan.</p>
                </div>
                
                <!-- 5. Media -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-rose">📸</div>
                    <h3 class="feature-title">Media (Foto, Video, Audio)</h3>
                    <p class="feature-description">Penyimpanan dan pengelolaan media dokumentasi termasuk foto, video, dan rekaman audio spesies.</p>
                </div>
                
                <!-- 6. Habitat -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-green">🌳</div>
                    <h3 class="feature-title">Habitat</h3>
                    <p class="feature-description">Informasi habitat alami termasuk tipe ekosistem, kondisi lingkungan, dan peta sebaran geografis.</p>
                </div>
                
                <!-- 7. Environmental Data -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-blue">🌡️</div>
                    <h3 class="feature-title">Environmental Data</h3>
                    <p class="feature-description">Data lingkungan real-time seperti suhu, kelembaban, curah hujan, dan kualitas udara dari sensor IoT.</p>
                </div>
                
                <!-- 8. Threat / Incident -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-orange">⚠️</div>
                    <h3 class="feature-title">Threat / Incident</h3>
                    <p class="feature-description">Pelaporan dan tracking ancaman seperti kebakaran hutan, perburuan liar, dan kerusakan habitat.</p>
                </div>
                
                <!-- 9. AI Analysis Result -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-violet">🤖</div>
                    <h3 class="feature-title">AI Analysis Result</h3>
                    <p class="feature-description">Hasil analisis AI untuk identifikasi spesies, deteksi ancaman, dan prediksi tren populasi.</p>
                </div>
                
                <!-- 10. Reforestation Program -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-lime">🌱</div>
                    <h3 class="feature-title">Reforestation Program</h3>
                    <p class="feature-description">Program penanaman pohon dan restorasi habitat termasuk tracking progress dan impact measurement.</p>
                </div>
                
                <!-- 11. Volunteer Activity -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-cyan">🤝</div>
                    <h3 class="feature-title">Volunteer Activity</h3>
                    <p class="feature-description">Manajemen kegiatan relawan termasuk pendaftaran, penjadwalan, dan pencatatan kontribusi.</p>
                </div>
                
                <!-- 12. Gamification -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-amber">🏆</div>
                    <h3 class="feature-title">Gamification</h3>
                    <p class="feature-description">Sistem poin, badge, dan leaderboard untuk meningkatkan engagement dan motivasi pengguna.</p>
                </div>
                
                <!-- 13. Region / Location -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-blue">📍</div>
                    <h3 class="feature-title">Region / Location</h3>
                    <p class="feature-description">Pengelolaan wilayah geografis termasuk zona konservasi, taman nasional, dan area lindung.</p>
                </div>
                
                <!-- 14. Notification -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-rose">🔔</div>
                    <h3 class="feature-title">Notification</h3>
                    <p class="feature-description">Sistem notifikasi real-time untuk alert ancaman, update observasi, dan pengingat kegiatan.</p>
                </div>
                
                <!-- 15. Report / Citizen Report -->
                <div class="feature-card card-hover">
                    <div class="feature-icon icon-orange">📋</div>
                    <h3 class="feature-title">Report / Citizen Report</h3>
                    <p class="feature-description">Laporan warga dan citizen science untuk melaporkan temuan, sighting, dan insiden lingkungan.</p>
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
                    <p class="feature-description">Identifikasi otomatis spesies dari foto menggunakan machine learning dengan akurasi tinggi.</p>
                </div>
                
                <div class="feature-card card-hover" style="background: linear-gradient(135deg, #fef3c7, #ffedd5);">
                    <div class="feature-icon icon-amber">📊</div>
                    <h3 class="feature-title">Real-time Analytics</h3>
                    <p class="feature-description">Dashboard analitik real-time untuk monitoring populasi dan tren biodiversitas.</p>
                </div>
                
                <div class="feature-card card-hover" style="background: linear-gradient(135deg, #fce7f3, #ede9fe);">
                    <div class="feature-icon icon-rose">🗺️</div>
                    <h3 class="feature-title">GIS Mapping</h3>
                    <p class="feature-description">Peta interaktif dengan tracking GPS untuk visualisasi sebaran spesies dan habitat.</p>
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
                    Jadilah bagian dari gerakan perlindungan keanekaragaman hayati Indonesia. Daftar sekarang dan mulai berkontribusi!
                </p>
                <div class="cta-buttons">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-large">
                            Daftar Gratis
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <div class="logo-icon">🌿</div>
                        BIOGUARD
                    </div>
                    <p class="footer-description">
                        Platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk masa depan alam Indonesia yang lebih baik.
                    </p>
                </div>
                
                <div>
                    <h4 class="footer-title">Platform</h4>
                    <ul class="footer-links">
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#entities">Entitas</a></li>
                        <li><a href="#stats">Statistik</a></li>
                        <li><a href="#">API Docs</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="footer-title">Komunitas</h4>
                    <ul class="footer-links">
                        <li><a href="#">Volunteer</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="footer-title">Legal</h4>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">
                    © 2026 BIOGUARD. All rights reserved. Made with 💚 for Indonesia.
                </p>
                <div class="footer-social">
                    <a href="#" class="social-link" title="Twitter">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link" title="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link" title="GitHub">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.remove('nav-scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
