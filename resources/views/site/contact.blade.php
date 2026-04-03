@extends('layouts.site')

@section('title', 'Contacto | Kempaga')
@section('meta_description', 'Entre em contacto com a equipa Kempaga. Suporte 24/7, dúvidas comerciais e parcerias.')

@section('content')

    <!-- Hero -->
    <section class="max-w-[1400px] mx-auto px-6 lg:px-12 pt-8 pb-16">
        <div class="text-center max-w-3xl mx-auto">
            <span class="px-4 py-1.5 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20 inline-block mb-6">Fale Connosco</span>
            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">Contacte-nos</h1>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg">Estamos disponíveis 24/7 para ajudá-lo. Escolha a forma mais conveniente de entrar em contacto.</p>
        </div>
    </section>

    <!-- Contacto Grid -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-16 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                <!-- Card Email -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandPurple/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">E-mail</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark mb-4">Para questões gerais e suporte</p>
                    <a href="mailto:geral@kempaga.ao" class="text-brandPurple font-semibold hover:underline">geral@kempaga.ao</a>
                </div>
                <!-- Card Telefone -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandGreen/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Telefone</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark mb-4">Suporte 24/7</p>
                    <a href="tel:+244923456789" class="text-brandGreen font-semibold hover:underline">+244 923 456 789</a>
                </div>
                <!-- Card Localização -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandPurple/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Escritório</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark mb-4">Visite-nos em Luanda</p>
                    <p class="text-brandPurple font-semibold">Rua do Exemplo, 123<br>Luanda, Angola</p>
                </div>
            </div>

            <!-- Formulário de Contacto -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 lg:p-12">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2 text-center">Envie-nos uma mensagem</h2>
                    <p class="text-textMutedLight dark:text-textMutedDark text-center mb-8">Responderemos dentro de 24 horas.</p>

                    <form class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Nome</label>
                                <input type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="O seu nome">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">E-mail</label>
                                <input type="email" required class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all" placeholder="email@exemplo.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Assunto</label>
                            <select class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all">
                                <option value="">Seleccione um assunto</option>
                                <option>Suporte Técnico</option>
                                <option>Dúvidas sobre a Conta</option>
                                <option>Parcerias Comerciais</option>
                                <option>Ser Agente Kempaga</option>
                                <option>Reclamação</option>
                                <option>Outro</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1.5">Mensagem</label>
                            <textarea rows="5" required class="w-full px-4 py-3 bg-gray-50 dark:bg-[#15111f] border border-gray-200 dark:border-gray-800 rounded-xl text-slate-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brandPurple/50 focus:border-brandPurple transition-all resize-none" placeholder="Escreva a sua mensagem aqui..."></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 bg-brandPurple hover:bg-brandPurpleHover text-white text-lg font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-brandPurple/20">
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
