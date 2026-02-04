# Teste SUIT

<p align="center"><a href="[https://www.suitpay.app/](https://www.suitpay.app/)" target="_blank"><img src="https://www.suitpay.app/public/images/suit-new-brand-green.svg" width="180"></a></p>

<p align="center">
    <a href="https://laravel.com"><img alt="Laravel v12.x" src="https://img.shields.io/badge/Laravel-^v12.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="PHP 8.4" src="https://img.shields.io/badge/PHP-^8.4-777BB4?style=for-the-badge&logo=php"></a>
    <a href="https://livewire.laravel.com"><img alt="Livewire v4.x" src="https://img.shields.io/badge/Livewire-^v4.x-FB70A9?style=for-the-badge"></a>
</p>

## Ambiente
- PHP 8.4
- Node 25.2.1
- MySQL 8.0

## Colocando pra rodar

Copie o `.env.example` para `.env` e configure as variáveis de ambiente.

#### Com Sail
```bash
composer install
vendor/bin/sail up
```

#### Com Composer
```bash
composer run serve
```

## Acessando
- acesse a rota `/login`
- use as credenciais
    - email: `test@example.com`
    - senha: `password`