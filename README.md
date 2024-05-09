## Setup

clone this repository and run ```composer install``` to install dependency packages, then run this command below

```
php artisan key:generate
```

don't forget to setup database connection  through .env file

```
php artisan migrate
php artisan serve
```