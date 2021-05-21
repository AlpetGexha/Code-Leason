<?php

/*       
        klasa, objekti, atributet e klasës, konstantat , konstruktori, destruktori
*/

/*
Privat - class
Protected - class || class children
Public - class || class children || outsite
*/


class Rrethi
{

    /*
Per numra(vlera) normale perdoret variabla
per numra constant nuk duhet te shruhet "$" dhe emri duhet te jete me shronja te medha
*/

    public $r = 10;
    public const PI = 3.14;

    //Konsturktori - Kur thirret new "Rrethi"
    public function __construct($rrezja) {
        $this->r = $rrezja;
       // echo "Konstruktori <br>";
    }
    
    //Destrukori - kur classa kryen objekti aktivizohet detrukori

    public function __destruct()
    {
       // echo "<br> Destruktori";
    }
    

    //funksioni
    public function perimetri()
    {
        return (2 * $this->r * self::PI); //2*10*3.14
        /*
$this- qasjes te propertis "r" vetem ne kete class
self:: - Vetem per numra konstant
*/
    }
}


/*
Per te thirrurr classen
*/
//$Rrethi = new Rrethi(); //instans

$Rrethi = new Rrethi(10);
//thirrja e variablave mbrenda classes
echo "Rezja: " . $Rrethi->r;
echo "<br>";

$Rrethi2 = new Rrethi(20);
echo "Rezja2: " . $Rrethi2->r . "<br>";
//thirrja e numrit constatnt
echo "Numri PI: ". $Rrethi::PI;
echo "<br>";

$Rrethi->r = 20; //per ndryshimin e vleres(Vetem ne klasa publike)
//funkisoni i perimetirt
echo "Perimetri: " . $Rrethi->perimetri();