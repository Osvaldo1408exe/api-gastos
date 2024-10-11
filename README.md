# api-gastos
Backend para sistema de gerenciamento de gasto, com login e crud de gastos

## Funcionalidades

- **Token**: Rotas protegidas por token(Adicionar "Bearer" antes do token no cabeçalho de autorização, conforme definido pelo padrão RFC 6750).
- **Usuários**: Senha de usuários criptografadas.
- **Gastos**: crud completo de gastos.


## Rotas
### Metodo: Post
- **cadastro de usuários**: /api/register.
- **login**: /api/login.
- **cadastro de gastos**: /api/expenses.
### Metodo: Get
- **todos os gasto**: /api/expenses.
- **gasto unitário**: /api/expenses/id.
### Metodo: Put
- **alteração do gasto**: /api/expenses/id.
### Metodo: Delete
- **apagar gasto**: /api/expenses/id.

## Instalação

1. Clone o repositório
2. Com o composer instalado na sua máquina, execute: composer install
3. Configure o banco de dados no arquivo .env
4. Execute: "php artisan migrate" para enviar as tabelas para o banco de dados
5. Execute: "php artisan serve" para iniciar o servidor
6. Acesse o endereço: http://localhost:8000/api/gastos
