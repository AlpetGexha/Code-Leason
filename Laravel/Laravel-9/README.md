# Laravel 9

### New Route List
![image](https://user-images.githubusercontent.com/50520333/153670918-d1fe8b54-c034-4d42-9ac6-431e4a73e7c3.png)


### New Exception Page (Error Page)
![image](https://user-images.githubusercontent.com/50520333/153670718-534b5bfd-b61b-4ce1-aa59-2121164ea3d3.png)

## Anonymous Migration Classes

Before

```php
class CreateUsersTable extends Migration{
    ...
}
```

Now

```php
return new class extends Migration{
    ...
}
```

## Controller Grup

##### Controller Group, Now we can group controller

Before

```php
Route::get('/post/{post}', [PostController::class, 'show']);
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{post}', [PostController::class, 'update']);
Route::delete('/post/{post}', [PostController::class, 'destroy']);
```

Now

```php
Route::group(['controller' => PostController::class], function () {
    Route::get('/post/{post}', 'show');
    Route::post('/post', 'store');
    Route::put('/post/{post}', 'update');
    Route::delete('/post/{post}', 'destroy');
});
```

## Str on function

After

```php
    Str::of('Alpet Gexha Laravel 9')->slug() //alpet-gexha-laravel-9
```

Now

```php
    str('Alpet Gexha Laravel 9')->slug() //alpet-gexha-laravel-9
    str()->slug('Alpet Gexha Laravel 9') //alpet-gexha-laravel-9
```

## Route Redirect

After

```php
    return redirect()->route('ballina'); //go to ballina
```

Now

```php
    return to_route('ballina'); //go to ballina
```

## Route Redirect

##### Now u can render a blade string into its HTML Equivalent

New

```php
    return  Blade::render('Hello, {{ $name }}', [
        'name' => 'Alpet',
    ]);
```

## Force Scope Binding

##### So on laravel 8 to Scope Binding we use 2 main methods

#### Method 1 like (post:id)

```php
   Route::get('user/{user}/post/{post:id}', function (User $user, Post $post) { ... }
```

#### or Method 2 (findOrFail)

```php
   Route::get('user/{user}/post/{post}', function (User $user, Post $post) {
      return User::findOrFail($user->id)->posts()->findOrFail($post->id);
});
```

##### So on Laravel 9 we use just ( scopeBindings() )

```php
   Route::get('/l9/user/{user}/post/{post:id}', function (User $user, Post $post) {
    return $post;
})->scopeBindings();
```

## Laravel Scout

#### on Laravel 9 we can use Laravel Scout with Database Engine(its not recommended for large project) and not only with Algoria or MeiliSearch

for more info [Laravel Scout](https://laravel.com/docs/8.x/scout)

<!-- We call laravel scout

```php
composer require laravel/scout
```

and publish

```php
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

on `.env` file we add `SCOUT_DRIVER=database`
-->

After we finish confing Laravel Scout (require,publish,config, make method) we can use like this

```php
Route::get('/search/{search?}', function ($search = 'Adipisci ') {
    $post = Post::search($search)->get(); //to search for a specific word
    // return $post->count(); //count the number of results
    return $post;
});
```

## Laravel Full Text Search

#### if we want to use full text search me need to add atribute on migrate table for what we want to Full Text Search. Lets go for body so on `database/migrations/MIGRATE_FILE_NAME`

```php
   public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        ...
            $table->text('body')->fulltext();
        ...
        });
    }
```

#### and we can use like this

```php
$post = Post::whereFullText('body', 'WHAT WE WANT TO SEARCH')->get(); //to search for a specific word
    return $post;
    // return $post->count(); //count the number of results
```

## Enum

### One of the new and best features on php

(PHP 8 >= 8.1.0)

Enumerations, or "Enums" allow a developer to define a custom type that is limited to one of a discrete number of possible values. That can be especially helpful when defining a domain model, as it enables "making invalid states unrepresentable."[More Info](https://www.php.net/manual/en/language.enumerations.overview.php)

#### We create an Enum file "name.php"

#### enum by default its true(1) or false(0) if we want we change we user (enum NAME : String,int,void)

```php
<?php

namespace App\Enums;

enum PostStatus: String
{
    case Draft = 'Draft';
    case Public = 'Public';
    case Privat = 'Private';
}
```

Also we can use enum as migratet on database (i not higher recommended to use this for now)

```php
use App\Enums\PostStatus::Draft;

   public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        ...
        // I dont recommend use this
            $table->enum('status', ['public', 'draft', 'privat'])->default('draft');
        // We can use this
             $table->string('status')->default(PostStatus::Draft);
        // This is ur choise witch one u want to use. Both are good and return same result
        ...
        });
    }
```

##### We cast Enum Value

on `App\Models\NAME`

```php
    protected $casts = [
        'status' => PostStatus::class,
    ];
```

#### And we can use like this

```php
 $posts = (new Post); //call post model

    //get random post
    $post = $posts->inRandomOrder()->first()->status; // get random first status post

    if ($post === PostStatus::Public) {
        return 'Your random Post its Public Staus';
    }
    if ($post === PostStatus::Draft) {
        return 'Your random Post its Draft Staus';
    }
    if ($post === PostStatus::Privat) {
        return 'Your random Post its Privat Staus';
    }
```

#### Or created like this

```php
    // To create a new Post with enum
    $post = (new Post);

    $post->user_id = 1; //fake user id
    $post->title = 'My first post'; //title
    $post->body = 'My Body'; //body
    $post->status = PostStatus::Public; //public enum

    $post->save();

    return 'Post Created with Enum';
```


Create Data: 02/11/2020