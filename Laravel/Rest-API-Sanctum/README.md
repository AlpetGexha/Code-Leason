# First install Laravel Sanctum

```
composer require laravel/sanctum
```

publish configuration

```
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

on `app/Http/Kernel.php` add

```
  \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
```

# Configurate  User Model 

u just need to use  `HasApiTokens` this come by default if  u are using latest Laravel verzion

# Make API CRUD

    - Make Product Model
    - Make Producut Controller (use --api)
    - Make Auth Controller
    - Configurate Routes

- Model is on `app\Models\Api\Product.php` 
- Controlles in on `app\Https\Api\ProductController.php` AND `app\Https\Api\AuthController.php`
- Routes `routes\api.php`

# I use Postman as API

- If u want to get respone on `Headers` add 
    `Accept` as a KEY  AND
    `application/json` as VALUE

- U can Request Value on Body

- For Authorization go on `auth`
We use `Bearer Token` and u can  past your auth token form login or register 

### Import API Colection

#### On Main folder u see `API CRUD.json` Take this file and import on Postman

