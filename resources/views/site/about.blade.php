@extends('layouts.site')

@section('title', 'Sobre Nós | Kempaga')
@section('meta_description', 'Conheça a Kempaga — a startup financeira angolana que está a democratizar o acesso aos serviços financeiros digitais.')

@section('content')

    <!-- Hero -->
    <section class="max-w-[1400px] mx-auto px-6 lg:px-12 pt-8 pb-20">
        <div class="text-center max-w-3xl mx-auto">
            <span class="px-4 py-1.5 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 text-brandPurple dark:text-[#d3a3ff] text-sm font-semibold border border-brandPurple/20 inline-block mb-6">Sobre Nós</span>
            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6 leading-tight">
                A revolução financeira<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brandPurple to-brandGreenBright">começa em Angola</span>
            </h1>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg max-w-2xl mx-auto leading-relaxed">
                O Kempaga nasceu com a missão de simplificar a vida financeira dos angolanos, oferecendo uma plataforma digital acessível, segura e inovadora que elimina barreiras e conecta pessoas e negócios.
            </p>
        </div>
    </section>

    <!-- Nossa História -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-20 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="px-4 py-1.5 rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20 inline-block mb-6">A Nossa História</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">De uma ideia à transformação financeira</h2>
                    <div class="space-y-4 text-textMutedLight dark:text-textMutedDark text-[1.05rem] leading-relaxed">
                        <p>Fundada em 2024 em Luanda, a Kempaga surgiu da necessidade de oferecer uma alternativa digital moderna aos serviços financeiros tradicionais em Angola.</p>
                        <p>Num país onde grande parte da população ainda não tem acesso fácil a serviços bancários, o Kempaga propõe-se a ser a ponte entre o dinheiro físico e o digital, permitindo a qualquer pessoa — com apenas um smartphone — gerir as suas finanças de forma completa.</p>
                        <p>Através da integração com o Multicaixa Express e da nossa rede de agentes em todo o território nacional, tornamos possível depositar, enviar, receber e trocar dinheiro de forma instantânea e segura.</p>
                    </div>
                </div>

                <!-- Timeline Visual -->
                <div class="space-y-6">
                    @php
                    $timeline = [
                        ['year' => '2024', 'title' => 'Fundação', 'desc' => 'Nasceu o Kempaga em Luanda com a visão de democratizar as finanças digitais em Angola.'],
                        ['year' => '2024', 'title' => 'Primeira Versão', 'desc' => 'Lançamento da app com funcionalidades de carteira digital e transferências P2P.'],
                        ['year' => '2025', 'title' => 'Integração Multicaixa', 'desc' => 'Integração completa com a rede Multicaixa Express para depósitos e pagamentos.'],
                        ['year' => '2025', 'title' => 'Rede de Agentes', 'desc' => 'Expansão da rede de agentes para 500+ pontos em 18 províncias.'],
                        ['year' => '2026', 'title' => 'Cripto & Câmbio', 'desc' => 'Lançamento dos serviços de criptomoedas e câmbio de divisas.'],
                    ];
                    @endphp

                    @foreach($timeline as $item)
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-brandPurple/10 dark:bg-brandPurple/20 flex items-center justify-center flex-shrink-0">
                                <span class="text-brandPurple font-bold text-xs">{{ $item['year'] }}</span>
                            </div>
                            @if(!$loop->last)
                            <div class="w-0.5 flex-1 bg-gray-200 dark:bg-gray-800 mt-2"></div>
                            @endif
                        </div>
                        <div class="pb-6">
                            <h4 class="font-bold text-slate-900 dark:text-white">{{ $item['title'] }}</h4>
                            <p class="text-textMutedLight dark:text-textMutedDark text-sm mt-1">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Missão, Visão, Valores -->
    <section class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Missão -->
                <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandPurple/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Missão</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">Democratizar o acesso aos serviços financeiros digitais em Angola, oferecendo uma plataforma simples, segura e acessível para todos.</p>
                </div>
                <!-- Visão -->
                <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandGreen/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandGreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Visão</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">Ser a principal referência em pagamentos digitais e serviços fintech em Angola e na África Lusófona até 2028.</p>
                </div>
                <!-- Valores -->
                <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 rounded-2xl bg-brandPurple/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandPurple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Valores</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">Transparência, inovação, inclusão financeira, segurança e compromisso com a comunidade angolana.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipa -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-20 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">A nossa equipa</h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg">Profissionais apaixonados por tecnologia e inclusão financeira.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                $team = [
                    ['name' => 'Jorge Edvaldo', 'role' => 'CEO & Fundador', 'initials' => 'JE', 'color' => 'from-brandPurple to-brandGreenBright'],
                    ['name' => 'Ana Beatriz', 'role' => 'CTO', 'initials' => 'AB', 'color' => 'from-brandGreen to-brandGreenBright'],
                    ['name' => 'Carlos Manuel', 'role' => 'CFO', 'initials' => 'CM', 'color' => 'from-brandPurple to-[#d3a3ff]'],
                    ['name' => 'Fernanda Costa', 'role' => 'Head de Operações', 'initials' => 'FC', 'color' => 'from-brandGreenBright to-brandGreen'],
                ];
                @endphp

                @foreach($team as $member)
                <div class="text-center group">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br {{ $member['color'] }} flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">
                        {{ $member['initials'] }}
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $member['name'] }}</h3>
                    <p class="text-textMutedLight dark:text-textMutedDark text-sm">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="w-full py-20 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-6">Quer fazer parte da mudança?</h2>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg mb-8 max-w-2xl mx-auto">Crie a sua conta hoje ou torne-se agente Kempaga e ajude a transformar o acesso financeiro em Angola.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('site.register') }}" class="bg-brandPurple hover:bg-brandPurpleHover text-white font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg shadow-lg shadow-brandPurple/20">Tornar-se Agente</a>
                <a href="{{ route('site.contact') }}" class="bg-transparent border-2 border-slate-300 text-slate-700 hover:border-brandGreen hover:bg-brandGreen hover:text-white dark:border-gray-600 dark:text-white dark:hover:border-brandGreen font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg">Contactar-nos</a>
            </div>
        </div>
    </section>

@endsection
