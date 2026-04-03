@extends('layouts.site')

@section('title', 'Termos e Condições | Kempaga')
@section('meta_description', 'Leia os Termos e Condições de utilização da plataforma Kempaga. Conheça os seus direitos e responsabilidades.')

@section('content')

    <section class="max-w-[900px] mx-auto px-6 lg:px-12 pt-8 pb-20">
        <div class="mb-12">
            <span class="px-4 py-1.5 rounded-full bg-brandGreen/10 dark:bg-brandGreen/20 text-brandGreen dark:text-brandGreenBright text-sm font-semibold border border-brandGreen/20 inline-block mb-6">Legal</span>
            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-4">Termos e Condições</h1>
            <p class="text-textMutedLight dark:text-textMutedDark">Última atualização: 1 de Abril de 2026</p>
        </div>

        <div class="space-y-8">

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">1. Definições</h2>
                <div class="text-textMutedLight dark:text-textMutedDark leading-relaxed space-y-2">
                    <p><strong class="text-slate-900 dark:text-white">"Kempaga"</strong> — refere-se à Kempaga, Lda., entidade registada em Angola, proprietária e operadora da plataforma.</p>
                    <p><strong class="text-slate-900 dark:text-white">"Utilizador"</strong> — qualquer pessoa singular ou colectiva que se registe e utilize a plataforma.</p>
                    <p><strong class="text-slate-900 dark:text-white">"Agente"</strong> — utilizador autorizado a processar depósitos e outras operações em nome de clientes.</p>
                    <p><strong class="text-slate-900 dark:text-white">"Carteira"</strong> — conta digital associada a cada utilizador para armazenamento de fundos.</p>
                    <p><strong class="text-slate-900 dark:text-white">"Plataforma"</strong> — a aplicação móvel, website e API do Kempaga, conjuntamente.</p>
                </div>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">2. Aceitação dos Termos</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    Ao criar uma conta ou utilizar os serviços da Kempaga, concorda com os presentes Termos e Condições na sua totalidade. Se não concordar com qualquer cláusula, deve abster-se de utilizar a plataforma. A utilização contínua dos serviços constitui aceitação de quaisquer modificações futuras a estes termos.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">3. Elegibilidade</h2>
                <div class="text-textMutedLight dark:text-textMutedDark leading-relaxed space-y-3">
                    <p>Para utilizar a plataforma Kempaga, o utilizador deve:</p>
                    <ul class="space-y-2 ml-4">
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Ter idade mínima de 18 anos.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Possuir um Bilhete de Identidade angolano válido.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Fornecer informações verdadeiras e actualizadas.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Não ter sido previamente banido da plataforma.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">4. Serviços Oferecidos</h2>
                <div class="text-textMutedLight dark:text-textMutedDark leading-relaxed space-y-3">
                    <p>A plataforma Kempaga oferece os seguintes serviços:</p>
                    <ul class="space-y-2 ml-4">
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Carteira digital com saldo em AOA.</li>
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Transferências P2P (pessoa a pessoa) instantâneas.</li>
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Depósitos via agentes autorizados e Multicaixa Express.</li>
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Pedidos de dinheiro entre utilizadores.</li>
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Câmbio de divisas (AOA, USD, EUR).</li>
                        <li class="flex items-start gap-2"><span class="text-brandPurple font-bold mt-1">•</span>Compra e venda de criptomoedas.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">5. Responsabilidades do Utilizador</h2>
                <div class="text-textMutedLight dark:text-textMutedDark leading-relaxed space-y-3">
                    <p>O utilizador compromete-se a:</p>
                    <ul class="space-y-2 ml-4">
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Manter as suas credenciais de acesso seguras e confidenciais.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Não utilizar a plataforma para actividades ilegais ou fraudulentas.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Notificar imediatamente qualquer actividade suspeita na sua conta.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Manter os seus dados pessoais actualizados.</li>
                        <li class="flex items-start gap-2"><span class="text-brandGreen font-bold mt-1">•</span>Cumprir todas as leis e regulamentações aplicáveis.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">6. Tarifas e Comissões</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    A Kempaga poderá cobrar tarifas pelo uso de determinados serviços. Todas as tarifas serão claramente comunicadas antes da confirmação de qualquer transação. A tabela de tarifas actualizada está disponível na secção "Tarifas" da aplicação. A Kempaga reserva-se o direito de alterar as suas tarifas, com aviso prévio de 30 dias aos utilizadores.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">7. Propriedade Intelectual</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    Todos os direitos de propriedade intelectual relativos à plataforma Kempaga, incluindo mas não se limitando a marcas, logótipos, designs, código-fonte e conteúdo, pertencem exclusivamente à Kempaga, Lda. É proibida a reprodução, distribuição ou modificação de qualquer elemento da plataforma sem autorização expressa por escrito.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">8. Limitação de Responsabilidade</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    A Kempaga não se responsabiliza por: perdas resultantes de utilização indevida da plataforma pelo utilizador; interrupções de serviço causadas por razões fora do nosso controlo (force majeure); transações realizadas por terceiros que tenham obtido acesso à conta do utilizador por negligência deste; flutuações nas taxas de câmbio ou valor de criptomoedas.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">9. Suspensão e Encerramento</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    A Kempaga reserva-se o direito de suspender ou encerrar uma conta caso: o utilizador viole estes Termos e Condições; seja detectada actividade fraudulenta ou suspeita; seja exigido por autoridades reguladoras ou judiciais; o utilizador forneça informações falsas. Em caso de encerramento, quaisquer fundos legítimos na carteira serão devolvidos ao utilizador por meios acordados.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">10. Lei Aplicável e Resolução de Litígios</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    Os presentes Termos e Condições regem-se pela legislação da República de Angola. Qualquer litígio decorrente da utilização da plataforma será resolvido preferencialmente por via amigável. Na impossibilidade de resolução amigável, o litígio será submetido aos tribunais competentes da Comarca de Luanda.
                </p>
            </div>

            <div class="bg-lightCard dark:bg-darkCard border border-gray-200 dark:border-gray-800 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">11. Contacto</h2>
                <p class="text-textMutedLight dark:text-textMutedDark leading-relaxed">
                    Para questões sobre estes Termos e Condições:<br><br>
                    <strong class="text-slate-900 dark:text-white">E-mail:</strong> legal@kempaga.ao<br>
                    <strong class="text-slate-900 dark:text-white">Telefone:</strong> +244 923 456 789<br>
                    <strong class="text-slate-900 dark:text-white">Endereço:</strong> Rua do Exemplo, 123, Luanda, Angola
                </p>
            </div>

        </div>
    </section>

@endsection
