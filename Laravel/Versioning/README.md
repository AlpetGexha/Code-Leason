# Laravel Versioning

Api Controller

```
/app
  /Controllers
    /Api
      /V1
        /UserController.php
      /V2
        /UserController.php
```

### Loading the controllers according to the version (URL)

Ne fillim e krijom nje configun per Verzion. Ne `config/app.php` shtojm

```php
'api_latest' => '2',
```

Krijom një middleware `APIVersion`

```php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIVersion
{
    public function handle(Request $request, Closure $next, $guard): Response
    {
        config(['app.api.version' => $guard]);
        return $next($request);
    }
}
```

Në `app\Http\Kernel.php` shtojm middewarin qe _APIVersion_

```php
protected $middlewareAliases = [
       ...
        'api_version' => \App\Http\Middleware\APIVersion::class,
    ];
```

## Route API Configurate

Tek _RouteServiceProvider_ configurojm

```php
class RouteServiceProvider extends ServiceProvider
{
    ...
    protected $apiNamespace = 'App\Http\Controllers\Api';

    public function boot(): void
    {
        ...
        $this->routes(function () {
            Route::middleware(['api', 'api_version:v1'])
                ->prefix('api/v1')
                ->group(base_path('routes/api.php'));

            Route::middleware(['api', 'api_version:v2'])
                ->prefix('api/v2')
                ->group(base_path('routes/api2.php'));

          ...
        });
    }
}

```

[Source](https://medium.com/devwarlocks/versioning-your-rest-api-with-laravel-646bcc1f70a4)
