<?php

declare (strict_types = 1);

/*
     Object Inheritance 
     Magic method: toString, set, get, dhe call
*/

class Student
{
    protected $name, $index, $must_finish_in;

    public function __construct($name, $index, $must_finish_in)
    {
        $this->name = $name;
        $this->index = $index;
        $this->must_finish_in = $must_finish_in;
    }
    public function __toString()
    {
        return "Ermi: " . $this->name . " Indexi: " . $this->index . " duhet perfunduar: " . $this->must_finish_in ;
    }

    public function getName(){   // public final function getName //Final - nuk mund ta rishruajm metoden
        echo "Emri :" . $this->name;
    }
}

// extends sgjeroje klasen Nuk kemi nevoj ti rrishjuajm edhe nje heres
class BScStudent extends Student
{
    private $x;
    public function __construct($name, $index, $must_finish_in,$x){  
        //parent trego se cilat vlera deshiron ti marresh nga clasa tjeter
        parent::__construct($name, $index, $must_finish_in, $x);
        $this->x = $x;

     
        }
        public function __toString()
        {
            return parent::__toString() . "Gmail: " . $this->x; 
        }

        /* Metoda overwriting - E mbishruan  dhe e lexon mbishkrimin e  fundit */
        public function getName(){
            echo "Emir i nxenesit: " . $this->name;
        }

    }



// class MScStudent extends Student
// {

// }

// class PhdcStudent extends Student
// {
// }


$Alpet = new BScStudent("Alpet",132132123, 1 ,"Test 1");

//echo $Alpet;

echo "<br>" . $Alpet->getName();



Class Statike {
    private $name, $surname, $age;

    public function __construct($name, $surname, $age){
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function __toString() {
        return "Emri: " . $this->name . "\n" .  " Mbiemir: " . $this->surname . "\n" . " Mosha: " . $this->age ."\n"; 
    }

    /* Ne metoden Statike nuk eshte e nevojshme qe te hapet objekit por mund ta thirrim shkurt "Statike::getTest();"  */
    public static function getTest() {
        echo "Une jam medota satatike";

    }
}


Statike::getTest();


// $a = ([
//     "volume" => 9, 
//     "background" => "me.jpg"
//     ]);
class Settings {
    private $data;

    //Mundesojn krijimin e metodave pa i shruja ne clasa "$settings->volume = 9;"
    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        if(!isset($this->data[$key]))
            return false;

        return $this->data[$key];
    }
}



$settings = new Settings;
$settings->volume = 9;
$settings->background = "me.jpg";

echo "<br>" . $settings->volume ." " .$settings->background;

// $settings->setData(["volume" => 9, "background" => "me.jpg"]);
// print_r($settings->getData());