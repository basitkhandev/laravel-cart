# Order Management System

## Setup

```bash
git clone https://github.com/basitkhandev/laravel-cart.git
cd laravel-cart
composer install
cp .env.example .env

Configure Mysql Database (Create new database in mysql first and then replace DB_DATABASE variable with it)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cart
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate
php artisan passport:install
php artisan db:seed
php artisan serve


Note: I have already seeded 2 users and 3 products

Login:
username : test1@example.com
password: password

username : test2@example.com
password: password
