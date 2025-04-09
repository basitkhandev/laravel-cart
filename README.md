# Order Management System

## Setup

```bash
git clone https://github.com/basitkhandev/laravel-cart.git
cd laravel-cart
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
