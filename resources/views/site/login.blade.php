<!DOCTYPE html>
<html lang="pt-AO" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessão | Kempaga</title>
    <meta name="description" content="Inicie sessão na sua conta Kempaga. Aceda à sua carteira digital e gerencie as suas finanças.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Fredoka', 'sans-serif'] },
                    colors: {
                        darkBg: '#08050e', darkCard: '#110d18', lightBg: '#f8fafc', lightCard: '#ffffff',
                        brandPurple: '#872ccb', brandPurpleHover: '#6a1d9e',
                        brandGreen: '#107123', brandGreenHover: '#0b5318', brandGreenBright: '#24a13f',
                        textMutedDark: '#a3a3a3', textMutedLight: '#64748b'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen font-sans antialiased selection:bg-brandPurple selection:text-white text-slate-900 dark:text-white transition-colors duration-300 overflow-hidden flex">

    <!-- LADO ESQUERDO: Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-lightBg dark:bg-darkBg relative flex-col justify-between p-12 overflow-hidden border-r border-gray-200 dark:border-gray-800">
        <div class="absolute inset-0 pointer-events-none hidden dark:block" style="background-image: radial-gradient(circle at 20% 80%, rgba(135, 44, 203, 0.08), transparent 40%), radial-gradient(circle at 80% 20%, rgba(16, 113, 35, 0.08), transparent 40%);"></div>

        <div class="relative z-10">
            <a href="{{ route('site.home') }}" class="flex items-center cursor-pointer select-none">
                <h1 class="text-4xl font-bold tracking-tight"><span class="text-brandPurple">Kem</span><span class="text-brandGreen">paga</span></h1>
            </a>
        </div>

        <div class="relative z-10 max-w-lg mt-auto mb-auto">
            <span class="px-3 py-1 mb-6 inline-block rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20">Acesso Seguro</span>
            <h2 class="text-4xl font-bold leading-tight mb-6">A sua vida financeira<br>num só lugar.</h2>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg">Gira os seus Kwanzas, Criptomoedas e divisas estrangeiras com a facilidade do Multicaixa Express. Bem-vindo de volta ao controlo do seu dinheiro.</p>
        </div>

        <div class="absolute -bottom-20 -right-20 w-[400px] h-[400px] bg-brandPurple/20 dark:bg-brandPurple/10 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-lighten pointer-events-none"></div>
    </div>

    <!-- LADO DIREITO: Formulário -->
    <div class="w-full lg:w-1/2 flex flex-col bg-white dark:bg-[#0c0914] relative h-screen overflow-y-auto">
        <!-- Header Mobile -->
        <div class="flex justify-between items-center p-6 lg:hidden">
            <a href="{{ route('site.home') }}" class="flex items-center cursor-pointer select-none">
                <h1 class="text-3xl font-bold tracking-tight"><span class="text-brandPurple">Kem</span><span class="text-brandGreen">paga</span></h1>
            </a>
            <button data-theme-toggle class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-slate-800 dark:text-yellow-400 focus:outline-none">
                <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z"></path><path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            </button>
        </div>

        <!-- Theme Toggle Desktop -->
        <div class="hidden lg:block absolute top-8 right-12 z-20">
            <button data-theme-toggle class="p-2.5 rounded-full bg-gray-100 dark:bg-gray-800 text-slate-800 dark:text-yellow-400 border border-transparent dark:border-gray-700 hover:scale-105 transition-all focus:outline-none shadow-sm">
                <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z"></path><path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            </button>
        </div>

        <!-- Formulário Central -->
        <div class="flex-1 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Iniciar Sessão</h2>
                    <p class="text-textMutedLight dark:text-textMutedDark">Introduza os seus dados para aceder à conta.</p>
                </div>

                <!-- Mensagens de erro -->
                <div id="login-error" class="hidden mb-4 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-600 dark:text-red-400 text-sm"></div>

                <form id="login-form" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-2">E-mail</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input type="email" id="email" name="email" required class="w-full pl-11 pr-4 py-3.5 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="exemplo@email.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-slate-700 dark:text-gray-300">Palavra-passe</label>
                            <a href="#" class="text-sm font-semibold text-brandPurple hover:text-brandGreen transition-colors">Esqueceu a senha?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input type="password" id="password" name="password" required class="w-full pl-11 pr-12 py-3.5 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="••••••••">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-brandPurple focus:outline-none">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" id="login-btn" class="w-full py-4 bg-brandPurple hover:bg-brandPurpleHover text-white text-lg font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-brandPurple/20 flex items-center justify-center gap-2">
                            <span>Entrar</span>
                            <svg id="login-spinner" class="hidden animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        </button>
                    </div>
                </form>

                <div class="flex items-center my-8">
                    <hr class="flex-1 border-gray-200 dark:border-gray-800">
                    <span class="px-4 text-sm text-textMutedLight dark:text-textMutedDark">Ou entrar com</span>
                    <hr class="flex-1 border-gray-200 dark:border-gray-800">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 w-full py-3.5 px-4 bg-white dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl text-sm font-semibold text-slate-700 dark:text-white transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        Google
                    </button>
                    <button class="flex items-center justify-center gap-2 w-full py-3.5 px-4 bg-white dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl text-sm font-semibold text-slate-700 dark:text-white transition-colors">
                        <svg class="w-5 h-5 text-black dark:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.04 2.26-.74 3.58-.8 1.58-.06 2.88.58 3.56 1.5-3.06 1.74-2.52 5.95.38 7.15-.75 1.83-1.68 3.51-2.6 4.32zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        Apple
                    </button>
                </div>

                <p class="text-center mt-10 text-textMutedLight dark:text-textMutedDark">
                    Ainda não tem conta?
                    <a href="{{ route('site.register') }}" class="font-semibold text-brandPurple hover:text-brandGreen transition-colors">Criar conta</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Theme
        (function() {
            const saved = localStorage.getItem('color-theme');
            if (saved === 'light') document.documentElement.classList.remove('dark');
            else if (saved === 'dark') document.documentElement.classList.add('dark');
        })();

        // Redirect to dashboard if already logged in
        (function() {
            const token = localStorage.getItem('kempaga_token');
            const user = JSON.parse(localStorage.getItem('kempaga_user') || 'null');
            if (token && user) {
                window.location.href = '{{ route("site.dashboard") }}';
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

            // Password toggle
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('text-brandPurple');
            });

            // Login form — calls API
            const API_BASE = '/api';
            const loginForm = document.getElementById('login-form');
            const loginError = document.getElementById('login-error');
            const loginBtn = document.getElementById('login-btn');
            const loginSpinner = document.getElementById('login-spinner');

            loginForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                loginError.classList.add('hidden');
                loginBtn.disabled = true;
                loginSpinner.classList.remove('hidden');

                try {
                    const res = await fetch(`${API_BASE}/auth/login`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            password: document.getElementById('password').value
                        })
                    });

                    const data = await res.json();

                    if (!res.ok) {
                        loginError.textContent = data.message || 'Credenciais inválidas. Tente novamente.';
                        loginError.classList.remove('hidden');
                        return;
                    }

                    // Save token & user
                    localStorage.setItem('kempaga_token', data.token);
                    localStorage.setItem('kempaga_user', JSON.stringify(data.user));

                    // Redirect based on user type
                    if (data.user.type === 'agent' || data.user.type === 'admin') {
                        window.location.href = '{{ route("site.dashboard") }}';
                    } else {
                        window.location.href = '{{ route("site.home") }}';
                    }
                } catch (err) {
                    loginError.textContent = 'Erro de ligação. Verifique a sua internet.';
                    loginError.classList.remove('hidden');
                } finally {
                    loginBtn.disabled = false;
                    loginSpinner.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
