Nese OrderBy('name') ka query time te madh:
Atehere shto nje migrate database dhe beje "name" si index

    $table->index('name')

I Selectojm vetem fildat qe na nevotinten

```php
    $post = Post::select('id','title','slug')->get()
```

Per te marre vetem nje fiel nga hasMany:
Mund te perdorim subQuery

````php
    public function scopeWithLastLogin($query)
    {
        return $query->addSelect([
            'last_login_at' => Login::select('created_at')
                ->where('user_id', 'user.id')
                ->lates()
                ->take(1)
        ])->withCasts(['last_login_at' => 'datatime']); // make last_login_at valid for diffForHumans


    $user = User::query()
        ->withLastLogin()
        ->orderBy('name')
        ->paginate()
    }
    ```

Nese Deshirom te marrin numrin e disa parametrave ne database pershembull (Sa usera i Activ,JoActiv, Qe jane verifukuar etj)
Qe te mos perdorim me shume se 4query atehere e mund te perdorim Dinacmi "Conditional Aggregates"

```php
     $stats = ModelsUser::toBase()
            ->selectRaw('count(id) as total')
            ->selectRaw('count(case when is_verified = 1 then 1 end) as verified')
            ...
            ->first();
````

Për performac të modeleve e perdorim toBase()

Nese kemi nevoj per te bere load me shume se 2 relacine te njejta (Ne kometin e nje blogi autorit ti ipet begi Author dhe Userave te tjer begi momental)

```php
$blog->loads('comments.users','comments.replys','comments.feature') // Shtojm 3fishin e modeleve te nevoitura
```

Per ta rregulluar kete perdorim setRelacion()

```php
    $blog->comments->each->setRelacion('user',$user)
    $blog->comments->each->setRelacion('replys',$replys)
    $blog->comments->each->setRelacion('feature',$feature)
```

Dhe do ta shikojm se numri i Modeleve eshte stabil

Nje Metod me e mire per ta perdorur ne vet te `whereHas()` ose `orWhereHas()`

```php
    $query->whereHas('comapanys', fn($q) => $q->where('name', 'like' ,$name)) // me whereHas
```

Per kete duhet te shtohen edhe index per cdo field qe deshirom te bejme search

```php
$name = $name.'%'
    $query->whereIn(
        'company_id', fn($q) =>$q->select('id')->from('comapanys')->where('name','like',$name)
)

    $query->orWhereIn(
        'company_id', fn($q) =>$q->select('id')->from('comapanys')->where('name','like',$name)
)
```

Dallimi eshte te shpejtesia e performancave

Nje metod edhe me e shpejt

```php
$name = $name.'%'
    $query->whereIn(
        'company_id', fn($q) =>$q->select('id')->from('comapanys')->where('name','like',$name)
)

    $query->orWhereIn(
        'company_id', Company::query()->where('name','like',$name)->pluck('id');
)
```

Menyra me e optimizuar per te renditur hasMany relacionet (Subquery)

```php
$users = User::query()
        ->orderByDesc(Login::select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1)
        )
        ->withLastLogin()
        ->paginate();

```

Rrathiti te dhenat qe jane null ne fund

```php
    $books = Book::query()
        ->orderByRaw('user_id is null') // nese user_id eshte null te gjitha te dhenat qe jane null rrathiti ne fund
        ->orderBy('name')

// With  filter
    $books = Book::query()
        ->when(request('filter') === 'sortBy',function($q){
            $q->orderByRaw('user_id is null')
        })
        ->orderBy('name')
```

<!-- Short Macro -->

ne App Service Provaider

```php
    public function boot()
    {
        Builder::macro('orderByNullLast', function($colum, $direction = 'asc'){
            $colum = $this->getGrammar()->wrap($colum);
            $direction = strtolower($direction) === 'asc' ? 'asc' : 'desc';
            return $this->orderByRaw("{$colum} {$direction} nulls last");});
    }

    // ne controller
    $books = Book::query()
        ->when('sortBy',function($q){
            $q->orderByNullLast('user_id',$request->direction)
        })
        ->orderBy('name')
```

Keni 3 statuse: Requested, Approved, Completed
Rendintja by default eshte Approved, Requested ,Completed
Renditi: Requested, Approved, Completed

```php
    public function scopeOrderByStatus($query, $direction)
    {
        return $query->orderBy(DB::raw(
            'case
                when status = "requested" then 1
                when status = "approved" then 2
                when status = "completed" then 3
            end'
        ),$direction )
    }
```

Supozorjm qe kemi 1 Blog me Kometen, Shikime, Like, Share dhe deshirojm te bejme sort nga aktiviteti
Per ta bere kete duhet te caktojm sa "pike" ose "score" do te kente secila ...

Komentet: 3pike,
Shikimet: 1pike,
Like: 1pike,
Share: 2pike

```php

    public function scopeOrderByActivity($query, $direction){
       return $query->orderBy(DB::raw(
            '(comment + (views * 3) + like + (share * 3) )'
        ), $direction);
    }
```
