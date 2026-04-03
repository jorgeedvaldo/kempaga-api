<!-- Navbar -->
<nav class="max-w-[1400px] mx-auto px-6 lg:px-12 flex items-center justify-between py-8 relative z-50">
    <!-- Logo -->
    <a href="{{ route('site.home') }}" class="flex items-center cursor-pointer select-none">
        <h1 class="text-4xl font-bold tracking-tight">
            <span class="text-brandPurple">Kem</span><span class="text-brandGreen">paga</span>
        </h1>
    </a>

    <!-- Links Centro (Desktop) -->
    <div class="hidden md:flex items-center gap-10 text-[1.05rem] font-medium">
        <a href="{{ route('site.home') }}" class="text-slate-600 dark:text-gray-300 hover:text-brandPurple dark:hover:text-brandPurple transition-colors {{ request()->routeIs('site.home') ? '!text-brandPurple' : '' }}">Início</a>
        <a href="{{ route('site.about') }}" class="text-slate-600 dark:text-gray-300 hover:text-brandGreen dark:hover:text-brandGreen transition-colors {{ request()->routeIs('site.about') ? '!text-brandGreen' : '' }}">Sobre</a>
        <a href="{{ route('site.faq') }}" class="text-slate-600 dark:text-gray-300 hover:text-brandPurple dark:hover:text-brandPurple transition-colors {{ request()->routeIs('site.faq') ? '!text-brandPurple' : '' }}">FAQ</a>
        <a href="{{ route('site.contact') }}" class="text-slate-600 dark:text-gray-300 hover:text-brandGreen dark:hover:text-brandGreen transition-colors {{ request()->routeIs('site.contact') ? '!text-brandGreen' : '' }}">Contacto</a>
    </div>

    <!-- Botões Direita -->
    <div class="flex items-center gap-4">
        <!-- Theme Toggle -->
        <button data-theme-toggle class="p-2.5 rounded-full bg-white dark:bg-gray-800 text-slate-800 dark:text-yellow-400 shadow-sm border border-gray-200 dark:border-gray-700 hover:scale-105 transition-all focus:outline-none">
            <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z"></path><path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path></svg>
            <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        </button>

        <!-- Login (Desktop) -->
        <a href="{{ route('site.login') }}" class="hidden md:inline-block text-slate-600 dark:text-gray-300 hover:text-brandPurple dark:hover:text-brandPurple text-[1.05rem] font-medium transition-colors">
            Entrar
        </a>

        <!-- CTA -->
        <a href="{{ route('site.register') }}" class="hidden md:inline-block bg-brandPurple hover:bg-brandPurpleHover text-white text-[1.05rem] font-semibold py-2.5 px-6 rounded-full transition-all duration-300 shadow-[0_0_15px_rgba(135,44,203,0.3)]">
            Criar Conta
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:outline-none">
            <svg class="w-6 h-6 text-slate-700 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-darkCard border-b border-gray-200 dark:border-gray-800 px-6 pb-6 space-y-4">
    <a href="{{ route('site.home') }}" class="block py-2 text-slate-700 dark:text-gray-300 hover:text-brandPurple font-medium">Início</a>
    <a href="{{ route('site.about') }}" class="block py-2 text-slate-700 dark:text-gray-300 hover:text-brandGreen font-medium">Sobre</a>
    <a href="{{ route('site.faq') }}" class="block py-2 text-slate-700 dark:text-gray-300 hover:text-brandPurple font-medium">FAQ</a>
    <a href="{{ route('site.contact') }}" class="block py-2 text-slate-700 dark:text-gray-300 hover:text-brandGreen font-medium">Contacto</a>
    <hr class="border-gray-200 dark:border-gray-700">
    <a href="{{ route('site.login') }}" class="block py-2 text-brandPurple font-semibold">Entrar</a>
    <a href="{{ route('site.register') }}" class="block py-3 text-center bg-brandPurple text-white font-semibold rounded-full">Criar Conta</a>
</div>
