# Pipeline

**Pipeline** i referohet një sekuence procesesh ose operacionesh që kryhen në një pjesë të të dhënave ose inputit, ku outputi i një operacioni shërben si input i nje operacioni tjeter.

Nje shembull ne Laravel është **Middleware**

Laravel Pipeline eshte i dizajnuar ne kete lloj:

-   Ka një metod `handle()` / `handle($request, $next)`

-   Kjo metod pranon `$request` dhe `$next`
-   `$request` - eshte kerkesa e cila e bëjm
-   `$next` - e dergon ne pipelinen tjert

```php
    app(Pipeline::class)
    ->send('laravel pipeline is bad') // requesti
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

-   `->send()` - Requesti i derguar
-   `->through([...])` - Funskionet ku kalon requesti
-   `->then()` - Shfash dicka pas manipulimit me request


Supozojm që kemi një aplikacion që menaxhon të dhënat e punonjësve. Ne kemi një Collection punonjësish dhe duam të kryejmë disa operacione:

1. Filtro _collection_ për të përfshirë vetëm punonjësit që kanë punuar për kompaninë për më shumë se 5 vjet.

2. Llogaritni numrin total të orëve të punës nga secili punonjës.

3. Renditni _collection_ (DESC) bazuar në numrin total të orëve të punuara.

<br />

![fig2](https://user-images.githubusercontent.com/50520333/228684638-5089acb9-1170-441d-84ed-f8e2bff4bd12.png)

<br />


Për ta arritur këtë, ne mund të krijojmë një pipeline që kryen çdo operacion në sekuencë.

Fillimisht le ti krijom "pipes"

1.

```php
class FilterEmployeesByYearsOfService
{
    // Filter the collection to only include employees who have worked for the company for more than 5 years.

    public function __construct(public int $yearsOfService = 5){}

    public function handle(Collection $employees, Closure $next)
    {
        $employees = $employees->filter(function ($employee) {
            $hire_date = $employee->hire_date;
            $years_of_service = now()->diffInYears($hire_date);

            return $years_of_service > $this->yearsOfService;
        });

        return $next($employees);
    }
}
```

2.

```php
class CalculateTotalHoursWorked
{
    // Calculate the total number of hours worked by each employee.

    public function handle(Collection $employees, Closure $next)
    {
        // Calculate total hours worked by each employee

        $employees->map(function ($employee) {
            $total_hours = $employee->time_logs->sum('hours_worked');

            return [
                'id' => $employee->id,
                'name' => $employee->name,
                'total_hours' => $total_hours,
            ];
        });

        return $next($employees);
    }
}
```

3.
```php
class SortEmployeesByTotalHoursWorked
{
    // Sort the collection in descending order based on the total number of hours worked.

    public function handle(Collection $employees, Closure $next)
    {
        $employees = $employees->sortByDesc('total_hours');

        return $next($employees);
    }
}
```

Dhe tani, ne duam te perdorim pipes ne pipeline.

Mund të perdorim API Controller për ta testuare

`API/EmployeController.php`
```php
use App\Models\Employee;
use Illuminate\Pipeline\Pipeline as PipelinePipeline;
use Illuminate\Support\Facades\Pipeline;

class EmployeController extends Controller
{
    public function __invoke()
    {
        $pipelines = [
            // new \App\Employee\FilterEmployeesByYearsOfService(2),
            \App\Employee\FilterEmployeesByYearsOfService::class,
            \App\Employee\CalculateTotalHoursWorked::class,
            \App\Employee\SortEmployeesByTotalHoursWorked::class,
        ];

        $employees = Employee::all();

        // return app(Pipeline::class)
        //     ->send($employees)
        //     ->through($pipelines)
        //     ->thenReturn();

        return app(PipelinePipeline::class)
            ->send($employees)
            ->through($pipelines)
            ->thenReturn();
    }
}
```
