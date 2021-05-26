<?php

declare(strict_types = 1);

/*
     interface - Faktura
     thirret me implements
     Mund te perdorim me shume se 1 infterface ne nje class

*/

interface IUBTStudend  {
        public function hadId() : bool;

}

interface IAABStudend  {
    public function hadBadge() : bool;
}

class Student implements IUBTStudend
{
    public function hadId(): bool
    {
      return true;
    }
}

// Nese implemetohet nje inteface gjithmon duhet te thirret. Nese jo nuk do te punoj
class SuperStuden implements  IUBTStudend, IAABStudend {

    public function hadId(): bool
    {
       return true;
    }

    public function hadBadge(): bool
    {
        return false;
    }
}


/*
    Polymorphism
*/

interface Player
{
    public function draw();
}

class Mario implements Player{

    public function draw()
    {

    }
}


class Luigi implements Player{

    public function draw()
    {

    }

}
//per te thirrur lv e pare duhet te jete mario ne lojes
class level1 {
    public function earnsNewLive(Mario $m){

    }
}

$l1 = new level1();
$Mario = new Mario();

$l1->earnsNewLive(Luigi);//Mario


