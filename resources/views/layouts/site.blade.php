<!DOCTYPE html>
<html lang="pt-AO" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Kempaga — A sua startup financeira em Angola. Carteira digital com Multicaixa Express, Cripto e Câmbio.')">
    <meta name="keywords" content="Kempaga, carteira digital, Angola, Multicaixa Express, pagamentos, criptomoedas, câmbio, AOA, fintech">
    <meta name="author" content="Kempaga">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Kempaga | A sua Startup Financeira em Angola')</title>

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Kempaga | A sua Startup Financeira em Angola')">
    <meta property="og:description" content="@yield('meta_description', 'Carteira digital com Multicaixa Express, Cripto e Câmbio.')">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_AO">

    <!-- Fonte Fredoka -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuração do Tailwind -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Fredoka', 'sans-serif'],
                    },
                    colors: {
                        darkBg: '#08050e',
                        darkCard: '#110d18',
                        lightBg: '#f8fafc',
                        lightCard: '#ffffff',
                        brandPurple: '#872ccb',
                        brandPurpleHover: '#6a1d9e',
                        brandGreen: '#107123',
                        brandGreenHover: '#0b5318',
                        brandGreenBright: '#24a13f',
                        textMutedDark: '#a3a3a3',
                        textMutedLight: '#64748b'
                    }
                }
            }
        }
    </script>

    <style>
        .bg-pattern-dark {
            background-image:
                radial-gradient(circle at 10% 20%, rgba(135, 44, 203, 0.05), transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(16, 113, 35, 0.05), transparent 30%);
        }
        /* Smooth scroll */
        html { scroll-behavior: smooth; }
        /* Animated counter */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        /* Staggered animations */
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        /* Pulse glow */
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 15px rgba(135, 44, 203, 0.3); }
            50% { box-shadow: 0 0 30px rgba(135, 44, 203, 0.5); }
        }
        .pulse-glow { animation: pulseGlow 2s infinite; }
        /* FAQ Accordion */
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
        .faq-answer.open { max-height: 500px; }
        /* Partners scroll */
        @keyframes scrollPartners {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .partners-scroll { animation: scrollPartners 20s linear infinite; }
        .partners-scroll:hover { animation-play-state: paused; }

        @yield('styles')
    </style>
</head>
<body class="min-h-screen font-sans antialiased selection:bg-brandPurple selection:text-white bg-lightBg dark:bg-darkBg dark:bg-pattern-dark text-slate-900 dark:text-white transition-colors duration-300 overflow-x-hidden">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Theme Toggle Script -->
    <script>
        // Theme
        (function() {
            const saved = localStorage.getItem('color-theme');
            if (saved === 'light') {
                document.documentElement.classList.remove('dark');
            } else if (saved === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();

        document.addEventListener('DOMContentLoaded', function() {
            const themeToggleBtns = document.querySelectorAll('[data-theme-toggle]');
            const darkIcons = document.querySelectorAll('[data-theme-icon="dark"]');
            const lightIcons = document.querySelectorAll('[data-theme-icon="light"]');

            function updateIcons() {
                if (document.documentElement.classList.contains('dark')) {
                    lightIcons.forEach(i => i.classList.remove('hidden'));
                    darkIcons.forEach(i => i.classList.add('hidden'));
                } else {
                    darkIcons.forEach(i => i.classList.remove('hidden'));
                    lightIcons.forEach(i => i.classList.add('hidden'));
                }
            }
            updateIcons();

            themeToggleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    document.documentElement.classList.toggle('dark');
                    localStorage.setItem('color-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
                    updateIcons();
                });
            });

            // Mobile menu
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
