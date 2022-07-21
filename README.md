# Backend

Backend no formato RESTfull com `CRUD` para cadastro simples (Nome e Data Nascimento), utilizando `PHP` + `Laravel` + `MySQL`.

## Requisitos básicos

> PHP >= 7.4

> MySQL

> Composer

> Git

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white) ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

## Guia de Instalação


Para instalar a aplicação deve ser executados os seguintes comandos no terminal.

```sh
git clone -b main git@github.com:davidaugusto89/dg-backend.git dg-backend
cd dg-backend
composer install
cp .env.example .env
php artisan key:generate
```

Alterar arquivo `.env` com as credenciais de conexão para o banco de dados MySQL que será utilizado.

```sh
DB_DATABASE={DB_NOME}
DB_USERNAME={DB_USUARIO}
DB_PASSWORD={DB_SENHA}
```

Acessar pelo terminal o diretório que foi instalado o projeto e executar o comando abaixo para criar as tabelas que serão utilizadas:

```sh
php artisan migrate
```


## Guia para Testes
Para inciar o servidor após instalar, acessar pelo terminal o diretório que foi instalado o projeto e execute o comando:

```sh
php artisan serve
```

### Lista de endpoint's

`[POST]` - `http:\\127.0.0.1:8000\cadastros\` => novo cadastro

`[GET]` - `http:\\127.0.0.1:8000\cadastros\` => lista todos os cadastros do sistema

`[GET]` - `http:\\127.0.0.1:8000\cadastros\{id}` => bsuca cadastro específico pelo {id}

`[PUT]` - `http:\\127.0.0.1:8000\cadastros\{id}` => atualizar cadastro específico pelo {id}

`[DELETE]` - `http:\\127.0.0.1:8000\cadastros\{id}` => remover cadastro específico pelo {id}
