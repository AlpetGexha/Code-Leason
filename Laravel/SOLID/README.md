# SOLID Single Responsibility Principle

SOLID është një grup prej pesë parimesh që përdoren për të disajnuar strukturen e një softwareri ashtu që të jetë i mirëmbajur, scalable dhe lehtë për ta modifikuar

Parimet e Solid jane:

-   `Single Responsibility Principle (SRP)` - Çdo klas duhet të ketë vetëm një detyr të caktuar.
    P.Sh nëse e kemi një class që bën disa punë duhet ta ndajm në disa class qe e kryejn vetem një punë të cakuar

-   `Open-Closed Principle (OCP)` - Një klas duhet të jetë e hapur për zgjerim por e mbyllur për modifikim

-   `Liskov Substitution Principle (LSP)` - Një klas duhet të jetë e zëvendësueshme me klasën e saj bazë

-   `Interface Segregation Principle (ISP)` - Një interface duhet të jetë e ndarë në interface më të vogla

-   `Dependency Inversion Principle (DIP)` - Një klas duhet të dependojë nga një interface dhe jo nga një klasë konkret

## Single Responsibility Principle (SRP)

![image001](https://user-images.githubusercontent.com/50520333/228377619-eefcdf4f-7aeb-4dd2-8e72-6fe7f9f2086c.png)

**Çdo klas duhet të ketë vetëm një detyr të caktuar.**

Një shembull

`SaleReport.php`

```php
class SaleReport {

    public function between($startDate, $endDate) {

        // check auth
        abort_if(!auth()->user()->isAdmin(), 403);

        // query the sales
        $sales = DB::table('sales')->whereBetween('created_ad', [$startDate, $endDate])->sum('change') / 100;

        // format the data
        return $this->format($sales);

    }

    public function format($amount) {

        return '$' . number_format($amount, 2);
    }
}

// call the class
$saleReport = new SaleReport();
$saleReport->between(now(), now()->subMonth()); // price for last month
```

Shume mire nuk kemi gabim ose ne kod, kodi punon ashtu siq duhet, Por nese deshirojm ta ndryshojm formatin apo queryn duhet ta ndryshojm functionin ne class cdo here që bëjmë ndryshime.

Kemi një klasë që bën disa punë, kjo klasë bën query nga databaza, bën check auth dhe formatare të të dhënave.

Le ti ndajm keto pune në klasa të ndryshme:

Ndarja e detyrave per query

````php
SaleReposibility.php

class SaleReposibility {

    public function between($startDate, $endDate) {

        $sales = DB::table('sales')->whereBetween('created_ad', [$startDate, $endDate])->sum('change') / 100;

        return $sales;
    }

    public function lastYear(){

        $sales = DB::table('sales')->whereBetween('created_ad', [now()->subYear(), now()])->sum('change') / 100;

        return $sales;
    }

    ...
}

Ndarja per formate

Per formate mund te perdorim interfacat
`SaleFormatInterface.php`
```php
interface SaleFormatInterface {

    public function format($amount);
}
````

`SaleFormat.php`

```php

class SaleFormat implements SaleFormatInterface {

    public function format($amount) {

        return '$' . number_format($amount, 2);
    }
}
```

Dhe tani ta shikojm si do te dale Classa me modifikimet e reja

`SaleReport.php`

```php
namespace App\Sales;

use App\Sales\Interfaces\SalesInterface;

class SalesReporter
{
    public function __construct(
        public SalesReposibility $repo
    ){}

    public function between($startDate, $endDate, SalesInterface $format)
    {
        $betweenLastMonth = $this->repo->between($startDate, $endDate);

        return $format->output($betweenLastMonth);
    }
}


$obj = SalesReporter(new SalesReposibility);
$obj->between(now(), now()->subMonth(), new SaleFormat);
```

## Open-Closed Principle (OCP)

**Një klas duhet të jetë e hapur për zgjerim por e mbyllur për modifikim**

![image](https://user-images.githubusercontent.com/50520333/228379560-e7d4e2b1-37a0-4686-96a9-acd70a5fa13c.png)

Marrim nje shembull qe nuk perban OCP

Supozojm qe e kemi nje classe `AreaShape` dhe ajo calculon madhesin e rrethit, katrorir...

```php
class AreaShape
{
    // If we dont use open/close
    public function calculate($shapes)
    {
        $result = 0;
        foreach ($shapes as $shape) {
            if ($shape instanceof Circle) {
                $result = $shape->radius * $shape->radius * pi();
            } elseif ($shape instanceof Rectangle) {
                $result = $shape->width * $shape->height;
            } elseif ($shape instanceof Square) {
                $result = $shape->width * $shape->width;
            }
        }

        return $result;
    }
}

class Circle
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}
```

Nëse shkojme me këtë strukturë atëher për çdo herë që dëshirojmë të shtojmë një shape të ri na duhet të modifikojm codin basë, gjë që vjen në kundërshtim me rregullën **OCP**

Atëhere për zgjithejn e këtij problemi mund të përdorim një _interface_ që na tregon formulen e shapit ne rastin tonë

```php
interface ShapeInterface
{
    public function area() : int | double | float;
}

class Circle implements ShapeInterface
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius * pi();
    }
}


class AreaShape
{
    // If we use open/close
    public function Calculate($shapes)
    {
        $result = 0;
        foreach ($shapes as $shape) {
            $result = $shape->area();
        }

        return $result;
    }
}

```

Pra `ShapeInterface` e obligon që çdo shape të ketë një formulë brenda area dhe classa `AreaShape` nuk do të ketë problem ta kalculoj ate formule.

E njejta që mund të përdoret kur kemi disa lloje të **Payment acception**.
Nese kemi një aplikacijon ku pranojmë më shumë se një menyr të pagesës

```php

interface PaymentMethodInterface {
    public function acceptPayment($receipt)
}

class CashPeymentMethod implements PaymentMethodInterface {
    public function acceptPayment($receipt){...}
}

class Checkout{
    public function begin(Receipt $receipt, PaymentMethodInterface $payment){
        $payment->acceptPayment($receipt);
    }
}
```

## Liskov Substitution Principle (LSP)

Një klas duhet të jetë e zëvendësueshme me klasën e saj bazë

-   Signareu must match
-   Preconditions cant be greater
-   Post conditions at least equal to
-   Exception types must match

## Interface Segregation Principle (ISP)

**Ky parim thotë se një klasë nuk duhet të detyrohet të implementojë interface që nuk i përdor**

![image](https://user-images.githubusercontent.com/50520333/228384804-ba177c22-5c0c-4c25-a4bb-6e9ddc587e91.png)

Supuzojm qe qeshirojm të punesojm një crew member. Cfarë duhet të bëje ai member (duhet te punoj, flej, ushqehet, mesoj etj...)

```php

interface CrewMemberInterface
{
    public function work();
    public function eat();
    public function sleep();
    public function learn();
    public function communicate();
}

class Worker implements CrewMemberInterface{
    public function work(){...}
    public function eat(){...}
    public function sleep(){...}
    public function learn(){...}
    public function communicate(){...}
}

class Capital{
    public function hire(Worker $work){
        $work->work();
        $work->eat();
        $work->sleep();
        $work->learn();
        $work->communicate();
    }
}
```

Por çfarë do të ndodh nëse dëshirojm ta shojm ne ekip një Android
Androidi nuk flen apo ushqehet

```php
class Android implements CrewMemberInterface{
    public function work(){...}
    public function eat(){return null}
    public function sleep(){return null}
    public function learn(){...}
    public function communicate(){...}
}
```

Kjo vjen në kundershitm me ISP sepse nuk duhet qe nje klas te detyrohet te implementoj nje interface qe nuk i perket. Në rastin tonë Androidit nuk i nevoit metoda eat dhe sleep.

```php
interface WorkerdInterface
{
    public function work();
}

interface SleeperInterface
{
    public function sleep();
}

interface SleeperInterface
{
    public function communicate();
}

interface MenageInterface
{
    public function beMenage();
}

class Worker implements WorkerdInterface, SleeperInterface, MenageInterface
{
    public function work()
    {
        echo "I'm working";
    }
    public function sleep()
    {
        echo "I'm sleeping";
    }
    public function beMenage()
    {
        $this->work();
        $this->sleep();
    }
}

class Android implements WorkerdInterface
{
    public function work()
    {
        echo "I'm working";
    }
    public function beMenage()
    {
        $this->work();
    }
}

class GoodCaptain
{
    public function menage(MenageInterface $worker)
    {
        $worker->beMenage();
    }
}
```

`MenageInterface` - I thirr vetem funskionet që i përkasin asaj clase

Tani jemi ne rregull me rregullen e **Interface Segregation Principle**

As një class nuk detyrohet të përdor interface qe nuk i perket.

## Dependency Inversion Principle (DIP)

Ky parin thotë "high-level modules should depend on abstractions rather than concrete implementations"
![1647405323448](https://user-images.githubusercontent.com/50520333/228376185-8a484283-3a89-416a-904a-7526d1608f59.png)

Kjo ndihmon në ndarjen e moduleve të nivelit të lartë dhe të ulët, duke e bërë më të lehtë ndryshimin e atyre të nivelit të ulët pa ndikuar në ato të nivelit të lartë

P.sh

```php
class PasswordReminder
{
    /**
     * @var MySqliConnection
     */
    private $dbConnection;
    public function __construct(MySqliConnection $dbConnection){...}
    // highe level code do not need to depen on low level code instend he need to depent on apstraction
    // and low level code depend on same apstraction aswell
}
```

Classa `PasswordReminder` që në ratin tonë është nivel i lart (high modul) faret nga një class e ulët `MySqliConnection` e cila faktikisht `PasswordReminder` nuk i intereson fare se çfarë koneskioni ka.

Pra nëse spatojm Dependency Inversion Principle.

```php

interface ConnectionInterface
{
    public function connect();
}

class DB implements ConnectionInterface
{
    public function connect()
    {
        // code
    }
}

class PasswordReminder
{
    /**
     * @var MySqliConnection
     */
    private $dbConnection;

    public function __construct(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}
```

Pra classa `PasswordReminder` faret nga nje apstrakt `ConnectionInterface` dhe klasa e ulet `DB` faret nga po e njeta apstrakt `ConnectionInterface`.

E gjithë kjo ka të bëjë me shkëputjen e kodit.

## Inversion of Control (IOC)

"Inversion of control is a software design principle that asserts a program can benefit in terms of pluggability, testability, usability and loose coupling if the management of an application's flow is transferred to a different part of the application."

Kjo i referohet kur dy komponente mund të kenë një ndikim të rëndësishëm në komponentin tjetër. Kjo mund ta bëjë të vështirë mirëmbajten dhe modifikimin e sistemit me kalimin e kohes, veçanerisht kur bëhen më komplekse

ICO - ndihmon në arritjen e lidhjes së lirë duke transferuar përgjegjësinë për menaxhimin e rrjedhës së një aplikacioni nga një komponent në tjetrin. Në mënyrë tipike, kjo do të thotë që në vend që një komponent të thërrasë drejtpërdrejt një komponent tjetër për të kryer një detyrë, komponenti i parë i delegon përgjegjësinë për atë detyrë një komponenti tjetër duke ia kaluar kontrollin.

P.Sh
Suppose we have a UserController that needs to interact with a UserRepository to fetch user data. Without Inversion of Control, the UserController would need to instantiate the UserRepository directly:

Supozojm qe kemi `UserController` dhe kjo ka nevoj të ndërveprojnë me `UserRepository` për të shfaqur të dhënat. Pa Inversionin e Controllerit. UserController duhet të ndërveprojnë me `UserRepository` direct

```php
class UserController {
  protected $userRepository;

  public function __construct() {
    $this->userRepository = new UserRepository();
  }

  public function show($id) {
    $user = $this->userRepository->find($id);
    return view('user.show', compact('user'));
  }
}
```

Në këtë kod `UserController` është lidhur ngusht me `UserRepository` gjë që mund ta bëjë të vështirë modifikimin dhe testimin e kodit me kalimin e kohës.

Duhe perdoror Inversion of Controll mund ta zgjithim këtë problem

```php
class UserController {
  protected $userRepository;

  public function __construct(UserRepository $userRepository) {
    $this->userRepository = $userRepository;
  }

  public function show($id) {
    $user = $this->userRepository->find($id);
    return view('user.show', compact('user'));
  }
}
```

Kjo qasje arrin lidhjen e lirshme midis `userController` dhe `userRepository`.Nëse ndonjëherë na duhet të ndryshojmë mënyrën se si zbatohet `UserRepository`, ne mund ta bëjmë këtë pa modifikuar kodin `UserController`.
