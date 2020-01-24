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
Enter generated Passport credentials in .env for Client ID: 2 


~~~
php artisan storage:link
~~~

Client Setup 
~~~
npm install
~~~

Setup MAIL credentials in .env