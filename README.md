## Instalações Necessárias
* XAMPP
* Composer

## Configuração do Projeto Laravel
* Clone o repositório do projeto
* Instale as dependências do Composer:
```
composer install
```
* Renomeie o arquivo .env.example para .env e altere as informações do banco de dados:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<NOME_DO_SEU_BANCO_DE_DADOS>
DB_USERNAME=<SEU_USUARIO_DO_BANCO_DE_DADOS>
DB_PASSWORD=<SUA_SENHA_DO_BANCO_DE_DADOS>
```
* Gere a chave do Laravel:
```
php artisan key:generate
```
* Inicie o servidor:
```
php artisan serve
```
