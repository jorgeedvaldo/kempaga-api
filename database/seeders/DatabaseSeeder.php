<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use App\Models\MoneyRequest;

/**
 * Seeder principal da base de dados.
 *
 * Cria dados falsos para fins de teste:
 * - 2 admins (admin@kempaga.com, admin2@kempaga.com)
 * - 10 agentes
 * - 48 clientes
 * - 1 carteira por utilizador
 * - 220+ transações com lançamentos (double-entry)
 * - 60+ pedidos de dinheiro
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Nomes angolanos comuns para dados realistas.
     */
    private array $firstNames = [
        'João', 'Maria', 'Pedro', 'Ana', 'Carlos', 'Francisca', 'Manuel', 'Teresa',
        'António', 'Rosa', 'José', 'Luísa', 'Francisco', 'Helena', 'Paulo', 'Isabel',
        'Fernando', 'Catarina', 'Ricardo', 'Beatriz', 'Daniel', 'Sofia', 'André',
        'Margarida', 'Rui', 'Joana', 'Miguel', 'Inês', 'Tiago', 'Marta', 'Bruno',
        'Cláudia', 'Filipe', 'Sara', 'David', 'Raquel', 'Nuno', 'Patrícia', 'Diogo',
        'Lúcia', 'Hugo', 'Carla', 'Rafael', 'Sandra', 'Luís', 'Vera', 'Gonçalo',
        'Cristina', 'Sérgio', 'Susana', 'Eduardo', 'Elisa', 'Marcos', 'Diana',
        'Vasco', 'Liliana', 'Gustavo', 'Vanessa', 'Simão', 'Mónica',
    ];

    private array $lastNames = [
        'Silva', 'Santos', 'Ferreira', 'Pereira', 'Oliveira', 'Costa', 'Rodrigues',
        'Martins', 'Sousa', 'Fernandes', 'Gonçalves', 'Gomes', 'Lopes', 'Marques',
        'Almeida', 'Ribeiro', 'Pinto', 'Carvalho', 'Teixeira', 'Moreira', 'Correia',
        'Mendes', 'Nunes', 'Vieira', 'Cardoso', 'Rocha', 'Raposo', 'Nascimento',
        'Baptista', 'Domingos', 'Gaspar', 'Fonseca', 'Machado', 'Tavares', 'Reis',
        'Monteiro', 'Araújo', 'Barbosa', 'Castro', 'Coelho', 'Matos', 'Lourenço',
        'Cruz', 'Branco', 'Antunes', 'Simões', 'Andrade', 'Campos', 'Henriques',
        'Ramos', 'Freitas', 'Pires', 'Figueiredo', 'Amaral', 'Borges', 'Magalhães',
        'Cunha', 'Esteves', 'Guerra', 'Pacheco',
    ];

    private array $transactionNotes = [
        'Almoço', 'Jantar', 'Combustível', 'Renda', 'Supermercado',
        'Farmácia', 'Electricidade', 'Água', 'Internet', 'Telefone',
        'Transporte', 'Material escolar', 'Roupas', 'Presente',
        'Devolução de empréstimo', 'Ajuda familiar', 'Serviço prestado',
        'Pagamento de dívida', 'Contribuição para festa', 'Taxa de matrícula',
        'Reparação do carro', 'Consulta médica', 'Compra de crédito',
        'Encomenda online', 'Propina escolar', 'Mesada', 'Gorjeta',
        'Compra de bilhete', 'Pagamento freelance', 'Quota do ginásio',
    ];

    private array $moneyRequestNotes = [
        'Devolve o que me deves', 'Para o almoço de amanhã', 'A minha parte da conta',
        'Empréstimo urgente', 'Precisamos dividir a conta', 'Para a renda deste mês',
        'Ajuda com a propina', 'Reembolso da compra', 'Dinheiro para o táxi',
        'Contribuição para o presente', 'Para pagar a internet', 'Despesas do condomínio',
        'A tua parte do jantar', 'Reembolso do bilhete', 'Para comprar material',
    ];

    public function run(): void
    {
        $this->command->info('🌱 A criar dados de teste para Kempaga...');

        // ──────────────────────────────────────
        //  1. UTILIZADORES (60 total)
        // ──────────────────────────────────────
        $this->command->info('👤 A criar utilizadores...');

        $users = [];
        $password = Hash::make('password');

        // 2 Admins
        $users[] = User::create([
            'first_name' => 'Admin',
            'last_name'  => 'Kempaga',
            'email'      => 'admin@kempaga.com',
            'phone'      => '+244900000001',
            'password'   => $password,
            'type'       => 'admin',
            'status'     => 'active',
            'bi_number'  => '000000001LA001',
            'image_url'  => null,
        ]);

        $users[] = User::create([
            'first_name' => 'Admin',
            'last_name'  => 'Secundário',
            'email'      => 'admin2@kempaga.com',
            'phone'      => '+244900000002',
            'password'   => $password,
            'type'       => 'admin',
            'status'     => 'active',
            'bi_number'  => '000000002LA001',
            'image_url'  => null,
        ]);

        // 10 Agentes
        for ($i = 1; $i <= 10; $i++) {
            $fn = $this->firstNames[array_rand($this->firstNames)];
            $ln = $this->lastNames[array_rand($this->lastNames)];
            $users[] = User::create([
                'first_name' => $fn,
                'last_name'  => $ln,
                'email'      => 'agente' . $i . '@kempaga.com',
                'phone'      => '+244910' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'password'   => $password,
                'type'       => 'agent',
                'status'     => $i <= 9 ? 'active' : 'inactive', // 1 inativo
                'bi_number'  => 'AG' . str_pad($i, 10, '0', STR_PAD_LEFT) . 'LA',
                'image_url'  => null,
            ]);
        }

        // 48 Clientes
        $usedEmails = [];
        for ($i = 1; $i <= 48; $i++) {
            $fn = $this->firstNames[($i - 1) % count($this->firstNames)];
            $ln = $this->lastNames[($i - 1) % count($this->lastNames)];

            // Email único baseado no nome
            $emailBase = strtolower(
                str_replace(['á','é','í','ó','ú','ã','õ','ç','à','â','ê','ô','ü','Á','É','Í','Ó','Ú','Ã','Õ','Ç'],
                            ['a','e','i','o','u','a','o','c','a','a','e','o','u','a','e','i','o','u','a','o','c'],
                            $fn)
            );
            $email = $emailBase . $i . '@email.com';

            $statuses = ['active', 'active', 'active', 'active', 'active',
                         'active', 'active', 'active', 'inactive', 'blocked'];

            $users[] = User::create([
                'first_name' => $fn,
                'last_name'  => $ln,
                'email'      => $email,
                'phone'      => '+244922' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'password'   => $password,
                'type'       => 'customer',
                'status'     => $statuses[array_rand($statuses)],
                'bi_number'  => 'CL' . str_pad($i, 10, '0', STR_PAD_LEFT) . 'LA',
                'image_url'  => null,
            ]);
        }

        $this->command->info('   ✅ ' . count($users) . ' utilizadores criados');

        // ──────────────────────────────────────
        //  2. CARTEIRAS (1 por utilizador)
        // ──────────────────────────────────────
        $this->command->info('💳 A criar carteiras...');

        $wallets = [];
        foreach ($users as $user) {
            // Saldo inicial: admins e agentes com mais dinheiro
            $initialBalance = match ($user->type) {
                'admin' => rand(500000, 2000000) / 100, // 5.000 - 20.000 AOA
                'agent' => rand(1000000, 10000000) / 100, // 10.000 - 100.000 AOA
                default => rand(0, 5000000) / 100, // 0 - 50.000 AOA
            };

            $wallets[$user->id] = Wallet::create([
                'user_id'  => $user->id,
                'balance'  => $initialBalance,
                'currency' => 'AOA',
            ]);
        }

        $this->command->info('   ✅ ' . count($wallets) . ' carteiras criadas');

        // ──────────────────────────────────────
        //  3. TRANSAÇÕES (220+)
        // ──────────────────────────────────────
        $this->command->info('💸 A criar transações...');

        $activeUsers = collect($users)->filter(fn($u) => $u->status === 'active')->values();
        $transactionCount = 0;
        $entryCount = 0;

        // --- 120 Transferências P2P ---
        for ($i = 0; $i < 120; $i++) {
            $sender = $activeUsers->random();
            $receiver = $activeUsers->filter(fn($u) => $u->id !== $sender->id)->random();

            $amount = rand(100, 50000) / 100; // 1 - 500 AOA
            $charge = 0.00;
            $netAmount = $amount - $charge;

            $senderWallet = $wallets[$sender->id];
            $receiverWallet = $wallets[$receiver->id];

            $senderBalanceAfter = max(0, $senderWallet->balance - $netAmount);
            $receiverBalanceAfter = $receiverWallet->balance + $netAmount;

            $trxId = 'TRX-' . strtoupper(Str::random(8));
            $note = $this->transactionNotes[array_rand($this->transactionNotes)];

            $statuses = ['completed', 'completed', 'completed', 'completed',
                         'completed', 'completed', 'completed', 'pending', 'failed'];
            $status = $statuses[array_rand($statuses)];

            $createdAt = now()->subDays(rand(0, 90))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            // Registo do remetente (send)
            $senderTx = Transaction::create([
                'trx_id'           => $trxId,
                'user_id'          => $sender->id,
                'type'             => 'send',
                'transaction_type' => 'transfer',
                'amount'           => $amount,
                'charge'           => $charge,
                'net_amount'       => $netAmount,
                'balance_after'    => $senderBalanceAfter,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => $note,
                'status'           => $status,
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            // Registo do recetor (receive)
            $receiverTx = Transaction::create([
                'trx_id'           => 'TRX-' . strtoupper(Str::random(8)),
                'user_id'          => $receiver->id,
                'type'             => 'receive',
                'transaction_type' => 'transfer',
                'amount'           => $amount,
                'charge'           => 0,
                'net_amount'       => $amount,
                'balance_after'    => $receiverBalanceAfter,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => $note,
                'status'           => $status,
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            // Lançamentos contabilísticos (double-entry)
            if ($status === 'completed') {
                TransactionEntry::create([
                    'transaction_id' => $senderTx->id,
                    'wallet_id'      => $senderWallet->id,
                    'amount'         => $netAmount,
                    'entry_type'     => 'debit',
                    'created_at'     => $createdAt,
                    'updated_at'     => $createdAt,
                ]);
                $entryCount++;

                TransactionEntry::create([
                    'transaction_id' => $receiverTx->id,
                    'wallet_id'      => $receiverWallet->id,
                    'amount'         => $amount,
                    'entry_type'     => 'credit',
                    'created_at'     => $createdAt,
                    'updated_at'     => $createdAt,
                ]);
                $entryCount++;
            }
        }

        // --- 60 Depósitos via Agente ---
        $activeAgents = collect($users)->filter(fn($u) => $u->type === 'agent' && $u->status === 'active')->values();
        $activeCustomers = collect($users)->filter(fn($u) => $u->type === 'customer' && $u->status === 'active')->values();

        $depositNotes = [
            'Depósito em dinheiro', 'Depósito via agente', 'Entrada de dinheiro',
            'Carregamento de carteira', 'Depósito de cliente', 'Recarga de saldo',
            'Depósito balcão', 'Depósito presencial', 'Carregamento em loja',
            'Depósito de salário', 'Entrada de fundos', 'Depósito em numerário',
        ];

        for ($i = 0; $i < 60; $i++) {
            $agent = $activeAgents->random();
            $customer = $activeCustomers->random();
            $amount = rand(5000, 500000) / 100; // 50 - 5.000 AOA
            $wallet = $wallets[$customer->id];
            $balanceAfter = $wallet->balance + $amount;

            $createdAt = now()->subDays(rand(0, 90))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            $tx = Transaction::create([
                'trx_id'           => 'TRX-' . strtoupper(Str::random(8)),
                'user_id'          => $customer->id,
                'type'             => 'receive',
                'transaction_type' => 'deposit',
                'amount'           => $amount,
                'charge'           => 0,
                'net_amount'       => $amount,
                'balance_after'    => $balanceAfter,
                'sender_id'        => $agent->id,      // Agente que processou o depósito
                'receiver_id'      => $customer->id,   // Cliente que recebeu
                'note'             => $depositNotes[array_rand($depositNotes)],
                'status'           => 'completed',
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            TransactionEntry::create([
                'transaction_id' => $tx->id,
                'wallet_id'      => $wallet->id,
                'amount'         => $amount,
                'entry_type'     => 'credit',
                'created_at'     => $createdAt,
                'updated_at'     => $createdAt,
            ]);
            $entryCount++;
        }

        // --- 20 Levantamentos ---
        for ($i = 0; $i < 20; $i++) {
            $user = $activeUsers->random();
            $amount = rand(2000, 100000) / 100; // 20 - 1.000 AOA
            $wallet = $wallets[$user->id];
            $balanceAfter = max(0, $wallet->balance - $amount);

            $createdAt = now()->subDays(rand(0, 90))->subHours(rand(0, 23));

            $wStatuses = ['completed', 'completed', 'completed', 'pending'];
            $status = $wStatuses[array_rand($wStatuses)];

            $tx = Transaction::create([
                'trx_id'           => 'TRX-' . strtoupper(Str::random(8)),
                'user_id'          => $user->id,
                'type'             => 'withdraw',
                'transaction_type' => 'withdrawal',
                'amount'           => $amount,
                'charge'           => 0,
                'net_amount'       => $amount,
                'balance_after'    => $balanceAfter,
                'sender_id'        => $user->id,
                'receiver_id'      => null,
                'note'             => 'Levantamento via agente',
                'status'           => $status,
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            if ($status === 'completed') {
                TransactionEntry::create([
                    'transaction_id' => $tx->id,
                    'wallet_id'      => $wallet->id,
                    'amount'         => $amount,
                    'entry_type'     => 'debit',
                    'created_at'     => $createdAt,
                    'updated_at'     => $createdAt,
                ]);
                $entryCount++;
            }
        }

        // --- 20 Pagamentos ---
        for ($i = 0; $i < 20; $i++) {
            $sender = $activeUsers->random();
            $receiver = $activeUsers->filter(fn($u) => $u->id !== $sender->id)->random();

            $amount = rand(500, 80000) / 100; // 5 - 800 AOA
            $senderWallet = $wallets[$sender->id];
            $receiverWallet = $wallets[$receiver->id];

            $senderBalanceAfter = max(0, $senderWallet->balance - $amount);
            $receiverBalanceAfter = $receiverWallet->balance + $amount;

            $createdAt = now()->subDays(rand(0, 60))->subHours(rand(0, 23));

            $trxId = 'TRX-' . strtoupper(Str::random(8));

            $senderTx = Transaction::create([
                'trx_id'           => $trxId,
                'user_id'          => $sender->id,
                'type'             => 'send',
                'transaction_type' => 'payment',
                'amount'           => $amount,
                'charge'           => 0,
                'net_amount'       => $amount,
                'balance_after'    => $senderBalanceAfter,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => 'Pagamento de serviço',
                'status'           => 'completed',
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            $receiverTx = Transaction::create([
                'trx_id'           => 'TRX-' . strtoupper(Str::random(8)),
                'user_id'          => $receiver->id,
                'type'             => 'receive',
                'transaction_type' => 'payment',
                'amount'           => $amount,
                'charge'           => 0,
                'net_amount'       => $amount,
                'balance_after'    => $receiverBalanceAfter,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => 'Pagamento de serviço',
                'status'           => 'completed',
                'created_at'       => $createdAt,
                'updated_at'       => $createdAt,
            ]);
            $transactionCount++;

            TransactionEntry::create([
                'transaction_id' => $senderTx->id,
                'wallet_id'      => $senderWallet->id,
                'amount'         => $amount,
                'entry_type'     => 'debit',
                'created_at'     => $createdAt,
                'updated_at'     => $createdAt,
            ]);
            $entryCount++;

            TransactionEntry::create([
                'transaction_id' => $receiverTx->id,
                'wallet_id'      => $receiverWallet->id,
                'amount'         => $amount,
                'entry_type'     => 'credit',
                'created_at'     => $createdAt,
                'updated_at'     => $createdAt,
            ]);
            $entryCount++;
        }

        $this->command->info('   ✅ ' . $transactionCount . ' transações criadas');
        $this->command->info('   ✅ ' . $entryCount . ' lançamentos contabilísticos criados');

        // ──────────────────────────────────────
        //  4. PEDIDOS DE DINHEIRO (60+)
        // ──────────────────────────────────────
        $this->command->info('📋 A criar pedidos de dinheiro...');

        $requestCount = 0;

        for ($i = 0; $i < 65; $i++) {
            $sender = $activeUsers->random();
            $receiver = $activeUsers->filter(fn($u) => $u->id !== $sender->id)->random();

            $amount = rand(500, 100000) / 100; // 5 - 1.000 AOA
            $note = $this->moneyRequestNotes[array_rand($this->moneyRequestNotes)];

            $reqStatuses = ['pending', 'pending', 'accepted', 'accepted', 'rejected', 'cancelled'];
            $status = $reqStatuses[array_rand($reqStatuses)];

            $createdAt = now()->subDays(rand(0, 60))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            MoneyRequest::create([
                'sender_id'   => $sender->id,
                'receiver_id' => $receiver->id,
                'amount'      => $amount,
                'note'        => $note,
                'status'      => $status,
                'created_at'  => $createdAt,
                'updated_at'  => $createdAt,
            ]);
            $requestCount++;
        }

        $this->command->info('   ✅ ' . $requestCount . ' pedidos de dinheiro criados');

        // ──────────────────────────────────────
        //  RESUMO
        // ──────────────────────────────────────
        $this->command->newLine();
        $this->command->info('🎉 Seeding completo!');
        $this->command->table(
            ['Tabela', 'Registos'],
            [
                ['users', count($users)],
                ['wallets', count($wallets)],
                ['transactions', $transactionCount],
                ['transaction_entries', $entryCount],
                ['money_requests', $requestCount],
            ]
        );
        $this->command->newLine();
        $this->command->info('🔑 Contas admin:');
        $this->command->info('   admin@kempaga.com  / password');
        $this->command->info('   admin2@kempaga.com / password');
        $this->command->info('   (Todos os utilizadores têm a password: "password")');
    }
}
