<!DOCTYPE html>
<html lang="pt-AO" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta de Agente | Kempaga</title>
    <meta name="description" content="Registe-se como agente Kempaga. Acesso exclusivo para agentes autorizados.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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

<body
    class="min-h-screen font-sans antialiased selection:bg-brandPurple selection:text-white text-slate-900 dark:text-white transition-colors duration-300 overflow-hidden flex">

    <!-- LADO ESQUERDO: Branding -->
    <div
        class="hidden lg:flex lg:w-1/2 bg-lightBg dark:bg-darkBg relative flex-col justify-between p-12 overflow-hidden border-r border-gray-200 dark:border-gray-800">
        <div class="absolute inset-0 pointer-events-none hidden dark:block"
            style="background-image: radial-gradient(circle at 20% 80%, rgba(135, 44, 203, 0.08), transparent 40%), radial-gradient(circle at 80% 20%, rgba(16, 113, 35, 0.08), transparent 40%);">
        </div>

        <div class="relative z-10">
            <a href="{{ route('site.home') }}" class="flex items-center cursor-pointer select-none">
                <h1 class="text-4xl font-bold tracking-tight"><span class="text-brandPurple">Kem</span><span
                        class="text-brandGreen">paga</span></h1>
            </a>
        </div>

        <div class="relative z-10 max-w-lg mt-auto mb-auto">
            <span
                class="px-3 py-1 mb-6 inline-block rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20">Registo
                de Agente</span>
            <h2 class="text-4xl font-bold leading-tight mb-6">Torne-se um<br>agente Kempaga</h2>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg">
                Junte-se à nossa rede de agentes autorizados e ofereça serviços financeiros na sua comunidade. Ganhe
                comissões por cada transação processada.
            </p>

            <!-- Benefícios -->
            <ul class="mt-8 space-y-3">
                <li class="flex items-center gap-3 text-slate-700 dark:text-gray-300">
                    <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg></div>
                    Comissões competitivas por transação
                </li>
                <li class="flex items-center gap-3 text-slate-700 dark:text-gray-300">
                    <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg></div>
                    Painel exclusivo de gestão
                </li>
                <li class="flex items-center gap-3 text-slate-700 dark:text-gray-300">
                    <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg></div>
                    Suporte prioritário 24/7
                </li>
            </ul>
        </div>

        <div
            class="absolute -bottom-20 -right-20 w-[400px] h-[400px] bg-brandGreen/20 dark:bg-brandGreen/10 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-lighten pointer-events-none">
        </div>
    </div>

    <!-- LADO DIREITO: Formulário -->
    <div class="w-full lg:w-1/2 flex flex-col bg-white dark:bg-[#0c0914] relative h-screen overflow-y-auto">
        <!-- Header Mobile -->
        <div class="flex justify-between items-center p-6 lg:hidden">
            <a href="{{ route('site.home') }}" class="flex items-center cursor-pointer select-none">
                <h1 class="text-3xl font-bold tracking-tight"><span class="text-brandPurple">Kem</span><span
                        class="text-brandGreen">paga</span></h1>
            </a>
            <button data-theme-toggle
                class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-slate-800 dark:text-yellow-400 focus:outline-none">
                <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z">
                    </path>
                    <path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path>
                </svg>
                <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>
        </div>

        <!-- Theme Toggle Desktop -->
        <div class="hidden lg:block absolute top-8 right-12 z-20">
            <button data-theme-toggle
                class="p-2.5 rounded-full bg-gray-100 dark:bg-gray-800 text-slate-800 dark:text-yellow-400 border border-transparent dark:border-gray-700 hover:scale-105 transition-all focus:outline-none shadow-sm">
                <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z">
                    </path>
                    <path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path>
                </svg>
                <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>
        </div>

        <div class="flex-1 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">
                <div class="mb-8 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Criar Conta de Agente</h2>
                    <p class="text-textMutedLight dark:text-textMutedDark">O registo é exclusivo para agentes
                        autorizados.</p>
                </div>

                <!-- Mensagens -->
                <div id="register-error"
                    class="hidden mb-4 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-600 dark:text-red-400 text-sm">
                </div>
                <div id="register-success"
                    class="hidden mb-4 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-600 dark:text-green-400 text-sm">
                </div>

                <form id="register-form" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="first_name"
                                class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Primeiro
                                Nome</label>
                            <input type="text" id="first_name" name="first_name" required
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                                placeholder="João">
                        </div>
                        <div>
                            <label for="last_name"
                                class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Último
                                Nome</label>
                            <input type="text" id="last_name" name="last_name" required
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                                placeholder="Silva">
                        </div>
                    </div>

                    <div>
                        <label for="reg-email"
                            class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">E-mail</label>
                        <input type="email" id="reg-email" name="email" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                            placeholder="agente@email.com">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Nº
                            de Telefone</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                            placeholder="+244 9XX XXX XXX">
                    </div>

                    <div>
                        <label for="bi_number"
                            class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Número do
                            BI</label>
                        <input type="text" id="bi_number" name="bi_number" required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                            placeholder="005XXXXXXXXLA0XX">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="reg-password"
                                class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Palavra-passe</label>
                            <input type="password" id="reg-password" name="password" required minlength="6"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                                placeholder="••••••">
                        </div>
                        <div>
                            <label for="reg-password-confirm"
                                class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Confirmar</label>
                            <input type="password" id="reg-password-confirm" name="password_confirmation" required
                                minlength="6"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all"
                                placeholder="••••••">
                        </div>
                    </div>

                    <!-- Termos -->
                    <div class="flex items-start gap-2 mt-2">
                        <input type="checkbox" id="accept-terms" required
                            class="mt-1 w-4 h-4 rounded border-gray-300 text-brandPurple focus:ring-brandPurple">
                        <label for="accept-terms" class="text-sm text-textMutedLight dark:text-textMutedDark">
                            Concordo com os <a href="{{ route('site.terms') }}"
                                class="text-brandPurple hover:underline">Termos e Condições</a> e a <a
                                href="{{ route('site.privacy') }}" class="text-brandPurple hover:underline">Política de
                                Privacidade</a>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" id="register-btn"
                            class="w-full py-4 bg-brandGreen hover:bg-brandGreenHover text-white text-lg font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-brandGreen/20 flex items-center justify-center gap-2">
                            <span>Criar Conta</span>
                            <svg id="register-spinner" class="hidden animate-spin w-5 h-5" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <p class="text-center mt-8 text-textMutedLight dark:text-textMutedDark">
                    Já tem conta?
                    <a href="{{ route('site.login') }}"
                        class="font-semibold text-brandPurple hover:text-brandGreen transition-colors">Iniciar
                        sessão</a>
                </p>
            </div>
        </div>
    </div>

    <script>
            // Theme
            (function () {
                const saved = localStorage.getItem('color-theme');
                if (saved === 'light') document.documentElement.classList.remove('dark');
                else if (saved === 'dark') document.documentElement.classList.add('dark');
            })();

        // Redirect to dashboard if already logged in
        (function () {
            const token = localStorage.getItem('kempaga_token');
            const user = JSON.parse(localStorage.getItem('kempaga_user') || 'null');
            if (token && user) {
                window.location.href = '{{ route("site.dashboard") }}';
            }
        })();

        document.addEventListener('DOMContentLoaded', function () {
            const themeToggleBtns = document.querySelectorAll('[data-theme-toggle]');
            const darkIcons = document.querySelectorAll('[data-theme-icon="dark"]');
            const lightIcons = document.querySelectorAll('[data-theme-icon="light"]');
            function updateIcons() {
                if (document.documentElement.classList.contains('dark')) { lightIcons.forEach(i => i.classList.remove('hidden')); darkIcons.forEach(i => i.classList.add('hidden')); }
                else { darkIcons.forEach(i => i.classList.remove('hidden')); lightIcons.forEach(i => i.classList.add('hidden')); }
            }
            updateIcons();
            themeToggleBtns.forEach(btn => { btn.addEventListener('click', function () { document.documentElement.classList.toggle('dark'); localStorage.setItem('color-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light'); updateIcons(); }); });

            // Register form
            const API_BASE = '/api';
            const form = document.getElementById('register-form');
            const errorEl = document.getElementById('register-error');
            const successEl = document.getElementById('register-success');
            const regBtn = document.getElementById('register-btn');
            const regSpinner = document.getElementById('register-spinner');

            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                errorEl.classList.add('hidden');
                successEl.classList.add('hidden');
                regBtn.disabled = true;
                regSpinner.classList.remove('hidden');

                try {
                    const res = await fetch(`${API_BASE}/auth/register`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                        body: JSON.stringify({
                            first_name: document.getElementById('first_name').value,
                            last_name: document.getElementById('last_name').value,
                            email: document.getElementById('reg-email').value,
                            phone: document.getElementById('phone').value,
                            bi_number: document.getElementById('bi_number').value,
                            password: document.getElementById('reg-password').value,
                            password_confirmation: document.getElementById('reg-password-confirm').value,
                            type: 'agent'
                        })
                    });
                    const data = await res.json();
                    if (!res.ok) {
                        let msg = data.message || 'Erro ao criar conta.';
                        if (data.errors) msg += ' ' + Object.values(data.errors).flat().join(' ');
                        errorEl.textContent = msg;
                        errorEl.classList.remove('hidden');
                        return;
                    }
                    localStorage.setItem('kempaga_token', data.token);
                    localStorage.setItem('kempaga_user', JSON.stringify(data.user));
                    successEl.textContent = 'Conta criada com sucesso! A redirecionar...';
                    successEl.classList.remove('hidden');
                    setTimeout(() => { window.location.href = '{{ route("site.dashboard") }}'; }, 1500);
                } catch (err) {
                    errorEl.textContent = 'Erro de ligação. Verifique a sua internet.';
                    errorEl.classList.remove('hidden');
                } finally {
                    regBtn.disabled = false;
                    regSpinner.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>