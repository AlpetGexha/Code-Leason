Redis ofron struktura dhe operatorë të të dhënave të ndërtuara me qëllim për të menaxhuar të dhënat në kohë reale në shkallë dhe shpejtësi.

Perdoret si database, cache, streaming engine, dhe message broker.

## Instalation

```bash
composer require predis/predis
```

## Configuratin

`config/dabase.php` make sure u have `predis`

```php
'client' => env('REDIS_CLIENT', 'predis'),
```

- `List`    => referohet si PHP Array

- `Set`     => Unique PHP Array
- `Sorted Set` => Set po me opsione sortimi 
## Hashes and Caching

Hash mund të perdorim p.sh nese një user ka disa statistika (Wishlists, Likes, WatchLater, Favorite etj...)

Funsionet Kryesore per Hashing jane:

-   `Redis::hset` - Për të bërë hash një vlerë

-   `Redis::hmser` - Për të bërë hash disa vlera
-   `Redis::get` - Për të vlerat
-   `Redis::hincrby` - Për të rritur vlerën

#### Pse ta perdorim Hash dhe kur ta perdorim ?

Hash mund ta përdorim kur deshirojm te kemi me shume kontroll mbi të dhëna (Sortime, Ndryshime te vazhdueshme etj..) dhe në shumë raste është më i shpejt

```php
$user = [
        'name' => 'Alpet',
        'age' => 18,
        'surname' => 'Gexha',
        'email' => 'agexha@gmail.com',
        'likes' => 100
    ];

    Benchmark::dd([
        function () use ($user) {
            Cache::put('user.1', $user, 10);
            return Cache::get('user.1');
        },
        function () use ($user) {
            Redis::hmset('user.1', $user);
            return Redis::hgetall('user.1');
        }
    ]);

    // Output
    [
        0 => "10.490ms"
        1 => "1.269ms"
    ]

    [
        0 => "40.727ms"
        1 => "17.016ms"
    ]
```

## Caching

Në `.env` e ndryshojm `CACHE_DRIVER=redis` dhe mund ta perdorim caching ne redis

Nje shembull se si mund ta perdorim Caching me redis

```php
    if (Redis::exists('article.all')) {
        return json_decode(Redis::get('article.all'));
    }

    $article = App\Models\Article::all();

    Redis::setex('article.all',60 * 60, $article);

    return $article;
```

E Bëjne një query dhe e vendosim ne Redis Cache (per 60minuta) dhe e kthejm nga Redis Cache

Por mund të perdorim edhe Cache Fasaden dhe e kryjn të njeten pune.


[Redis Offical Site](https://redis.io/)

[Redis Command](https://redis.io/commands/)
