# Order Management System

## Setup

```bash
git clone https://github.com/basitkhandev/laravel-cart.git
cd laravel-cart
composer install
cp .env.example .env

Configure Mysql Database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cart
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate
php artisan migrate --seed
php artisan serve
