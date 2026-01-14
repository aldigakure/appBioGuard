<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BIOGUARD - AI-Powered Biodiversity Protection</title>
        <meta name="description"
            content="BIOGUARD adalah platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @stack('styles')
    </head>

    <body>

        @include('layouts.navbar')


        @yield('content')

        @include('layouts.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Navbar scroll effect
            const navbar = document.getElementById('navbar');


            // Flag to prevent scroll spy from overriding click-set active state
            let isClickScrolling = false;

            // Define sections for scroll spy (order matters - top to bottom)
            const sections = ['home','features', 'entities', 'stats', 'about'];
            const navLinks = document.querySelectorAll('.navbar-nav.navbar-user .nav-link');

            // Function to update active nav link
            function updateActiveNavLink() {
                // Skip if currently scrolling due to click
                if (isClickScrolling) return;

                const scrollPosition = window.scrollY + 150; // Offset for navbar height

                // If at top of page, activate "Fitur"
                if (window.scrollY < 100) {
                    navLinks.forEach(link => link.classList.remove('active'));
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
                }
            }

            // Navbar background and scroll spy on scroll
            window.addEventListener('scroll', () => {
                // Navbar background effect
                if (window.scrollY > 50) {
                    navbar.classList.add('nav-scrolled');
                } else {
                    navbar.classList.remove('nav-scrolled');
                }

                // Update active nav link based on scroll position
                updateActiveNavLink();
            });

            // Initialize active state on page load
            updateActiveNavLink();

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const target = document.querySelector(targetId);
                    if (target) {
                        // Set flag to prevent scroll spy from overriding
                        isClickScrolling = true;

                        // Update active class immediately on click
                        navLinks.forEach(link => link.classList.remove('active'));
                        // Find the matching nav link and set active
                        const matchingNavLink = document.querySelector(`.navbar-nav.navbar-user .nav-link[href="${targetId}"]`);
                        if (matchingNavLink) {
                            matchingNavLink.classList.add('active');
                        }

                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Reset flag after scroll completes
                        setTimeout(() => {
                            isClickScrolling = false;
                        }, 800);
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
