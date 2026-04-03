<!DOCTYPE html>
<html lang="pt-AO" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Agente | Kempaga</title>

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
    <style>
        .sidebar-link.active { background: rgba(135, 44, 203, 0.1); color: #872ccb; border-left: 3px solid #872ccb; }
        .dark .sidebar-link.active { background: rgba(135, 44, 203, 0.15); color: #d3a3ff; }
    </style>
</head>
<body class="min-h-screen font-sans antialiased selection:bg-brandPurple selection:text-white bg-lightBg dark:bg-darkBg text-slate-900 dark:text-white transition-colors duration-300">

    <div class="flex min-h-screen">

        <!-- ═══════════ SIDEBAR ═══════════ -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white dark:bg-darkCard border-r border-gray-200 dark:border-gray-800 flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-800">
                <a href="{{ route('site.home') }}" class="flex items-center">
                    <h1 class="text-3xl font-bold tracking-tight"><span class="text-brandPurple">Kem</span><span class="text-brandGreen">paga</span></h1>
                </a>
                <p class="text-textMutedLight dark:text-textMutedDark text-xs mt-1">Painel do Agente</p>
            </div>

            <!-- Nav Links -->
            <nav class="flex-1 p-4 space-y-1">
                <a href="#" data-section="dashboard" class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="#" data-section="deposit" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Novo Depósito
                </a>
                <a href="#" data-section="transactions" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Transações
                </a>
                <a href="#" data-section="search" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Pesquisar Clientes
                </a>
                <a href="#" data-section="profile" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Meu Perfil
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-800">
                <button id="logout-btn" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 transition-colors w-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Terminar Sessão
                </button>
            </div>
        </aside>

        <!-- ═══════════ MAIN CONTENT ═══════════ -->
        <div class="flex-1 flex flex-col min-h-screen">

            <!-- Top Bar -->
            <header class="bg-white dark:bg-darkCard border-b border-gray-200 dark:border-gray-800 px-6 py-4 flex items-center justify-between sticky top-0 z-40">
                <!-- Mobile Menu Toggle -->
                <button id="sidebar-toggle" class="lg:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-slate-700 dark:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-textMutedLight dark:text-textMutedDark">Bem-vindo,</span>
                    <span id="agent-name" class="text-sm font-bold text-slate-900 dark:text-white">Agente</span>
                </div>

                <div class="flex items-center gap-3">
                    <button data-theme-toggle class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-slate-800 dark:text-yellow-400 focus:outline-none">
                        <svg data-theme-icon="light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.415 0z"></path><path d="M10 14a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                        <svg data-theme-icon="dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>
                    <div id="agent-avatar" class="w-9 h-9 rounded-full bg-gradient-to-br from-brandPurple to-brandGreenBright flex items-center justify-center text-white font-bold text-sm">A</div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-6 lg:p-8 overflow-y-auto">

                <!-- ══ DASHBOARD SECTION ══ -->
                <div id="section-dashboard" class="section-content">
                    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-textMutedLight dark:text-textMutedDark text-sm">Saldo da Carteira</span>
                                <div class="w-8 h-8 rounded-lg bg-brandPurple/10 flex items-center justify-center"><svg class="w-4 h-4 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg></div>
                            </div>
                            <p id="wallet-balance" class="text-2xl font-bold text-slate-900 dark:text-white">—</p>
                            <p class="text-xs text-textMutedDark mt-1">AOA</p>
                        </div>
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-textMutedLight dark:text-textMutedDark text-sm">Transações Hoje</span>
                                <div class="w-8 h-8 rounded-lg bg-brandGreen/10 flex items-center justify-center"><svg class="w-4 h-4 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div>
                            </div>
                            <p id="transactions-today" class="text-2xl font-bold text-slate-900 dark:text-white">—</p>
                            <p class="text-xs text-textMutedDark mt-1">transações</p>
                        </div>
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-textMutedLight dark:text-textMutedDark text-sm">Total Depositado</span>
                                <div class="w-8 h-8 rounded-lg bg-brandPurple/10 flex items-center justify-center"><svg class="w-4 h-4 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg></div>
                            </div>
                            <p id="total-deposits" class="text-2xl font-bold text-slate-900 dark:text-white">—</p>
                            <p class="text-xs text-textMutedDark mt-1">AOA</p>
                        </div>
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-textMutedLight dark:text-textMutedDark text-sm">Total Enviado</span>
                                <div class="w-8 h-8 rounded-lg bg-brandGreen/10 flex items-center justify-center"><svg class="w-4 h-4 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg></div>
                            </div>
                            <p id="total-sent" class="text-2xl font-bold text-slate-900 dark:text-white">—</p>
                            <p class="text-xs text-textMutedDark mt-1">AOA</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <button onclick="showSection('deposit')" class="bg-brandPurple hover:bg-brandPurpleHover text-white rounded-2xl p-6 flex items-center gap-4 transition-all shadow-lg shadow-brandPurple/20">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg></div>
                            <div class="text-left"><p class="font-bold text-lg">Novo Depósito</p><p class="text-white/70 text-sm">Registar depósito de cliente</p></div>
                        </button>
                        <button onclick="showSection('search')" class="bg-brandGreen hover:bg-brandGreenHover text-white rounded-2xl p-6 flex items-center gap-4 transition-all shadow-lg shadow-brandGreen/20">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg></div>
                            <div class="text-left"><p class="font-bold text-lg">Pesquisar Cliente</p><p class="text-white/70 text-sm">Encontrar utilizador</p></div>
                        </button>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl">
                        <div class="p-5 border-b border-gray-200 dark:border-gray-800 flex items-center justify-between">
                            <h3 class="font-bold text-slate-900 dark:text-white">Transações Recentes</h3>
                            <button onclick="showSection('transactions')" class="text-brandPurple text-sm font-semibold hover:underline">Ver Todas</button>
                        </div>
                        <div id="recent-transactions" class="divide-y divide-gray-100 dark:divide-gray-800">
                            <div class="p-5 text-center text-textMutedDark text-sm">A carregar...</div>
                        </div>
                    </div>
                </div>

                <!-- ══ DEPOSIT SECTION ══ -->
                <div id="section-deposit" class="section-content hidden">
                    <h2 class="text-2xl font-bold mb-6">Registar Depósito</h2>
                    <div class="max-w-lg">
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-6 lg:p-8">
                            <div id="deposit-error" class="hidden mb-4 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-600 dark:text-red-400 text-sm"></div>
                            <div id="deposit-success" class="hidden mb-4 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-600 dark:text-green-400 text-sm"></div>

                            <form id="deposit-form" class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">ID do Utilizador</label>
                                    <input type="number" id="deposit-user-id" required min="1" class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="ID do cliente">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Montante (AOA)</label>
                                    <input type="number" id="deposit-amount" required min="1" step="0.01" class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Nota (opcional)</label>
                                    <input type="text" id="deposit-note" maxlength="500" class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="Depósito via agente">
                                </div>
                                <button type="submit" id="deposit-btn" class="w-full py-4 bg-brandPurple hover:bg-brandPurpleHover text-white text-lg font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-brandPurple/20 flex items-center justify-center gap-2">
                                    <span>Processar Depósito</span>
                                    <svg id="deposit-spinner" class="hidden animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ══ TRANSACTIONS SECTION ══ -->
                <div id="section-transactions" class="section-content hidden">
                    <h2 class="text-2xl font-bold mb-6">Histórico de Transações</h2>
                    <!-- Filters -->
                    <div class="flex flex-wrap gap-3 mb-6">
                        <select id="filter-type" class="px-4 py-2 bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brandPurple/50">
                            <option value="">Todos os Tipos</option>
                            <option value="send">Enviados</option>
                            <option value="receive">Recebidos</option>
                            <option value="deposit">Depósitos</option>
                        </select>
                        <select id="filter-status" class="px-4 py-2 bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brandPurple/50">
                            <option value="">Todos os Estados</option>
                            <option value="completed">Concluídos</option>
                            <option value="pending">Pendentes</option>
                            <option value="failed">Falhados</option>
                        </select>
                        <button id="filter-btn" class="px-4 py-2 bg-brandPurple text-white rounded-xl text-sm font-semibold hover:bg-brandPurpleHover transition-colors">Filtrar</button>
                    </div>

                    <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 dark:bg-[#15111f]">
                                    <tr>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">ID</th>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">Tipo</th>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">Montante</th>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">Destinatário</th>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">Estado</th>
                                        <th class="text-left px-5 py-3 text-textMutedLight dark:text-textMutedDark font-medium">Data</th>
                                    </tr>
                                </thead>
                                <tbody id="transactions-table" class="divide-y divide-gray-100 dark:divide-gray-800">
                                    <tr><td colspan="6" class="px-5 py-8 text-center text-textMutedDark">A carregar...</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="transactions-pagination" class="flex justify-center gap-2 mt-4"></div>
                </div>

                <!-- ══ SEARCH SECTION ══ -->
                <div id="section-search" class="section-content hidden">
                    <h2 class="text-2xl font-bold mb-6">Pesquisar Clientes</h2>
                    <div class="max-w-lg mb-6">
                        <div class="relative">
                            <input type="text" id="search-query" class="w-full pl-12 pr-4 py-3.5 bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="Pesquisar por nome, telefone ou email (mín. 3 caracteres)">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                    </div>
                    <div id="search-results" class="space-y-3"></div>
                </div>

                <!-- ══ PROFILE SECTION ══ -->
                <div id="section-profile" class="section-content hidden">
                    <h2 class="text-2xl font-bold mb-6">Meu Perfil</h2>
                    <div class="max-w-lg">
                        <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-6 lg:p-8">
                            <div id="profile-info" class="space-y-4">
                                <p class="text-textMutedDark text-center">A carregar...</p>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- ═══════════ SCRIPTS ═══════════ -->
    <script>
        const API_BASE = '/api';
        let TOKEN = localStorage.getItem('kempaga_token');
        let USER = JSON.parse(localStorage.getItem('kempaga_user') || 'null');

        // Auth guard
        if (!TOKEN || !USER || (USER.type !== 'agent' && USER.type !== 'admin')) {
            window.location.href = '{{ route("site.login") }}';
        }

        // Theme
        (function() {
            const saved = localStorage.getItem('color-theme');
            if (saved === 'light') document.documentElement.classList.remove('dark');
            else if (saved === 'dark') document.documentElement.classList.add('dark');
        })();

        // Helpers
        function authHeaders() {
            return { 'Content-Type': 'application/json', 'Accept': 'application/json', 'Authorization': `Bearer ${TOKEN}` };
        }

        function formatMoney(val) {
            return parseFloat(val || 0).toLocaleString('pt-AO', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function formatDate(dateStr) {
            return new Date(dateStr).toLocaleDateString('pt-AO', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        }

        function statusBadge(status) {
            const map = { completed: 'bg-green-100 dark:bg-green-900/20 text-green-600 dark:text-green-400', pending: 'bg-yellow-100 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-400', failed: 'bg-red-100 dark:bg-red-900/20 text-red-600 dark:text-red-400', cancelled: 'bg-gray-100 dark:bg-gray-800 text-gray-500' };
            return `<span class="px-2 py-1 rounded-full text-xs font-semibold ${map[status] || map.pending}">${status}</span>`;
        }

        function typeBadge(type) {
            const map = { send: ['Enviado', 'text-red-500'], receive: ['Recebido', 'text-brandGreenBright'], deposit: ['Depósito', 'text-brandPurple'] };
            const [label, cls] = map[type] || [type, 'text-gray-500'];
            return `<span class="font-semibold ${cls}">${label}</span>`;
        }

        // Section management
        function showSection(name) {
            document.querySelectorAll('.section-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(`section-${name}`).classList.remove('hidden');
            document.querySelectorAll('.sidebar-link').forEach(el => el.classList.remove('active'));
            document.querySelector(`.sidebar-link[data-section="${name}"]`)?.classList.add('active');
            // Close mobile sidebar
            document.getElementById('sidebar').classList.add('-translate-x-full');
        }

        document.addEventListener('DOMContentLoaded', async function() {
            // Theme toggle
            const themeToggleBtns = document.querySelectorAll('[data-theme-toggle]');
            const darkIcons = document.querySelectorAll('[data-theme-icon="dark"]');
            const lightIcons = document.querySelectorAll('[data-theme-icon="light"]');
            function updateIcons() {
                if (document.documentElement.classList.contains('dark')) { lightIcons.forEach(i => i.classList.remove('hidden')); darkIcons.forEach(i => i.classList.add('hidden')); }
                else { darkIcons.forEach(i => i.classList.remove('hidden')); lightIcons.forEach(i => i.classList.add('hidden')); }
            }
            updateIcons();
            themeToggleBtns.forEach(btn => { btn.addEventListener('click', function() { document.documentElement.classList.toggle('dark'); localStorage.setItem('color-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light'); updateIcons(); }); });

            // Sidebar navigation
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function(e) { e.preventDefault(); showSection(this.dataset.section); });
            });

            // Mobile sidebar
            document.getElementById('sidebar-toggle').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('-translate-x-full');
            });

            // Set agent info
            if (USER) {
                document.getElementById('agent-name').textContent = USER.full_name || `${USER.first_name} ${USER.last_name}`;
                document.getElementById('agent-avatar').textContent = (USER.first_name || 'A')[0];
            }

            // Load dashboard data
            await loadDashboard();

            // Logout
            document.getElementById('logout-btn').addEventListener('click', async function() {
                try { await fetch(`${API_BASE}/auth/logout`, { method: 'POST', headers: authHeaders() }); } catch(e) {}
                localStorage.removeItem('kempaga_token');
                localStorage.removeItem('kempaga_user');
                window.location.href = '{{ route("site.login") }}';
            });

            // Deposit form
            document.getElementById('deposit-form').addEventListener('submit', async function(e) {
                e.preventDefault();
                const errorEl = document.getElementById('deposit-error');
                const successEl = document.getElementById('deposit-success');
                const spinner = document.getElementById('deposit-spinner');
                errorEl.classList.add('hidden');
                successEl.classList.add('hidden');
                spinner.classList.remove('hidden');

                try {
                    const res = await fetch(`${API_BASE}/deposits`, {
                        method: 'POST', headers: authHeaders(),
                        body: JSON.stringify({
                            user_id: parseInt(document.getElementById('deposit-user-id').value),
                            amount: parseFloat(document.getElementById('deposit-amount').value),
                            note: document.getElementById('deposit-note').value || 'Depósito via agente'
                        })
                    });
                    const data = await res.json();
                    if (!res.ok) {
                        let msg = data.message || 'Erro ao processar depósito.';
                        if (data.errors) msg += ' ' + Object.values(data.errors).flat().join(' ');
                        errorEl.textContent = msg; errorEl.classList.remove('hidden');
                        return;
                    }
                    successEl.innerHTML = `✅ Depósito de <strong>${formatMoney(data.transaction.amount)} AOA</strong> realizado com sucesso! Novo saldo do cliente: <strong>${formatMoney(data.new_balance)} AOA</strong>`;
                    successEl.classList.remove('hidden');
                    document.getElementById('deposit-form').reset();
                    loadDashboard();
                } catch(err) {
                    errorEl.textContent = 'Erro de ligação.'; errorEl.classList.remove('hidden');
                } finally { spinner.classList.add('hidden'); }
            });

            // Transactions filter
            document.getElementById('filter-btn').addEventListener('click', loadTransactions);

            // Search
            let searchTimeout;
            document.getElementById('search-query').addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                if (query.length < 3) { document.getElementById('search-results').innerHTML = '<p class="text-textMutedDark text-sm">Insira pelo menos 3 caracteres.</p>'; return; }
                searchTimeout = setTimeout(() => searchUsers(query), 300);
            });
        });

        // API calls
        async function loadDashboard() {
            try {
                // Load wallet
                const walletRes = await fetch(`${API_BASE}/wallet`, { headers: authHeaders() });
                if (walletRes.ok) {
                    const walletData = await walletRes.json();
                    document.getElementById('wallet-balance').textContent = formatMoney(walletData.wallet.balance);
                }

                // Load transactions
                const txRes = await fetch(`${API_BASE}/transactions?page=1`, { headers: authHeaders() });
                if (txRes.ok) {
                    const txData = await txRes.json();
                    const txs = txData.data || [];
                    document.getElementById('transactions-today').textContent = txs.length;

                    // Calc totals
                    let deposits = 0, sent = 0;
                    txs.forEach(tx => {
                        if (tx.transaction_type === 'deposit') deposits += parseFloat(tx.amount);
                        if (tx.type === 'send') sent += parseFloat(tx.amount);
                    });
                    document.getElementById('total-deposits').textContent = formatMoney(deposits);
                    document.getElementById('total-sent').textContent = formatMoney(sent);

                    // Recent list
                    const container = document.getElementById('recent-transactions');
                    if (txs.length === 0) {
                        container.innerHTML = '<div class="p-5 text-center text-textMutedDark text-sm">Nenhuma transação encontrada.</div>';
                    } else {
                        container.innerHTML = txs.slice(0, 5).map(tx => `
                            <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full ${tx.type === 'receive' ? 'bg-green-100 dark:bg-green-900/20' : 'bg-red-100 dark:bg-red-900/20'} flex items-center justify-center">
                                        <svg class="w-4 h-4 ${tx.type === 'receive' ? 'text-green-500' : 'text-red-500'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${tx.type === 'receive' ? 'M19 14l-7 7m0 0l-7-7m7 7V3' : 'M5 10l7-7m0 0l7 7m-7-7v18'}"/></svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm text-slate-900 dark:text-white">${tx.trx_id}</p>
                                        <p class="text-xs text-textMutedDark">${tx.receiver ? `${tx.receiver.first_name} ${tx.receiver.last_name}` : '—'}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-sm ${tx.type === 'receive' ? 'text-brandGreenBright' : 'text-red-500'}">${tx.type === 'receive' ? '+' : '-'}${formatMoney(tx.amount)}</p>
                                    <p class="text-xs text-textMutedDark">${formatDate(tx.created_at)}</p>
                                </div>
                            </div>
                        `).join('');
                    }
                }
            } catch(err) { console.error('Dashboard load error:', err); }

            // Load profile
            try {
                const profileRes = await fetch(`${API_BASE}/auth/user`, { headers: authHeaders() });
                if (profileRes.ok) {
                    const profileData = await profileRes.json();
                    const u = profileData.user;
                    document.getElementById('profile-info').innerHTML = `
                        <div class="text-center mb-6">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-brandPurple to-brandGreenBright flex items-center justify-center mx-auto text-white text-3xl font-bold mb-3">${(u.first_name || 'A')[0]}</div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">${u.full_name || u.first_name + ' ' + u.last_name}</h3>
                            <span class="px-3 py-1 rounded-full bg-brandPurple/10 text-brandPurple dark:text-[#d3a3ff] text-xs font-semibold mt-2 inline-block">${u.type === 'agent' ? 'Agente' : 'Administrador'}</span>
                        </div>
                        <div class="space-y-3 border-t border-gray-200 dark:border-gray-800 pt-4">
                            <div class="flex justify-between"><span class="text-textMutedDark text-sm">E-mail</span><span class="text-sm font-medium">${u.email}</span></div>
                            <div class="flex justify-between"><span class="text-textMutedDark text-sm">Telefone</span><span class="text-sm font-medium">${u.phone}</span></div>
                            <div class="flex justify-between"><span class="text-textMutedDark text-sm">Nº BI</span><span class="text-sm font-medium">${u.bi_number || '—'}</span></div>
                            <div class="flex justify-between"><span class="text-textMutedDark text-sm">Estado</span><span class="text-sm font-medium">${u.status}</span></div>
                            ${u.wallet ? `<div class="flex justify-between"><span class="text-textMutedDark text-sm">Saldo</span><span class="text-sm font-bold text-brandGreenBright">${formatMoney(u.wallet.balance)} AOA</span></div>` : ''}
                        </div>
                    `;
                }
            } catch(e) {}
        }

        async function loadTransactions(page = 1) {
            const type = document.getElementById('filter-type').value;
            const status = document.getElementById('filter-status').value;
            let url = `${API_BASE}/transactions?page=${page}`;
            if (type) url += `&type=${type}`;
            if (status) url += `&status=${status}`;

            try {
                const res = await fetch(url, { headers: authHeaders() });
                if (res.ok) {
                    const data = await res.json();
                    const txs = data.data || [];
                    const tbody = document.getElementById('transactions-table');
                    if (txs.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="6" class="px-5 py-8 text-center text-textMutedDark">Nenhuma transação encontrada.</td></tr>';
                    } else {
                        tbody.innerHTML = txs.map(tx => `
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                <td class="px-5 py-3 font-medium">${tx.trx_id}</td>
                                <td class="px-5 py-3">${typeBadge(tx.type)}</td>
                                <td class="px-5 py-3 font-bold">${formatMoney(tx.amount)} AOA</td>
                                <td class="px-5 py-3">${tx.receiver ? `${tx.receiver.first_name} ${tx.receiver.last_name}` : '—'}</td>
                                <td class="px-5 py-3">${statusBadge(tx.status)}</td>
                                <td class="px-5 py-3 text-textMutedDark text-xs">${formatDate(tx.created_at)}</td>
                            </tr>
                        `).join('');
                    }

                    // Pagination
                    const pagDiv = document.getElementById('transactions-pagination');
                    if (data.last_page > 1) {
                        let html = '';
                        for (let i = 1; i <= data.last_page; i++) {
                            html += `<button onclick="loadTransactions(${i})" class="px-3 py-1 rounded-lg text-sm ${i === data.current_page ? 'bg-brandPurple text-white' : 'bg-gray-100 dark:bg-gray-800 text-slate-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700'}">${i}</button>`;
                        }
                        pagDiv.innerHTML = html;
                    } else pagDiv.innerHTML = '';
                }
            } catch(e) { console.error(e); }
        }

        async function searchUsers(query) {
            const container = document.getElementById('search-results');
            try {
                const res = await fetch(`${API_BASE}/users/search?query=${encodeURIComponent(query)}`, { headers: authHeaders() });
                if (res.ok) {
                    const data = await res.json();
                    const users = data.users || [];
                    if (users.length === 0) {
                        container.innerHTML = '<p class="text-textMutedDark text-sm">Nenhum utilizador encontrado.</p>';
                    } else {
                        container.innerHTML = users.map(u => `
                            <div class="bg-white dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-4 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brandPurple to-brandGreenBright flex items-center justify-center text-white font-bold text-sm">${(u.first_name || '?')[0]}</div>
                                    <div>
                                        <p class="font-semibold text-sm text-slate-900 dark:text-white">${u.first_name} ${u.last_name}</p>
                                        <p class="text-xs text-textMutedDark">${u.email} • ${u.phone || ''}</p>
                                    </div>
                                </div>
                                <button onclick="document.getElementById('deposit-user-id').value='${u.id}'; showSection('deposit');" class="px-4 py-2 bg-brandPurple/10 text-brandPurple text-xs font-semibold rounded-lg hover:bg-brandPurple hover:text-white transition-colors">Depositar</button>
                            </div>
                        `).join('');
                    }
                }
            } catch(e) { container.innerHTML = '<p class="text-red-500 text-sm">Erro na pesquisa.</p>'; }
        }
    </script>
</body>
</html>
