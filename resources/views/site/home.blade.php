@extends('layouts.site')

@section('title', 'Kempaga | A sua Startup Financeira em Angola')
@section('meta_description', 'Kempaga — Carteira digital angolana com Multicaixa Express, Cripto e Câmbio. Pagamentos instantâneos, seguros e sem limites.')

@section('content')

    <!-- ═══════════════════════════════════════════════ -->
    <!--  HERO SECTION                                   -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="max-w-[1400px] mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 mt-6 pb-20 items-center">

            <!-- Coluna Esquerda (Texto) -->
            <div class="flex flex-col z-10">
                <!-- Badges -->
                <div class="flex flex-wrap gap-3 mb-6">
                    <span class="px-3 py-1 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20">Integração Multicaixa Express</span>
                    <span class="px-3 py-1 rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20">AOA, USD, EUR & Crypto</span>
                </div>

                <h1 class="text-[3.2rem] lg:text-[4.5rem] font-bold leading-[1.05] tracking-tight text-slate-900 dark:text-white transition-colors">
                    A Liberdade Que<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright">Sempre Desejou</span>
                </h1>

                <p class="mt-6 text-textMutedLight dark:text-textMutedDark text-[1.15rem] max-w-[500px] leading-relaxed font-normal transition-colors">
                    Com a solução na mão, irá desfrutar da verdadeira liberdade financeira, podendo controlar, movimentar e receber pagamentos de forma simples, sem limites de horários e localizações.
                </p>

                <!-- Botões de Ação -->
                <div class="flex flex-wrap items-center gap-4 mt-8">
                    <a href="{{ route('site.register') }}" class="bg-brandPurple hover:bg-brandPurpleHover text-white font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg shadow-lg shadow-brandPurple/20">
                        Começar Agora
                    </a>
                    <a href="#negocio" class="bg-transparent border-2 border-slate-300 text-slate-700 hover:border-brandGreen hover:bg-brandGreen hover:text-white dark:border-gray-600 dark:text-white dark:hover:border-brandGreen dark:hover:bg-brandGreen font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg">
                        Para o Seu Negócio
                    </a>
                </div>

                <!-- Trust Stats -->
                <div class="flex items-center gap-8 mt-10 pt-6 border-t border-gray-200 dark:border-gray-800">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-slate-900 dark:text-white">100%</span>
                        <span class="text-textMutedLight dark:text-textMutedDark text-sm">Seguro</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-slate-900 dark:text-white">0 AOA</span>
                        <span class="text-textMutedLight dark:text-textMutedDark text-sm">Taxa de Adesão</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-slate-900 dark:text-white">24/7</span>
                        <span class="text-textMutedLight dark:text-textMutedDark text-sm">Suporte Online</span>
                    </div>
                </div>
            </div>

            <!-- Coluna Direita (Imagem) -->
            <div class="relative w-full max-w-[550px] mx-auto lg:ml-auto lg:mr-0 mt-10 lg:mt-0 flex flex-col items-end">
                <div class="relative bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-[2.5rem] p-4 w-full aspect-[4/4.5] shadow-2xl transition-all duration-300">
                    <div class="w-full h-full bg-gray-200 dark:bg-[#201c29] rounded-[2rem] overflow-hidden relative flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=800&auto=format&fit=crop" alt="Pagamentos por telemóvel" class="w-full h-full object-cover opacity-90 transition-transform duration-700 hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-brandPurple/30 to-transparent mix-blend-multiply dark:mix-blend-color"></div>
                    </div>

                    <!-- Card Flutuante -->
                    <div class="absolute -left-4 lg:-left-12 bottom-16 backdrop-blur-xl bg-white/90 dark:bg-[#1a1625]/85 border border-white/60 dark:border-gray-700/50 rounded-2xl p-4 flex items-center gap-4 min-w-[280px] shadow-2xl z-20 transition-colors">
                        <div class="h-10 w-10 rounded-full bg-brandGreen/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-brandGreen dark:text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-900 dark:text-white font-semibold text-sm">Pagamento Recebido</p>
                            <p class="text-slate-500 dark:text-gray-400 text-xs mt-0.5">Multicaixa Express</p>
                        </div>
                        <div class="text-right">
                            <p class="text-brandGreen dark:text-brandGreenBright font-bold text-lg">+ 15.000</p>
                            <p class="text-slate-500 dark:text-gray-400 text-xs mt-0.5 font-medium">AOA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  FUNCIONALIDADES                                -->
    <!-- ═══════════════════════════════════════════════ -->
    <section id="funcionalidades" class="w-full bg-white dark:bg-[#0c0914] py-20 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">
                    Transações simplificadas,<br>onde e quando quiser
                </h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg">
                    Receba e realize pagamentos instantâneos de forma segura e sem complicações. Aceda a todas as suas opções de transação, em qualquer lugar e a qualquer hora.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-brandPurple/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">O Terminal de Vendas Ideal</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">O Kempaga transforma qualquer ponto num local de vendas. Rápido, eficiente e ideal para pequenos e grandes negócios.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-brandGreen/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">O Melhor Produto</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">Uma carteira digital completa. Compre ou venda Criptomoedas, troque para Dólares ou Euros de forma rápida e segura.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-brandPurple/10 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">As Melhores Tarifas</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">Crescemos junto consigo. Oferecemos as taxas mais baixas e transparentes do mercado angolano.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  COMO FUNCIONA                                  -->
    <!-- ═══════════════════════════════════════════════ -->
    <section id="como-funciona" class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="px-4 py-1.5 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20 inline-block mb-6">Simples & Rápido</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">
                    Comece em 3 passos simples
                </h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg">
                    Aderir ao Kempaga é gratuito e demora menos de 2 minutos. Sem burocracia, sem complicações.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Linha conectora (desktop) -->
                <div class="hidden md:block absolute top-16 left-[16.67%] right-[16.67%] h-0.5 bg-gradient-to-r from-brandPurple via-brandGreenBright to-brandPurple opacity-20"></div>

                <!-- Passo 1 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 rounded-full bg-brandPurple text-white text-2xl font-bold flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brandPurple/30 relative z-10">1</div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Crie a Sua Conta</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">Descarregue a app, insira os seus dados e verifique o seu número de telefone. Pronto em segundos!</p>
                </div>
                <!-- Passo 2 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 rounded-full bg-brandGreen text-white text-2xl font-bold flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brandGreen/30 relative z-10">2</div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Adicione Fundos</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">Carregue a sua carteira via Multicaixa Express, transferência bancária ou num dos nossos agentes autorizados.</p>
                </div>
                <!-- Passo 3 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 rounded-full bg-brandPurple text-white text-2xl font-bold flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brandPurple/30 relative z-10">3</div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Pague & Receba</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark">Envie dinheiro, pague contas, compre cripto ou câmbio — tudo instantâneo e sem limitações de horário.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  DOWNLOAD DA APP                                -->
    <!-- ═══════════════════════════════════════════════ -->
    <section id="download" class="w-full bg-gradient-to-br from-brandPurple to-[#5a0f94] py-20 relative overflow-hidden">
        <!-- Decoração -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-brandGreen/10 rounded-full translate-x-1/3 translate-y-1/3"></div>

        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Texto -->
                <div>
                    <span class="px-4 py-1.5 rounded-full bg-white/10 text-white text-sm font-semibold border border-white/20 inline-block mb-6">📱 App Disponível</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                        A sua carteira digital<br>sempre no bolso
                    </h2>
                    <p class="text-white/70 text-lg mb-8 max-w-md leading-relaxed">
                        Descarregue a aplicação Kempaga gratuitamente e tenha acesso a todas as funcionalidades directamente no seu smartphone. Disponível para Android e iOS.
                    </p>

                    <!-- Botões de Download -->
                    <div class="flex flex-wrap gap-4">
                        <!-- Google Play -->
                        <a href="#" class="flex items-center gap-3 bg-black/40 backdrop-blur-sm text-white rounded-2xl px-6 py-3.5 hover:bg-black/70 transition-all border border-white/10">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 01-.61-.92V2.734a1 1 0 01.609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-1.707l2.108 1.22a1 1 0 010 1.56l-2.108 1.22-2.537-2.537 2.537-2.463zM5.864 2.658L16.8 8.99l-2.302 2.302-8.634-8.634z"/></svg>
                            <div>
                                <p class="text-xs opacity-70">Disponível no</p>
                                <p class="text-lg font-semibold leading-tight">Google Play</p>
                            </div>
                        </a>
                        <!-- App Store -->
                        <a href="#" class="flex items-center gap-3 bg-black/40 backdrop-blur-sm text-white rounded-2xl px-6 py-3.5 hover:bg-black/70 transition-all border border-white/10">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.04 2.26-.74 3.58-.8 1.58-.06 2.88.58 3.56 1.5-3.06 1.74-2.52 5.95.38 7.15-.75 1.83-1.68 3.51-2.6 4.32zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                            <div>
                                <p class="text-xs opacity-70">Baixar na</p>
                                <p class="text-lg font-semibold leading-tight">App Store</p>
                            </div>
                        </a>
                    </div>

                    <!-- Star rating -->
                    <div class="mt-8 flex items-center gap-3">
                        <div class="flex text-yellow-400">
                            @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <span class="text-white/80 text-sm font-medium">4.8 — Mais de 10.000 downloads</span>
                    </div>
                </div>

                <!-- Mockup do Telemóvel -->
                <div class="flex justify-center lg:justify-end">
                    <div class="relative">
                        <!-- Phone Frame -->
                        <div class="w-[280px] h-[560px] bg-black rounded-[3rem] p-3 shadow-2xl shadow-black/50 border-2 border-gray-800 relative">
                            <!-- Notch -->
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-7 bg-black rounded-b-2xl z-20"></div>
                            <!-- Screen -->
                            <div class="w-full h-full bg-gradient-to-b from-brandPurple/90 to-darkBg rounded-[2.3rem] overflow-hidden relative">
                                <!-- Status bar -->
                                <div class="flex justify-between items-center px-6 pt-10 pb-4">
                                    <span class="text-white/80 text-xs font-medium">09:41</span>
                                    <div class="flex items-center gap-1">
                                        <div class="w-4 h-2 border border-white/60 rounded-sm"><div class="w-3 h-1.5 bg-brandGreenBright rounded-sm"></div></div>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="px-5 pt-2">
                                    <p class="text-white/60 text-xs mb-1">Olá, João 👋</p>
                                    <p class="text-white text-xl font-bold mb-6">Saldo Disponível</p>
                                    <div class="bg-white/10 backdrop-blur rounded-2xl p-4 mb-4">
                                        <p class="text-white/60 text-xs">AOA</p>
                                        <p class="text-white text-3xl font-bold">125.750<span class="text-lg">,00</span></p>
                                    </div>
                                    <!-- Quick Actions -->
                                    <div class="grid grid-cols-4 gap-2 mb-4">
                                        <div class="flex flex-col items-center gap-1.5">
                                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg></div>
                                            <span class="text-[10px] text-white/70">Enviar</span>
                                        </div>
                                        <div class="flex flex-col items-center gap-1.5">
                                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg></div>
                                            <span class="text-[10px] text-white/70">Receber</span>
                                        </div>
                                        <div class="flex flex-col items-center gap-1.5">
                                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg></div>
                                            <span class="text-[10px] text-white/70">Depósito</span>
                                        </div>
                                        <div class="flex flex-col items-center gap-1.5">
                                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg></div>
                                            <span class="text-[10px] text-white/70">Câmbio</span>
                                        </div>
                                    </div>
                                    <!-- Transactions -->
                                    <p class="text-white/60 text-xs mb-2 mt-2">Actividade Recente</p>
                                    <div class="space-y-2.5">
                                        <div class="flex items-center justify-between bg-white/5 rounded-xl p-2.5">
                                            <div class="flex items-center gap-2.5">
                                                <div class="w-8 h-8 rounded-full bg-brandGreen/30 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg></div>
                                                <div><p class="text-white text-xs font-semibold">Recebido</p><p class="text-white/40 text-[10px]">Maria S.</p></div>
                                            </div>
                                            <p class="text-brandGreenBright text-xs font-bold">+15.000</p>
                                        </div>
                                        <div class="flex items-center justify-between bg-white/5 rounded-xl p-2.5">
                                            <div class="flex items-center gap-2.5">
                                                <div class="w-8 h-8 rounded-full bg-red-500/20 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg></div>
                                                <div><p class="text-white text-xs font-semibold">Enviado</p><p class="text-white/40 text-[10px]">Pedro L.</p></div>
                                            </div>
                                            <p class="text-red-400 text-xs font-bold">-5.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Glow effect -->
                        <div class="absolute -inset-8 bg-brandPurple/20 rounded-full blur-3xl -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  NOSSOS NÚMEROS                                 -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-20 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">Números que falam por nós</h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg">O crescimento do Kempaga é impulsionado pela confiança dos nossos utilizadores.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl">
                    <p class="text-4xl lg:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright" data-counter="50000">50K+</p>
                    <p class="text-textMutedLight dark:text-textMutedDark mt-2 font-medium">Utilizadores</p>
                </div>
                <div class="text-center p-6 bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl">
                    <p class="text-4xl lg:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright">2M+</p>
                    <p class="text-textMutedLight dark:text-textMutedDark mt-2 font-medium">Transações</p>
                </div>
                <div class="text-center p-6 bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl">
                    <p class="text-4xl lg:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright">500+</p>
                    <p class="text-textMutedLight dark:text-textMutedDark mt-2 font-medium">Agentes</p>
                </div>
                <div class="text-center p-6 bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl">
                    <p class="text-4xl lg:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright">18</p>
                    <p class="text-textMutedLight dark:text-textMutedDark mt-2 font-medium">Províncias</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  PARA O SEU NEGÓCIO                             -->
    <!-- ═══════════════════════════════════════════════ -->
    <section id="negocio" class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Imagem/Visual -->
                <div class="order-2 lg:order-1">
                    <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 space-y-4">
                        <!-- Mini Dashboard Preview -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-sm text-textMutedLight dark:text-textMutedDark">Receita Mensal</p>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">1.250.000 <span class="text-base text-textMutedDark">AOA</span></p>
                            </div>
                            <span class="px-3 py-1 bg-brandGreen/10 text-brandGreenBright text-sm font-semibold rounded-full">+23%</span>
                        </div>
                        <!-- Bar chart -->
                        <div class="flex items-end gap-2 h-32">
                            @php $bars = [40, 65, 45, 80, 55, 95, 70, 85, 60, 90, 75, 100]; @endphp
                            @foreach($bars as $i => $h)
                            <div class="flex-1 rounded-t-lg transition-all hover:opacity-80 {{ $i % 2 === 0 ? 'bg-brandPurple/60' : 'bg-brandGreen/60' }}" style="height: {{ $h }}%"></div>
                            @endforeach
                        </div>
                        <div class="flex justify-between text-xs text-textMutedDark">
                            <span>Jan</span><span>Fev</span><span>Mar</span><span>Abr</span><span>Mai</span><span>Jun</span><span>Jul</span><span>Ago</span><span>Set</span><span>Out</span><span>Nov</span><span>Dez</span>
                        </div>
                    </div>
                </div>

                <!-- Texto -->
                <div class="order-1 lg:order-2">
                    <span class="px-4 py-1.5 rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20 inline-block mb-6">Para Negócios</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">
                        Faça o seu negócio crescer com o Kempaga
                    </h2>
                    <p class="text-textMutedLight dark:text-textMutedDark text-lg mb-8 leading-relaxed">
                        Aceite pagamentos via Multicaixa Express, QR Code ou link directo. Receba instantaneamente na sua carteira e acompanhe toda a actividade em tempo real.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-slate-700 dark:text-gray-300">Pagamentos instantâneos sem TPA</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-slate-700 dark:text-gray-300">Relatórios e analytics em tempo real</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-slate-700 dark:text-gray-300">Integração via API para e-commerce</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-brandGreen/20 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-brandGreenBright" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-slate-700 dark:text-gray-300">Tarifas mais baixas do mercado</span>
                        </li>
                    </ul>
                    <a href="{{ route('site.contact') }}" class="inline-block bg-brandGreen hover:bg-brandGreenHover text-white font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg shadow-lg shadow-brandGreen/20">
                        Falar com Vendas
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  PARCEIROS / CLIENTES                           -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-16 border-t border-gray-100 dark:border-gray-900 transition-colors overflow-hidden">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <p class="text-center text-textMutedLight dark:text-textMutedDark text-sm font-medium mb-10 uppercase tracking-wider">Parceiros e Empresas que confiam no Kempaga</p>

            <div class="relative overflow-hidden">
                <div class="flex items-center gap-16 partners-scroll" style="width: max-content;">
                    @php $partners = ['Multicaixa', 'BAI', 'BFA', 'Standard Bank', 'Unitel', 'Africell', 'TAAG', 'KixiCrédito', 'Multicaixa', 'BAI', 'BFA', 'Standard Bank', 'Unitel', 'Africell', 'TAAG', 'KixiCrédito']; @endphp
                    @foreach($partners as $partner)
                    <div class="flex items-center justify-center min-w-[140px] h-12 px-6 bg-gray-100 dark:bg-gray-800/50 rounded-xl">
                        <span class="text-slate-500 dark:text-gray-400 font-semibold text-sm whitespace-nowrap">{{ $partner }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  SEGURANÇA                                      -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-[2.5rem] p-8 lg:p-16 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute top-0 right-0 w-80 h-80 bg-brandPurple/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
                    <div>
                        <span class="px-4 py-1.5 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20 inline-block mb-6">🔒 Segurança</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">
                            O seu dinheiro está protegido
                        </h2>
                        <p class="text-textMutedLight dark:text-textMutedDark text-lg leading-relaxed">
                            A segurança é a nossa prioridade máxima. Utilizamos as mais avançadas tecnologias de encriptação e protecção para garantir que cada transação é completamente segura.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-lightBg dark:bg-[#15111f] rounded-2xl p-5 border border-gray-200 dark:border-gray-800">
                            <div class="w-10 h-10 rounded-xl bg-brandPurple/10 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">Encriptação AES-256</h4>
                            <p class="text-textMutedLight dark:text-textMutedDark text-sm">Nível bancário de encriptação</p>
                        </div>
                        <div class="bg-lightBg dark:bg-[#15111f] rounded-2xl p-5 border border-gray-200 dark:border-gray-800">
                            <div class="w-10 h-10 rounded-xl bg-brandGreen/10 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">Autenticação 2FA</h4>
                            <p class="text-textMutedLight dark:text-textMutedDark text-sm">Dupla verificação sempre</p>
                        </div>
                        <div class="bg-lightBg dark:bg-[#15111f] rounded-2xl p-5 border border-gray-200 dark:border-gray-800">
                            <div class="w-10 h-10 rounded-xl bg-brandGreen/10 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">Monitorização 24/7</h4>
                            <p class="text-textMutedLight dark:text-textMutedDark text-sm">Detecção de fraudes em tempo real</p>
                        </div>
                        <div class="bg-lightBg dark:bg-[#15111f] rounded-2xl p-5 border border-gray-200 dark:border-gray-800">
                            <div class="w-10 h-10 rounded-xl bg-brandPurple/10 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 dark:text-white mb-1">Regulado pelo BNA</h4>
                            <p class="text-textMutedLight dark:text-textMutedDark text-sm">Conformidade total com o BNA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  TESTEMUNHOS / FEEDBACKS                        -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-20 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">O que dizem os nossos utilizadores</h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg">Milhares de angolanos já confiam no Kempaga para gerir as suas finanças.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $testimonials = [
                    ['name' => 'Maria José', 'role' => 'Empresária, Luanda', 'text' => 'O Kempaga revolucionou a forma como recebo pagamentos no meu negócio. Sem TPA, sem filas, tudo instantâneo. Os meus clientes adoram!', 'stars' => 5],
                    ['name' => 'Pedro Afonso', 'role' => 'Estudante, Benguela', 'text' => 'Uso o Kempaga para receber mesada e pagar as minhas despesas. A app é super fácil e nunca tive problemas. Recomendo a todos.', 'stars' => 5],
                    ['name' => 'Ana Cristina', 'role' => 'Freelancer, Huambo', 'text' => 'Recebi o meu primeiro pagamento internacional via cripto no Kempaga e converti para Kwanzas em minutos. Incrível não depender de banco!', 'stars' => 5],
                ];
                @endphp

                @foreach($testimonials as $t)
                <div class="bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 relative">
                    <!-- Quote icon -->
                    <div class="absolute top-6 right-6 text-brandPurple/20 dark:text-brandPurple/10">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    </div>

                    <!-- Stars -->
                    <div class="flex text-yellow-400 mb-4">
                        @for ($i = 0; $i < $t['stars']; $i++)
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>

                    <p class="text-slate-700 dark:text-gray-300 mb-6 italic leading-relaxed">"{{ $t['text'] }}"</p>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brandPurple to-brandGreenBright flex items-center justify-center text-white font-bold text-sm">
                            {{ substr($t['name'], 0, 1) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm">{{ $t['name'] }}</p>
                            <p class="text-textMutedLight dark:text-textMutedDark text-xs">{{ $t['role'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════ -->
    <!--  CTA FINAL                                      -->
    <!-- ═══════════════════════════════════════════════ -->
    <section class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="bg-gradient-to-r from-brandPurple to-brandGreenBright rounded-[2.5rem] p-12 lg:p-20 text-center relative overflow-hidden">
                <!-- Decoração -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

                <div class="relative z-10">
                    <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6">
                        Pronto para a liberdade<br>financeira?
                    </h2>
                    <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto">
                        Junte-se a milhares de angolanos que já utilizam o Kempaga. Crie a sua conta gratuitamente e comece a transacionar em minutos.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('site.register') }}" class="bg-white text-brandPurple hover:bg-gray-100 font-semibold py-4 px-10 rounded-full transition-all duration-300 text-lg shadow-lg">
                            Criar Conta Grátis
                        </a>
                        <a href="{{ route('site.about') }}" class="bg-transparent border-2 border-white/40 text-white hover:bg-white/10 font-semibold py-4 px-10 rounded-full transition-all duration-300 text-lg">
                            Saber Mais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
