## Builder Pattern

**Builder Pattern** - është e dizajnuare për të ofruar zgjithje fleksibile për problemet e ndryshme të krijimit të objeckteve në OOP.

Qëllimi i modelit të projektimit të ndërtuesit është të ndajë ndërtimin e një objekti kompleks nga përfaqësimi i tij

Le të marrim një shembull:

```php
<?php
class PizzaBuilder
{
    private $size;
    private $cheese;
    private $pepperoni;
    private $bacon;

    public function __construct($size)
    {
        $this->size = $size;
    }

    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }

    public function addBacon()
    {
        $this->bacon = true;
        return $this;
    }

    public function build()
    {
        return new Pizza($this->size, $this->cheese, $this->pepperoni, $this->bacon);
    }
}

class Pizza
{
    public function __construct(
        private string $size,
        private string $cheese,
        private string $pepperoni,
        private string $bacon
    ) {
    }

    public function getDescription()
    {
        $description = "This is a {$this->size} pizza with";
        if ($this->cheese) {
            $description .= " cheese";
        }
        if ($this->pepperoni) {
            $description .= " pepperoni";
        }
        if ($this->bacon) {
            $description .= " bacon";
        }
        $description .= ".";
        return $description;
    }
}

// Usage
$pizza = (new PizzaBuilder('large'))
    ->addCheese()
    ->addPepperoni()
    ->addBacon()
    ->build();
echo $pizza->getDescription(); //"This is a large pizza with cheese pepperoni bacon."
```

Në këtë shembull class `PizzaBuilder` është përgjegjëse për ndërtimin e objektit `Pizza`. Class `PizzaBuilder` ka disa metoda për shtimin e shtresave të ndryshme në picë (`addCheese()`,`addPepperoni()`...)
dhe një metod `build()` që kthen objektin final të Picës

Class `Pizza` ka një `__constructor` që merr parametra të ndryshëm, duke përfshirë madhësinë e picës dhe mbushjet, dhe një metodë `getDescription()` që kthen një varg që përshkruan madhësinë dhe mbushjet e picës.

Ky shembull tregon se si mund të demostrojm `Builder Pattern` (PizzaBuilder) ne nje object (Pizza)

Një shembull real:

```php
class QueryBuilder
{
    private $table;
    private $where = array();
    private $orderBy = array();
    private $limit;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function where($field, $value)
    {
        $this->where[] = "$field = '$value'";
        return $this;
    }

    public function orderBy($field, $direction = 'ASC')
    {
        $this->orderBy[] = "$field $direction";
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function build()
    {
        $query = "SELECT * FROM $this->table";
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(' AND ', $this->where);
        }
        if (!empty($this->orderBy)) {
            $query .= " ORDER BY " . implode(', ', $this->orderBy);
        }
        if ($this->limit) {
            $query .= " LIMIT $this->limit";
        }
        return $query;
    }
}


$query = (new QueryBuilder('users'))
            ->where('age', 25)
            ->orderBy('last_name')
            ->limit(10)
            ->build();

echo $query;
// Outputs: SELECT * FROM users WHERE age = '25' ORDER BY last_name ASC LIMIT 10
```

## ORM Pattern

ORM stands for Object-Relational Mapping. It is a programming technique used to map database tables to classes, and map table rows to objects, making it easier to interact with a database using an object-oriented programming approach.

Using ORM, developers can avoid writing raw SQL queries and instead interact with the database using objects, making it easier to create, read, update, and delete data.

Here's an example of using an ORM in PHP with the popular library called Eloquent, which is part of the Laravel framework:

First, you define a model class that extends Eloquent:

```php
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
}
```

Then, you can use this model to interact with the users table in the database:

```php
$user = new User;
$user->name = 'John';
$user->email = 'john@example.com';
$user->save();

$users = User::all();

foreach ($users as $user) {
    echo $user->name . '<br>';
}
```

In this example, we created a new user object, set its properties, and called the save method to save it to the database. We also retrieved all users from the users table using the all method, which returns a collection of user objects. We then looped through the collection and printed each user's name

## Singleton Pattern

`Singleton Pattern` - është një model dizajni që kufizon instancën e një klase në një objekt, duke siguruar akses global në atë objekt përgjatë aplikacionit.

**Singleton Pattern** është i dobishëm në situatat kur duhet të siguroheni që të krijohet vetëm një instance të një klase dhe që kjo instanc të jetë lehtësisht e aksesueshëm nga pjesët e tjera të aplikacionit

```php
class Singleton
{
    private static $instance = null;

    private function __construct() {
        // Private constructor to prevent instantiation from outside
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function doSomething() {
        echo "Doing something...";
    }
}
```

Class `Singleton` ka një `__construct` për të parandaluar instancën nga jashtë klasës. Ajo gjithashtu ka një metodë statike `getInstance()` që kthen shembullin e vetëm të klasës. Nëse nuk ekziston asnjë shembull i klasës, ajo krijon një dhe e kthen atë. Përndryshe, ai thjesht kthen shembullin ekzistues.

Për të përdorur class Singleton, do të thërras metodën `getInstance()` për të marrë instancën e klasës dhe më pas do të thërrisni metodën `doSomething()` në atë shembull:

```php
$singleton = Singleton::getInstance();
$singleton->doSomething();
// return doSomething
```

Nëse provojm ta krijom `Singleton` duke perdorur kontruktorin, do të dështoj, sepse construkotri eshte privat

```php
// This will fail with a fatal error
$singleton = new Singleton();
```

Një shembull real ne Query Builder

```php
class QueryBuilder
{
    private static $database;
    private $pdo;
    private $table;
    ...

    private function __construct(PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public static function table(string $table): self
    {
        $options = [
            // ...
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=query_builder', 'root', '', $options);

        // singleton pattern
        if (!isset(self::$database)) {
            self::$database = new self($pdo, $table);
        }

        return self::$database;
    }
    ...
}

```

Perdorimi

```php
$query = QueryBuilder::table('users')->get(); // this return query rezult
$query = new QueryBuilder(); // this return fatal error
```
