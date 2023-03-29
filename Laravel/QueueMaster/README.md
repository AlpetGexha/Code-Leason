[Laravel Offical Queue Documentation](https://laravel.com/docs/9.x/queues)

# Laravel Queue

Queue Perdoret per te kryher punent ne background pershkak se disa kerkesa ne HTTP kerkojn nje kohe me te madhe per tu procesuar

P.SH Dergimi i nje Emaili kerkon minimun 4-5 sekonda.

## Installationn

```bash
php artisan queue:table

php artisan migrate
```

on `.env` make _QUEUE_CONNECTION=database_

Per te filluar punen `php php artisan queue:work `

## Usage

-   Krijo nje "Job" `php artisan make:job NAME`
-   Shruja llogjiken ne"
-   Dispatch the job on Controller ose ku deshiron ta perdoresh

## Configuration Job

-   `$tries` - Provo n here deri nese deshton

-   `$backoff` - Prit n sekonda deri në procesimin tjeter ne kete Job
-   `$timeout` - Nese Procesimi nuk kryhet per n sekonda atehere porcesimideshton
-   `$maxExceptions` - Nese Job-i kthen Expecioton n here ateher Job deshton
-   `retryUntil()` - Prit n Sekonda deri deri ne procesim
-   `->onQueue('NAME')` - Jep nje emer te prioritetit
-   `->delay(n)` - Prit n sekonda pastaj beje procesin
-   ` --queue=NAME,default` - Trego Kush ka prioritet me te lart

## Workflow

Grupimi i disa Job qe kane llogjik të përbashkët

### Chain

Processet qe eksekutohen njera pas tjetres
Nese nje Job(proces) deshton atehere te gjitha proceset e tjera deshtojne

```php
$chain = [
    new PullJob,
    new TestPullJob,
    new DeployJob,
];

Illuminate\Support\Facades\Bus::chain($chain)->dispatch();
```

### Batches

Batchi ju lejon të ekzekutoni me lehtësi një grup te Job(proceseve) dhe më pas të kryeni disa veprime kur grupi proceseve të ketë përfunduar ekzekutimin.

Ne fillim e bejme migrate Tabelen

```php
php artisan queue:batches-table

php artisan migrate
```

```php
$batch = [
    new PullBatchJob,
    new TestPullBatchJob,
    new DeployBatchJob,
];

Illuminate\Support\Facades\Bus::batch($jobs)->dispatch();
```

*array ne array* ne batch referohen si *chain*

```php
$batch = [
    // chain
    [
        new PullJob,
        new TestPullJob,
        new DeployJob,
    ],
    // chain
    [
        new PullJob,
        new TestPullJob,
        new DeployJob,
    ],
]


Bus::batch($batch)
    ->allowFailures()
    ->catch(function ($batch, Throwable $e) { // Kap te gjitha exeption
        info('Batch failed with exception: ' . $e->getMessage());
    })
    ->then(function ($batch) {  // Eksekutohu pasi te gjitha proceset jane kryer
        info('All Batch completed successfully!');
    })
    ->finally(function ($batch) { // Eksekutohu edhe nese nuk jane kryer te gjitha proceset me success
        info('All batch finished');
    })
    ->onQueue('deplyoment')
    ->dispatch();
```

## Controlling Rate Limit

Supozojm që kemi 2 queue work që punojn në të njejtën kohë.
Nëse procesohen 2 procese që bëjne ndryshime në një Model (Database) ose e bëjenë ndryshimin e njejt do te kemi konflikt.

Sepse ne fillim eksekutohen 2 job pastaj 2 processet

Pra në këtë rast perdorim `Cache::lock()`

```php
Cache::lock('rate-limit')->block(3, function () {
    info("Processing...");
    sleep(2);
    info("Success...");
});
```

## Unique

Ndonjeher deshirojm qe nje procesim te kryhet vetem 1 here per nje kohe te caktuar
ne keto raste perdorim `ShouldBeUnique`

```php
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateSearchIndex implements ShouldQueue, ShouldBeUnique
{
    // Idja unike
    public function uniqueId()
    {
        // return $this->product->id;
        return 'unique-id';
    }

    // Koha se sa duhet te mbetet unike
    public function uniqueFor()
    {
        return 60;
    }
}
```

`uniqueFor()` - Tregon kohen se sa duhet te qendroj ky proces uniq

`uniqueId()` - ID-ja unike qe duhet te kete ky proces

## Larvel Pipeline

Pipeline është një model dizajni i optimizuar posaçërisht për të trajtuar ndryshimet e shkallëzuara në një objekt. 

Laravel Pipeline eshte i dizajnuar ne kete lloj:

- Ka një metod `handle()` / `handle($request, $next)`

- Kjo metod pranon `$request` dhe `$next`
- `$request` - eshte kerkesa e cila e bëjm
- `$next` - e dergon ne pipelinen tjert

Nje shembull i thjesht: 

```php
$pipeline = app(Pipeline::class);

    $pipeline->send('laravel pipeline is bad') // requesti
        ->through([ // pipelini (funksionet) neper te cilen kalon requesti
            function ($value, $next) {
                $value = str_ireplace('bad', 'super good', $value);

                return $next($value);
            },

            function ($value, $next) {
                $value = str()->title($value); // Laravel Pipeline

                return $next($value);
            }
        ])
        ->then(function ($value) {
            dump($value);
        });

    return 'Done';
```

- `->send()` - Requesti i derguar

- `->through([...])` - Funskionet ku kalon requesti 
- `->then()` - Shfash dicka pas manipulimit me request

Më së shumëti gjen zbatim te llogjika me middleware



