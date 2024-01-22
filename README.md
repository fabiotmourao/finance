# Projeto Finance

    Este projeto é um exemplo de um aplicativo Laravel básico usando a versão 10.10. É configurado com Docker para facilitar o desenvolvimento e a implantação.
    
## Pré-requisitos

    - PHP >= 8.1
    - Node
    - Composer
    - Docker

##  Clone o projeto do GitHub:
    1. git clone git@github.com:fabiotmourao/finance.git

    2. Entre no diretório do projeto:
        cd /projeto

## Inicie os serviços:
    
    docker compose -f "docker-compose.yml" up -d --build 

    O aplicativo agora pode ser acessado no navegador em http://localhost:8000.

    Para parar os serviços, execute:

    docker-compose down

## Instalação

    1. Instale as dependências:
       composer install e npm install
 
    2. Crie um arquivo `.env` a partir do arquivo `.env.example`:
       cp .env.example .env

       Configure o banco de dados no arquivo `.env`:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3308
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=

    3. Gere uma chave de aplicativo:
       docker-compose exec app php artisan key:generate

    4. Migre as tabelas do banco de dados:
       docker-compose exec app php artisan migrate

## Dependências

    O projeto usa as seguintes dependências:

    * Laravel 10
    * Docker
    * Font Awesome
    * Vue.js
    * Tailwind CSS
    * Axios
    * PostCSS
    * Autoprefixer
    * Guzzle
    * Fortify
    * Passport
    * Sanctum

## Licença

    Este projeto está licenciado sob a licença MIT.
