# Transações Financeiras - 💲 #

## Descricão ✍️

Essa Web aplicação desenvolvida com *Laravel* gerencia transações financeiras permitindo o cadastro, leitura, atualização e exclusão de dados no banco de dados.


## Tecnologias Utilizadas - 🤖

- *PHP 8* 
- *LARAVEL 9*
- *BLADE*
- *COMPOSER*
- *JAVASCRIPT*
- *HTML - CSS*

## Requisitos - 📋

- *PHP =< 8*
- *Composer*
- *MySQL*
- *Laravel Installer*

## Instalação - ⚙️

• Clone o repositorio

    bash
        $git clone https://github.com/Alclides/financas


• Crie um arquivo .env e copie as informações do arquivo .env.exemple


• Preenha as informações do banco de dados 
    
    bash   
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=seu_banco_de_dados
        DB_USERNAME=seu_usuario
        DB_PASSWORD=sua_senha



• Intale as dependências

    bash

        composer install





• Rode as migrações para criar tabelas no banco de dados
    
    bash

        php artisan migrate


• Inicie o Servidor
   
    bash

        php artisan serve


- O servidor estará disponível em http://127.0.0.1:8000.

  
## Uso 🤓

- Crie, edite, atualize ou remova as transações no banco de dados
- Vizualize a lista completa de todas as transações cadastradas no sistema

## Scripts SQL 📂
- Os scripts SQL de criação das tabelas transacao e categorias estão na pasta bancodedados/, dentro do repositório. Use ferramentas como *HeidiSQL* ou *phpMyAdmin* para visualizar as tabelas e dados no banco de dados.


## Contato
 
 - LinkedIn: Alclides Oliveira
 - Instagram: @alclidess
