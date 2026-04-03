<p align="center">
  <h1 align="center">Kempaga API</h1>
  <p align="center">API RESTful para a aplicação móvel de carteira financeira "Kempaga"</p>
  <p align="center">RESTful API for the "Kempaga" financial wallet mobile application</p>
</p>

<p align="center">
  <a href="#-sobre--about">Sobre</a> •
  <a href="#-instalação--installation">Instalação</a> •
  <a href="#-autenticação--authentication">Auth</a> •
  <a href="#-endpoints">Endpoints</a> •
  <a href="#-modelos--models">Modelos</a> •
  <a href="#-helpers">Helpers</a> •
  <a href="#-validação--validation">Validação</a>
</p>

---

## 🇵🇹 Sobre / 🇬🇧 About

**PT:** A Kempaga é uma API de carteira financeira digital que permite aos utilizadores enviar e receber dinheiro, gerir o seu saldo, fazer pedidos de dinheiro e consultar o histórico de transações. Construída com Laravel 9 e autenticação via Laravel Sanctum.

**EN:** Kempaga is a digital financial wallet API that allows users to send and receive money, manage their balance, make money requests, and view transaction history. Built with Laravel 9 and Laravel Sanctum authentication.

### Stack Tecnológica / Tech Stack

| Componente / Component | Tecnologia / Technology |
|---|---|
| Framework | Laravel 9 |
| Linguagem / Language | PHP 8.0+ |
| Autenticação / Auth | Laravel Sanctum (Token-based) |
| Base de Dados / Database | MySQL |
| Upload de Ficheiros / File Upload | Laravel Storage (local) |
| Moeda Padrão / Default Currency | AOA (Kwanza Angolano) |

---

## ⚙️ Instalação / Installation

```bash
# 1. Clonar o repositório / Clone the repository
git clone https://github.com/jorgeedvaldo/kempaga-api.git
cd kempaga-api

# 2. Instalar dependências / Install dependencies
composer install

# 3. Configurar ambiente / Configure environment
cp .env.example .env
php artisan key:generate

# 4. Configurar base de dados no .env / Configure database in .env
# DB_DATABASE=kempaga
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Executar migrações / Run migrations
php artisan migrate

# 6. Criar link simbólico para storage / Create storage symlink
php artisan storage:link

# 7. Iniciar servidor / Start server
php artisan serve
```

A API estará disponível em `http://localhost:8000/api`
The API will be available at `http://localhost:8000/api`

---

## 🔐 Autenticação / Authentication

**PT:** A API usa Laravel Sanctum com tokens Bearer. Após o login ou registo, o servidor retorna um token que deve ser enviado no cabeçalho de todas as requisições protegidas.

**EN:** The API uses Laravel Sanctum with Bearer tokens. After login or registration, the server returns a token that must be sent in the header of all protected requests.

```
Authorization: Bearer {token}
```

### Fluxo de Autenticação / Auth Flow

```
1. POST /api/auth/register  →  Recebe token / Receives token
2. POST /api/auth/login     →  Recebe token / Receives token
3. Usar token nos headers   →  Use token in headers
4. POST /api/auth/logout    →  Token revogado / Token revoked
```


---

## 📡 Endpoints

### Base URL

```
http://localhost:8000/api
```

### Respostas / Responses

Todas as respostas são em JSON. / All responses are in JSON.

**Sucesso / Success:**
```json
{
  "message": "Operação realizada com sucesso.",
  "data": { ... }
}
```

**Erro / Error:**
```json
{
  "message": "Descrição do erro.",
  "errors": {
    "campo": ["Mensagem de validação"]
  }
}
```

---

### 1. 🔑 Autenticação / Authentication

#### `POST /api/auth/register`

**PT:** Registar uma nova conta. Cria automaticamente uma carteira com saldo 0.
**EN:** Register a new account. Automatically creates a wallet with 0 balance.

🔓 **Público / Public** — Sem autenticação / No auth required

**Content-Type:** `multipart/form-data` (para upload de imagem / for image upload)

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `first_name` | `string` | ✅ | Primeiro nome / First name (max: 100) |
| `last_name` | `string` | ✅ | Último nome / Last name (max: 100) |
| `email` | `string` | ✅ | Email (único / unique) |
| `phone` | `string` | ✅ | Telefone / Phone (único / unique, max: 20) |
| `password` | `string` | ✅ | Password (min: 6) |
| `password_confirmation` | `string` | ✅ | Confirmação / Confirmation |

| `bi_number` | `string` | ✅ | Número do BI / ID card number (único / unique) |
| `type` | `string` | ❌ | `customer` (padrão/default), `agent` ou/or `admin` |
| `image` | `file` | ❌ | Foto de perfil / Profile photo (jpeg, png, jpg; max: 5MB) |

**Resposta / Response — `201 Created`:**
```json
{
  "message": "Conta criada com sucesso.",
  "user": {
    "id": 1,
    "first_name": "João",
    "last_name": "Silva",
    "email": "joao@email.com",
    "phone": "+244912345678",
    "type": "customer",
    "status": "active",
    "bi_number": "005123456LA042",
    "image_url": "/storage/avatars/abc123.jpg",
    "full_name": "João Silva",
    "wallet": {
      "id": 1,
      "user_id": 1,
      "balance": "0.00",
      "currency": "AOA"
    }
  },
  "token": "1|abc123def456..."
}
```

---

#### `POST /api/auth/login`

**PT:** Iniciar sessão com email e password.
**EN:** Log in with email and password.

🔓 **Público / Public**

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `email` | `string` | ✅ | Email do utilizador / User email |
| `password` | `string` | ✅ | Password |

**Resposta / Response — `200 OK`:**
```json
{
  "message": "Login efetuado com sucesso.",
  "user": { ... },
  "token": "2|xyz789..."
}
```

**Erros / Errors:**
- `401` — Credenciais inválidas / Invalid credentials
- `403` — Conta inativa ou bloqueada / Account inactive or blocked

---

#### `POST /api/auth/logout`

**PT:** Terminar sessão e revogar o token atual.
**EN:** Log out and revoke current token.

🔒 **Protegido / Protected** — `Authorization: Bearer {token}`

**Resposta / Response — `200 OK`:**
```json
{
  "message": "Sessão terminada com sucesso."
}
```

---

#### `GET /api/auth/user`

**PT:** Obter o perfil do utilizador autenticado com dados da carteira.
**EN:** Get authenticated user profile with wallet data.

🔒 **Protegido / Protected**

**Resposta / Response — `200 OK`:**
```json
{
  "user": {
    "id": 1,
    "first_name": "João",
    "last_name": "Silva",
    "email": "joao@email.com",
    "phone": "+244912345678",
    "type": "customer",
    "status": "active",
    "bi_number": "005123456LA042",
    "image_url": "/storage/avatars/abc123.jpg",
    "full_name": "João Silva",
    "wallet": {
      "id": 1,
      "balance": "15000.00",
      "currency": "AOA"
    }
  }
}
```

---


### 2. 💰 Carteira / Wallet

#### `GET /api/wallet`

**PT:** Ver o saldo e dados da carteira do utilizador.
**EN:** View user's wallet balance and data.

🔒 **Protegido / Protected**

**Resposta / Response — `200 OK`:**
```json
{
  "wallet": {
    "id": 1,
    "user_id": 1,
    "balance": "15000.00",
    "currency": "AOA",
    "created_at": "2026-04-03T10:00:00.000000Z",
    "updated_at": "2026-04-03T10:30:00.000000Z"
  }
}
```

---

#### `GET /api/wallet/transactions`

**PT:** Histórico de transações da carteira (paginado, 20 por página).
**EN:** Wallet transaction history (paginated, 20 per page).

🔒 **Protegido / Protected**

| Parâmetro / Parameter | Tipo / Type | Descrição / Description |
|---|---|---|
| `page` | `integer` (query) | Número da página / Page number |

**Resposta / Response — `200 OK`:**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "trx_id": "TRX-A1B2C3D4",
      "user_id": 1,
      "type": "send",
      "transaction_type": "transfer",
      "amount": "5000.00",
      "charge": "0.00",
      "net_amount": "5000.00",
      "balance_after": "10000.00",
      "sender_id": 1,
      "receiver_id": 2,
      "note": "Almoço",
      "status": "completed",
      "created_at": "2026-04-03T10:30:00.000000Z",
      "sender": {
        "id": 1,
        "first_name": "João",
        "last_name": "Silva",
        "image_url": "/storage/avatars/abc.jpg"
      },
      "receiver": {
        "id": 2,
        "first_name": "Maria",
        "last_name": "Santos",
        "image_url": "/storage/avatars/def.jpg"
      }
    }
  ],
  "last_page": 3,
  "per_page": 20,
  "total": 45
}
```

---

### 3. 💸 Transações / Transactions

#### `GET /api/transactions`

**PT:** Listar transações do utilizador com filtros opcionais.
**EN:** List user transactions with optional filters.

🔒 **Protegido / Protected**

| Parâmetro / Parameter | Tipo / Type | Valores / Values | Descrição / Description |
|---|---|---|---|
| `type` | `string` (query) | `send`, `receive`, `deposit`, `withdraw` | Filtrar por direção / Filter by direction |
| `status` | `string` (query) | `pending`, `completed`, `failed`, `cancelled` | Filtrar por estado / Filter by status |
| `transaction_type` | `string` (query) | `transfer`, `payment`, `deposit`, `withdrawal`, `request` | Filtrar por categoria / Filter by category |
| `page` | `integer` (query) | — | Página / Page number |

**Exemplo / Example:**
```
GET /api/transactions?type=send&status=completed&page=1
```

**Resposta / Response — `200 OK`:** (mesmo formato paginado / same paginated format as wallet/transactions)

---

#### `POST /api/transactions`

**PT:** Enviar dinheiro para outro utilizador (transferência P2P).
**EN:** Send money to another user (P2P transfer).

🔒 **Protegido / Protected**

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `receiver_id` | `integer` | ✅ | ID do destinatário / Receiver user ID |
| `amount` | `numeric` | ✅ | Montante (min: 1) / Amount (min: 1) |
| `note` | `string` | ❌ | Nota/descrição / Note (max: 500) |


**Resposta / Response — `201 Created`:**
```json
{
  "message": "Transferência realizada com sucesso.",
  "transaction": {
    "id": 5,
    "trx_id": "TRX-X1Y2Z3W4",
    "user_id": 1,
    "type": "send",
    "transaction_type": "transfer",
    "amount": "5000.00",
    "charge": "0.00",
    "net_amount": "5000.00",
    "balance_after": "10000.00",
    "sender_id": 1,
    "receiver_id": 2,
    "note": "Almoço de ontem",
    "status": "completed",
    "sender": {
      "id": 1,
      "first_name": "João",
      "last_name": "Silva"
    },
    "receiver": {
      "id": 2,
      "first_name": "Maria",
      "last_name": "Santos"
    }
  }
}
```

**Erros / Errors:**

- `422` — Saldo insuficiente / Insufficient balance
- `422` — Não pode enviar a si próprio / Cannot send to yourself

---

#### `GET /api/transactions/{id}`

**PT:** Ver detalhes de uma transação específica (apenas do utilizador autenticado).
**EN:** View details of a specific transaction (only authenticated user's).

🔒 **Protegido / Protected**

| Parâmetro / Parameter | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `integer` (URL) | ID da transação / Transaction ID |

**Resposta / Response — `200 OK`:**
```json
{
  "transaction": {
    "id": 5,
    "trx_id": "TRX-X1Y2Z3W4",
    "type": "send",
    "transaction_type": "transfer",
    "amount": "5000.00",
    "charge": "0.00",
    "net_amount": "5000.00",
    "balance_after": "10000.00",
    "note": "Almoço",
    "status": "completed",
    "sender": { "id": 1, "first_name": "João", "last_name": "Silva", "image_url": "..." },
    "receiver": { "id": 2, "first_name": "Maria", "last_name": "Santos", "image_url": "..." },
    "entries": [
      {
        "id": 1,
        "transaction_id": 5,
        "wallet_id": 1,
        "amount": "5000.00",
        "entry_type": "debit",
        "wallet": { "id": 1, "user_id": 1, "balance": "10000.00", "currency": "AOA" }
      }
    ]
  }
}
```

---

### 4. 📋 Pedidos de Dinheiro / Money Requests

#### `GET /api/money-requests`

**PT:** Listar pedidos de dinheiro (enviados e recebidos) com filtros.
**EN:** List money requests (sent and received) with filters.

🔒 **Protegido / Protected**

| Parâmetro / Parameter | Tipo / Type | Valores / Values | Descrição / Description |
|---|---|---|---|
| `filter` | `string` (query) | `sent`, `received` | Filtrar por direção / Filter by direction |
| `status` | `string` (query) | `pending`, `accepted`, `rejected`, `cancelled` | Filtrar por estado / Filter by status |
| `page` | `integer` (query) | — | Página / Page number |

**Exemplo / Example:**
```
GET /api/money-requests?filter=received&status=pending
```

**Resposta / Response — `200 OK`:**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "sender_id": 2,
      "receiver_id": 1,
      "amount": "3000.00",
      "note": "Devolve o que me deves",
      "status": "pending",
      "created_at": "2026-04-03T09:00:00.000000Z",
      "sender": {
        "id": 2,
        "first_name": "Maria",
        "last_name": "Santos",
        "image_url": "/storage/avatars/def.jpg"
      },
      "receiver": {
        "id": 1,
        "first_name": "João",
        "last_name": "Silva",
        "image_url": "/storage/avatars/abc.jpg"
      }
    }
  ],
  "last_page": 1,
  "per_page": 20,
  "total": 1
}
```

---

#### `POST /api/money-requests`

**PT:** Criar um pedido de dinheiro a outro utilizador.
**EN:** Create a money request to another user.

🔒 **Protegido / Protected**

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `receiver_id` | `integer` | ✅ | ID de quem vai pagar / Payer user ID |
| `amount` | `numeric` | ✅ | Montante pedido (min: 1) / Requested amount (min: 1) |
| `note` | `string` | ❌ | Razão do pedido / Request reason (max: 500) |

**Resposta / Response — `201 Created`:**
```json
{
  "message": "Pedido de dinheiro criado com sucesso.",
  "money_request": {
    "id": 3,
    "sender_id": 1,
    "receiver_id": 2,
    "amount": "3000.00",
    "note": "Almoço de sexta",
    "status": "pending",
    "sender": { "id": 1, "first_name": "João", "last_name": "Silva" },
    "receiver": { "id": 2, "first_name": "Maria", "last_name": "Santos" }
  }
}
```

---

#### `PUT /api/money-requests/{id}/respond`

**PT:** Aceitar ou rejeitar um pedido de dinheiro. Apenas o `receiver` (quem deve pagar) pode responder. Se aceitar, a transferência é processada automaticamente.
**EN:** Accept or reject a money request. Only the `receiver` (payer) can respond. If accepted, the transfer is processed automatically.

🔒 **Protegido / Protected**

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `status` | `string` | ✅ | `accepted` ou/or `rejected` |
| `note` | `string` | ❌ | Justificação da rejeição / Rejection reason (max: 500) |


**Resposta ao Aceitar / Accept Response — `200 OK`:**
```json
{
  "message": "Pedido aceite e transferência processada.",
  "money_request": {
    "id": 3,
    "status": "accepted",
    "amount": "3000.00",
    "sender": { ... },
    "receiver": { ... }
  }
}
```

**Resposta ao Rejeitar / Reject Response — `200 OK`:**
```json
{
  "message": "Pedido rejeitado.",
  "money_request": { ... }
}
```

**Erros / Errors:**
- `403` — Sem permissão / No permission (não é o receiver / not the receiver)
- `422` — Pedido já processado / Request already processed

- `422` — Saldo insuficiente / Insufficient balance

---

#### `DELETE /api/money-requests/{id}`

**PT:** Cancelar um pedido de dinheiro. Apenas o `sender` (quem pediu) pode cancelar.
**EN:** Cancel a money request. Only the `sender` (requester) can cancel.

🔒 **Protegido / Protected**

**Resposta / Response — `200 OK`:**
```json
{
  "message": "Pedido cancelado com sucesso."
}
```

**Erros / Errors:**
- `403` — Sem permissão / No permission
- `422` — Pedido já processado / Already processed

---

### 5. 🏦 Depósitos / Deposits (Agentes & Admin)

> **PT:** Este endpoint permite que **agentes** e **administradores** registem a entrada de dinheiro real na carteira de um utilizador. O agente não "cria" dinheiro — apenas regista no sistema o dinheiro físico recebido do cliente. Isto garante controlo e auditoria completa.
>
> **EN:** This endpoint allows **agents** and **admins** to register real money deposits into a user's wallet. The agent doesn't "create" money — they only record in the system the physical cash received from the client. This ensures full control and audit trail.

#### Fluxo do Depósito / Deposit Flow

```
1. Cliente entrega dinheiro ao agente / Client gives cash to agent
2. Agente autentica-se na API / Agent authenticates via API
3. Agente faz POST /api/deposits / Agent calls POST /api/deposits
4. Sistema valida permissões, cria transação, atualiza saldo e regista no ledger
   System validates permissions, creates transaction, updates balance and records ledger entry
```

#### `POST /api/deposits`

**PT:** Registar um depósito de dinheiro real na carteira de um utilizador.
**EN:** Register a real money deposit into a user's wallet.

🔒 **Protegido / Protected** — `Authorization: Bearer {token}`
🛡️ **Restrito / Restricted** — Apenas `agent` ou `admin` / Only `agent` or `admin`

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `user_id` | `integer` | ✅ | ID do utilizador destinatário / Target user ID |
| `amount` | `numeric` | ✅ | Montante a depositar (min: 1) / Deposit amount (min: 1) |
| `note` | `string` | ❌ | Nota/descrição / Note (max: 500, default: "Depósito via agente") |

**Resposta / Response — `201 Created`:**
```json
{
  "message": "Depósito realizado com sucesso.",
  "transaction": {
    "id": 10,
    "trx_id": "TRX-A1B2C3D4",
    "user_id": 5,
    "type": "receive",
    "transaction_type": "deposit",
    "amount": "10000.00",
    "charge": "0.00",
    "net_amount": "10000.00",
    "balance_after": "25000.00",
    "sender_id": 3,
    "receiver_id": 5,
    "note": "Depósito via agente",
    "status": "completed",
    "sender": {
      "id": 3,
      "first_name": "Agente",
      "last_name": "Silva"
    },
    "receiver": {
      "id": 5,
      "first_name": "João",
      "last_name": "Santos"
    }
  },
  "new_balance": 25000.00
}
```

**Erros / Errors:**
- `403` — Acesso negado (não é agente/admin) / Access denied (not agent/admin)
- `404` — Carteira do utilizador não encontrada / User wallet not found
- `422` — Validação falhou (user_id inválido, montante < 1) / Validation failed

---

### 6. 👤 Utilizadores / Users

#### `GET /api/users/search`

**PT:** Pesquisar utilizadores por nome, telefone ou email.
**EN:** Search users by name, phone, or email.

🔒 **Protegido / Protected**

| Parâmetro / Parameter | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `query` | `string` (query) | ✅ | Termo de pesquisa / Search term (min: 3 caracteres / chars) |

**Exemplo / Example:**
```
GET /api/users/search?query=maria
```

**Resposta / Response — `200 OK`:**
```json
{
  "users": [
    {
      "id": 2,
      "first_name": "Maria",
      "last_name": "Santos",
      "email": "maria@email.com",
      "phone": "+244923456789",
      "image_url": "/storage/avatars/def.jpg"
    }
  ]
}
```

---

#### `GET /api/users/{id}`

**PT:** Ver perfil público de um utilizador.
**EN:** View a user's public profile.

🔒 **Protegido / Protected**

**Resposta / Response — `200 OK`:**
```json
{
  "user": {
    "id": 2,
    "first_name": "Maria",
    "last_name": "Santos",
    "email": "maria@email.com",
    "phone": "+244923456789",
    "type": "customer",
    "image_url": "/storage/avatars/def.jpg",
    "full_name": "Maria Santos"
  }
}
```

---

#### `PUT /api/users/profile`

**PT:** Atualizar o perfil do utilizador autenticado (todos os campos opcionais).
**EN:** Update authenticated user's profile (all fields optional).

🔒 **Protegido / Protected**

**Content-Type:** `multipart/form-data` (se enviar imagem / if sending image)

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `first_name` | `string` | ❌ | Primeiro nome / First name |
| `last_name` | `string` | ❌ | Último nome / Last name |
| `phone` | `string` | ❌ | Telefone (único) / Phone (unique) |
| `bi_number` | `string` | ❌ | Número do BI (único) / ID number (unique) |
| `image` | `file` | ❌ | Nova foto / New photo (jpeg, png, jpg; max: 5MB) |

**Resposta / Response — `200 OK`:**
```json
{
  "message": "Perfil atualizado com sucesso.",
  "user": { ... }
}
```

---

#### `POST /api/users/profile/image`

**PT:** Upload dedicado de foto de perfil.
**EN:** Dedicated profile photo upload.

🔒 **Protegido / Protected**

**Content-Type:** `multipart/form-data`

| Campo / Field | Tipo / Type | Obrigatório / Required | Descrição / Description |
|---|---|---|---|
| `image` | `file` | ✅ | Foto de perfil / Profile photo (jpeg, png, jpg; max: 5MB) |

**Resposta / Response — `200 OK`:**
```json
{
  "message": "Foto atualizada com sucesso.",
  "image_url": "/storage/avatars/new123.jpg"
}
```

---

## 📊 Modelos / Models

### Diagrama de Relações / Relationship Diagram

```
┌──────────┐       1:1       ┌──────────┐
│  Users   │────────────────▶│ Wallets  │
└──────────┘                 └──────────┘
     │                            │
     │ 1:N                        │ 1:N
     ▼                            ▼
┌──────────────┐         ┌─────────────────────┐
│ Transactions │────────▶│ Transaction Entries  │
└──────────────┘   1:N   └─────────────────────┘
     │
     │ N:1 (sender/receiver)
     ▼
┌──────────────────┐
│  Money Requests  │
└──────────────────┘
```

### Users

| Campo / Field | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `bigint` (PK) | Identificador único / Unique ID |
| `first_name` | `string` | Primeiro nome / First name |
| `last_name` | `string` | Último nome / Last name |
| `email` | `string` (unique) | Email |
| `phone` | `string` (unique) | Telefone / Phone |
| `password` | `string` (hash) | Password (bcrypt hash) |

| `type` | `enum` | `customer` \| `agent` \| `admin` |
| `status` | `enum` | `active` \| `inactive` \| `blocked` |
| `bi_number` | `string` (unique) | Número do BI / ID card number |
| `image_url` | `string` (nullable) | URL da foto / Photo URL |
| `email_verified_at` | `timestamp` (nullable) | Data de verificação / Verification date |
| `created_at` | `timestamp` | Data de criação / Created at |
| `updated_at` | `timestamp` | Data de atualização / Updated at |

**Relações / Relationships:**
- `wallet()` → HasOne `Wallet`
- `transactions()` → HasMany `Transaction`
- `sentTransactions()` → HasMany `Transaction` (via `sender_id`)
- `receivedTransactions()` → HasMany `Transaction` (via `receiver_id`)
- `sentMoneyRequests()` → HasMany `MoneyRequest` (via `sender_id`)
- `receivedMoneyRequests()` → HasMany `MoneyRequest` (via `receiver_id`)

**Accessor:** `full_name` → `"{first_name} {last_name}"`

---

### Wallets

| Campo / Field | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `bigint` (PK) | Identificador único / Unique ID |
| `user_id` | `bigint` (FK, unique) | Dono da carteira / Wallet owner |
| `balance` | `decimal(16,2)` | Saldo atual / Current balance |
| `currency` | `string(3)` | Moeda / Currency (padrão/default: `AOA`) |
| `created_at` | `timestamp` | Data de criação / Created at |
| `updated_at` | `timestamp` | Data de atualização / Updated at |

**Relações / Relationships:**
- `user()` → BelongsTo `User`
- `transactionEntries()` → HasMany `TransactionEntry`

---

### Transactions

| Campo / Field | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `bigint` (PK) | Identificador único / Unique ID |
| `trx_id` | `string` (unique) | ID legível / Readable ID (formato/format: `TRX-XXXXXXXX`) |
| `user_id` | `bigint` (FK) | Dono do registo / Record owner |
| `type` | `enum` | Direção / Direction: `send` \| `receive` \| `deposit` \| `withdraw` |
| `transaction_type` | `enum` | Categoria / Category: `transfer` \| `payment` \| `deposit` \| `withdrawal` \| `request` |
| `amount` | `decimal(16,2)` | Montante bruto / Gross amount |
| `charge` | `decimal(16,2)` | Taxa / Fee (default: `0.00`) |
| `net_amount` | `decimal(16,2)` | Montante líquido / Net amount (`amount - charge`) |
| `balance_after` | `decimal(16,2)` | Saldo após transação / Balance after transaction |
| `sender_id` | `bigint` (FK, nullable) | ID do remetente / Sender ID |
| `receiver_id` | `bigint` (FK, nullable) | ID do destinatário / Receiver ID |
| `note` | `text` (nullable) | Nota / Note |
| `status` | `enum` | Estado / Status: `pending` \| `completed` \| `failed` \| `cancelled` |
| `created_at` | `timestamp` | Data de criação / Created at |
| `updated_at` | `timestamp` | Data de atualização / Updated at |

**Relações / Relationships:**
- `user()` → BelongsTo `User`
- `sender()` → BelongsTo `User` (via `sender_id`)
- `receiver()` → BelongsTo `User` (via `receiver_id`)
- `entries()` → HasMany `TransactionEntry`

---

### Money Requests

| Campo / Field | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `bigint` (PK) | Identificador único / Unique ID |
| `sender_id` | `bigint` (FK) | Quem pediu / Requester |
| `receiver_id` | `bigint` (FK) | A quem foi pedido / Payer |
| `amount` | `decimal(16,2)` | Montante pedido / Requested amount |
| `note` | `text` (nullable) | Nota / Note |
| `status` | `enum` | Estado: `pending` \| `accepted` \| `rejected` \| `cancelled` |
| `created_at` | `timestamp` | Data de criação / Created at |
| `updated_at` | `timestamp` | Data de atualização / Updated at |

**Relações / Relationships:**
- `sender()` → BelongsTo `User` (via `sender_id`)
- `receiver()` → BelongsTo `User` (via `receiver_id`)

**Ciclo de Vida / Lifecycle:**
```
pending  →  accepted   (receiver aceita e paga / receiver accepts and pays)
         →  rejected   (receiver rejeita / receiver rejects)
         →  cancelled  (sender cancela / sender cancels)
```

---

### Transaction Entries

| Campo / Field | Tipo / Type | Descrição / Description |
|---|---|---|
| `id` | `bigint` (PK) | Identificador único / Unique ID |
| `transaction_id` | `bigint` (FK) | Transação associada / Associated transaction |
| `wallet_id` | `bigint` (FK) | Carteira afetada / Affected wallet |
| `amount` | `decimal(16,2)` | Montante do lançamento / Entry amount |
| `entry_type` | `enum` | Tipo: `credit` \| `debit` |
| `created_at` | `timestamp` | Data de criação / Created at |
| `updated_at` | `timestamp` | Data de atualização / Updated at |

**Relações / Relationships:**
- `transaction()` → BelongsTo `Transaction`
- `wallet()` → BelongsTo `Wallet`

---

## 🛠️ Helpers

### TransactionHelper

**Localização / Location:** `app/Helpers/TransactionHelper.php`

| Método / Method | Tipo Retorno / Return Type | Descrição / Description |
|---|---|---|
| `generateTrxId()` | `string` | Gera um ID único no formato `TRX-XXXXXXXX` (8 caracteres alfanuméricos). Verifica unicidade na BD. / Generates a unique ID in `TRX-XXXXXXXX` format. Checks DB uniqueness. |
| `calculateCharge(float $amount, string $transactionType)` | `float` | Calcula a taxa da transação. Atualmente retorna `0.00`. / Calculates transaction fee. Currently returns `0.00`. |

**Uso / Usage:**
```php
use App\Helpers\TransactionHelper;

$trxId = TransactionHelper::generateTrxId();
// "TRX-A1B2C3D4"

$charge = TransactionHelper::calculateCharge(5000.00, 'transfer');
// 0.00
```

---

## ✅ Validação / Validation

A API usa Form Requests do Laravel para validação automática. Erros de validação retornam `422 Unprocessable Entity`.

The API uses Laravel Form Requests for automatic validation. Validation errors return `422 Unprocessable Entity`.

**Formato de erro de validação / Validation error format:**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "Este email já está registado."
    ]
  }
}
```

### Form Requests

| Request | Localização / Location | Usado em / Used in |
|---|---|---|
| `RegisterRequest` | `app/Http/Requests/Auth/` | `POST /auth/register` |
| `LoginRequest` | `app/Http/Requests/Auth/` | `POST /auth/login` |

| `StoreTransactionRequest` | `app/Http/Requests/Transaction/` | `POST /transactions` |
| `StoreMoneyRequestRequest` | `app/Http/Requests/MoneyRequest/` | `POST /money-requests` |
| `UpdateMoneyRequestRequest` | `app/Http/Requests/MoneyRequest/` | `PUT /money-requests/{id}/respond` |
| `UpdateProfileRequest` | `app/Http/Requests/User/` | `PUT /users/profile` |

---

## 📁 Estrutura do Projeto / Project Structure

```
app/
├── Exceptions/
│   └── Handler.php                  # Erros JSON / JSON error responses
├── Helpers/
│   └── TransactionHelper.php        # Gerador TRX-ID + taxas / TRX-ID generator + fees
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       ├── AuthController.php          # Autenticação / Authentication
│   │       ├── MoneyRequestController.php  # Pedidos / Money requests
│   │       ├── TransactionController.php   # Transações / Transactions
│   │       ├── UserController.php          # Utilizadores / Users
│   │       └── WalletController.php        # Carteira / Wallet
│   ├── Middleware/
│   │   └── Authenticate.php         # JSON 401 (sem redirect / no redirect)
│   └── Requests/
│       ├── Auth/
│       │   ├── LoginRequest.php
│       │   └── RegisterRequest.php
│       ├── MoneyRequest/
│       │   ├── StoreMoneyRequestRequest.php
│       │   └── UpdateMoneyRequestRequest.php
│       ├── Transaction/
│       │   └── StoreTransactionRequest.php
│       └── User/
│           └── UpdateProfileRequest.php
├── Models/
│   ├── MoneyRequest.php
│   ├── Transaction.php
│   ├── TransactionEntry.php
│   ├── User.php
│   └── Wallet.php
database/
└── migrations/
    ├── 2014_10_12_000000_create_users_table.php
    ├── 2024_01_01_000001_create_wallets_table.php
    ├── 2024_01_01_000002_create_transactions_table.php
    ├── 2024_01_01_000003_create_money_requests_table.php
    └── 2024_01_01_000004_create_transaction_entries_table.php
routes/
└── api.php                          # 23 rotas / 23 routes
```

---

## 🔒 Códigos HTTP / HTTP Status Codes

| Código / Code | Significado / Meaning |
|---|---|
| `200` | Sucesso / Success |
| `201` | Criado com sucesso / Created successfully |
| `401` | Não autenticado / Unauthenticated |
| `403` | Sem permissão / Forbidden |
| `404` | Não encontrado / Not found |
| `422` | Erro de validação / Validation error |
| `500` | Erro interno / Internal server error |

---

## 📄 Licença / License

MIT

---

<p align="center">
  Desenvolvido por / Developed by <a href="https://github.com/jorgeedvaldo">@jorgeedvaldo</a>
</p>
