<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <title>BIOGUARD - AI-Powered Biodiversity Protection Platform Indonesia</title>
    <meta name="title" content="BIOGUARD - AI-Powered Biodiversity Protection Platform Indonesia">
    <meta name="description" content="BIOGUARD adalah platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia. Identifikasi spesies, pantau habitat, dan bergabung dalam program reboisasi.">
    <meta name="keywords" content="BIOGUARD, biodiversity, keanekaragaman hayati, konservasi, flora, fauna, Indonesia, AI, machine learning, identifikasi spesies, peta interaktif, reboisasi, lingkungan, ekosistem">
    <meta name="author" content="BIOGUARD Team">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesian">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/dinacom_notext.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/dinacom_notext.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="BIOGUARD - AI-Powered Biodiversity Protection">
    <meta property="og:description" content="Platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia.">
    <meta property="og:image" content="{{ asset('assets/images/dinacom_notext.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="BIOGUARD">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="BIOGUARD - AI-Powered Biodiversity Protection">
    <meta name="twitter:description" content="Platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia.">
    <meta name="twitter:image" content="{{ asset('assets/images/dinacom_notext.png') }}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#10b981">
    <meta name="msapplication-TileColor" content="#10b981">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bioguard.css') }}">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('styles')
</head>

<body>

    @if (request()->routeIs('dashboard') || request()->is('dashboard/*'))
    @include('layouts.navbar-dashboard')
    @else
    @include('layouts.navbar-landing')
    @endif


    @yield('content')

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');

        // Check if on BioGuard page
        const navbarUserList = document.querySelector('.navbar-nav.navbar-user');
        const isBioGuardPage = navbarUserList && navbarUserList.dataset.bioguardPage === 'true';

        // Flag to prevent scroll spy from overriding click-set active state
        let isClickScrolling = false;

        // Define sections for scroll spy (order matters - top to bottom)
        const sections = ['home', 'features', 'entities', 'stats', 'about'];
        const navLinks = document.querySelectorAll('.navbar-nav.navbar-user .nav-link');
        const fiturDropdownToggle = document.getElementById('fitur-dropdown-toggle');

        // Function to update active nav link
        function updateActiveNavLink() {
            // Skip if on BioGuard page - keep server-side active state
            if (isBioGuardPage) return;

            // Skip if currently scrolling due to click
            if (isClickScrolling) return;

            const scrollPosition = window.scrollY + 150; // Offset for navbar height

            // If at top of page, activate "Beranda"
            if (window.scrollY < 100) {
                navLinks.forEach(link => link.classList.remove('active'));
                if (fiturDropdownToggle) fiturDropdownToggle.classList.remove('active');
                const homelink = document.querySelector('.navbar-nav.navbar-user .nav-link[href="#home"]');
                if (homelink) homelink.classList.add('active');
                return;
            }

            // Find which section is currently in view
            let currentSection = null;

            for (const sectionId of sections) {
                const section = document.getElementById(sectionId);
                if (section) {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;

                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSection = sectionId;
                        break;
                    }
                }
            }

            // Update active class on nav links
            if (currentSection) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    const href = link.getAttribute('href');
                    if (href === `#${currentSection}`) {
                        link.classList.add('active');
                    }
                });

                // Activate "Fitur" dropdown when in features section
                if (fiturDropdownToggle) {
                    if (currentSection === 'features') {
                        fiturDropdownToggle.classList.add('active');
                    } else {
                        fiturDropdownToggle.classList.remove('active');
                    }
                }
            }
        }

        // Navbar background and scroll spy on scroll
        window.addEventListener('scroll', () => {
            // Navbar background effect
            if (window.scrollY > 10) {
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.remove('nav-scrolled');
            }

            // Update active nav link based on scroll position (only on landing page)
            if (!isBioGuardPage) {
                updateActiveNavLink();
            }
        });

        // Initialize active state on page load (only on landing page)
        if (!isBioGuardPage) {
            updateActiveNavLink();
        }

        // Smooth scroll for anchor links with navbar offset
        const navbarHeight = 100; // Offset for navbar height

        function smoothScrollTo(targetId) {
            const cleanId = targetId.replace('/', '').replace('#', '');
            const target = document.getElementById(cleanId);
            if (target) {
                // Set flag to prevent scroll spy from overriding
                isClickScrolling = true;

                // Update active class immediately on click
                navLinks.forEach(link => link.classList.remove('active'));
                // Find the matching nav link and set active
                const matchingNavLink = document.querySelector(`.navbar-nav.navbar-user .nav-link[href="#${cleanId}"]`);
                if (matchingNavLink) {
                    matchingNavLink.classList.add('active');
                }

                // Activate Fitur dropdown if scrolling to features
                if (fiturDropdownToggle) {
                    if (cleanId === 'features' || cleanId.includes('-card')) {
                        fiturDropdownToggle.classList.add('active');
                    }
                }

                // Calculate position with navbar offset
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Reset flag after scroll completes
                setTimeout(() => {
                    isClickScrolling = false;
                }, 800);
            }
        }

        // Handle anchor links including /#id format
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Check if it's an anchor link (starts with # or /#)
                if (href.startsWith('#') || href.startsWith('/#')) {
                    e.preventDefault();
                    smoothScrollTo(href);
                }
            });
        });

        // Handle hash in URL on page load (for links from other pages like /#bioguard-card)
        if (window.location.hash) {
            // Wait for page to fully load
            setTimeout(() => {
                smoothScrollTo(window.location.hash);
            }, 100);
        }

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