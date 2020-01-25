# Simple Book App

## Setup

~~~
composer install
cp .env.example .env
~~~

Enter your DB credentials
~~~
php artisan migrate
php artisan db:seed
~~~

Passport Auth 
~~~
php artisan passport:install
~~~

~~~
php artisan storage:link
~~~

Client Setup 
~~~
npm install
~~~

Setup MAIL credentials in .env