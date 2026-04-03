@extends('layouts.site')

@section('title', 'Perguntas Frequentes | Kempaga')
@section('meta_description', 'Encontre respostas para as perguntas mais frequentes sobre a Kempaga — conta, pagamentos, segurança, cripto e agentes.')

@section('content')

    <!-- Hero -->
    <section class="max-w-[1400px] mx-auto px-6 lg:px-12 pt-8 pb-16">
        <div class="text-center max-w-3xl mx-auto">
            <span class="px-4 py-1.5 rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20 inline-block mb-6">Centro de Ajuda</span>
            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-6">Perguntas Frequentes</h1>
            <p class="text-textMutedLight dark:text-textMutedDark text-lg">Encontre respostas rápidas para as dúvidas mais comuns sobre o Kempaga.</p>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="w-full bg-white dark:bg-[#0c0914] py-16 border-t border-gray-100 dark:border-gray-900 transition-colors">
        <div class="max-w-[900px] mx-auto px-6 lg:px-12">

            @php
            $categories = [
                'Conta e Registo' => [
                    ['q' => 'Como crio uma conta no Kempaga?', 'a' => 'Descarregue a aplicação Kempaga na Google Play ou App Store, preencha os seus dados pessoais (nome, e-mail, telefone e número do BI), crie uma palavra-passe segura e verifique o seu número de telefone. A sua conta estará activa em segundos.'],
                    ['q' => 'O registo no Kempaga tem algum custo?', 'a' => 'Não. O registo na plataforma Kempaga é totalmente gratuito. Não cobramos taxa de adesão, manutenção mensal ou anuidade.'],
                    ['q' => 'Que documentos preciso para me registar?', 'a' => 'Precisa apenas de um número de telefone válido, um endereço de e-mail e o seu Bilhete de Identidade (BI) angolano para verificação da conta.'],
                    ['q' => 'Posso ter mais do que uma conta?', 'a' => 'Cada utilizador pode ter apenas uma conta associada ao seu BI e número de telefone. Isto garante a segurança e integridade da plataforma.'],
                ],
                'Pagamentos e Transferências' => [
                    ['q' => 'Como envio dinheiro a outra pessoa?', 'a' => 'Abra a app, toque em "Enviar", pesquise o destinatário pelo nome, e-mail ou telefone, insira o montante desejado e confirme. A transferência é processada instantaneamente.'],
                    ['q' => 'Qual o limite de transferência?', 'a' => 'Não existe limite mínimo (acima de 1 AOA). Os limites máximos dependem do nível de verificação da sua conta. Contas verificadas têm limites significativamente mais altos.'],
                    ['q' => 'As transferências são instantâneas?', 'a' => 'Sim! Todas as transferências entre contas Kempaga são processadas instantaneamente, 24 horas por dia, 7 dias por semana, incluindo feriados.'],
                    ['q' => 'Posso cancelar uma transferência?', 'a' => 'Transferências concluídas não podem ser canceladas porque são processadas instantaneamente. Recomendamos sempre verificar os dados do destinatário antes de confirmar.'],
                ],
                'Depósitos e Levantamentos' => [
                    ['q' => 'Como adiciono dinheiro à minha carteira?', 'a' => 'Pode adicionar fundos via Multicaixa Express, transferência bancária ou visitando um agente Kempaga autorizado que registará o depósito na sua conta.'],
                    ['q' => 'Quanto tempo demora um depósito?', 'a' => 'Depósitos via agente Kempaga e Multicaixa Express são instantâneos. Transferências bancárias podem demorar até 24 horas úteis.'],
                    ['q' => 'Onde encontro um agente Kempaga?', 'a' => 'Temos mais de 500 agentes em 18 províncias de Angola. Na app, pode usar a funcionalidade "Encontrar Agente" para localizar o mais próximo de si.'],
                ],
                'Segurança' => [
                    ['q' => 'O Kempaga é seguro?', 'a' => 'Absolutamente. Utilizamos encriptação AES-256 (nível bancário), autenticação de dois factores (2FA), monitorização 24/7 contra fraudes e cumprimos todas as regulamentações do Banco Nacional de Angola (BNA).'],
                    ['q' => 'O que faço se perder o acesso à minha conta?', 'a' => 'Pode recuperar a sua conta através da opção "Esqueceu a senha?" na página de login. Se precisar de mais ajuda, contacte o nosso suporte 24/7 pelo e-mail geral@kempaga.ao.'],
                    ['q' => 'Os meus dados pessoais estão protegidos?', 'a' => 'Sim. Seguimos as melhores práticas de protecção de dados e nunca partilhamos as suas informações com terceiros sem o seu consentimento. Consulte a nossa Política de Privacidade para mais detalhes.'],
                ],
                'Criptomoedas e Câmbio' => [
                    ['q' => 'Posso comprar criptomoedas no Kempaga?', 'a' => 'Sim! O Kempaga permite comprar e vender Bitcoin, Ethereum e outras criptomoedas directamente a partir do seu saldo em Kwanzas.'],
                    ['q' => 'Que divisas posso trocar?', 'a' => 'Actualmente suportamos câmbio entre AOA (Kwanza), USD (Dólar Americano) e EUR (Euro), com taxas competitivas atualizadas em tempo real.'],
                ],
                'Agentes' => [
                    ['q' => 'Como me torno agente Kempaga?', 'a' => 'Pode registar-se como agente através do nosso website. Após a aprovação, terá acesso a um painel exclusivo para processar depósitos e gerir transações dos clientes.'],
                    ['q' => 'Quanto ganho como agente?', 'a' => 'Os agentes ganham comissões competitivas por cada transação processada. O valor varia conforme o tipo e volume de transações. Contacte-nos para mais detalhes sobre o programa de agentes.'],
                ],
            ];
            @endphp

            @foreach($categories as $category => $faqs)
            <div class="mb-10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-brandPurple"></span>
                    {{ $category }}
                </h3>

                <div class="space-y-3">
                    @foreach($faqs as $faq)
                    <div class="faq-item bg-lightBg dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden">
                        <button class="faq-toggle w-full flex items-center justify-between p-5 text-left focus:outline-none group" onclick="this.parentElement.classList.toggle('active'); this.nextElementSibling.classList.toggle('open');">
                            <span class="font-semibold text-slate-900 dark:text-white pr-4">{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 text-textMutedDark flex-shrink-0 transition-transform duration-300 group-[.active]:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="faq-answer px-5 pb-5">
                            <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- CTA -->
    <section class="w-full py-16 transition-colors">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-3xl p-12">
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 dark:text-white mb-4">Não encontrou a sua resposta?</h2>
                <p class="text-textMutedLight dark:text-textMutedDark text-lg mb-8">A nossa equipa de suporte está disponível 24/7 para ajudá-lo.</p>
                <a href="{{ route('site.contact') }}" class="inline-block bg-brandPurple hover:bg-brandPurpleHover text-white font-semibold py-4 px-8 rounded-full transition-all duration-300 text-lg shadow-lg shadow-brandPurple/20">Contactar Suporte</a>
            </div>
        </div>
    </section>

@endsection
