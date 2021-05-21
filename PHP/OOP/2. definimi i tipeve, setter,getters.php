<?php

declare(strict_types = 1);

/*    
    definimi i tipeve, setter/getters
*/
class Studenti
{
    private $emri, $mbiemri, $mosha;

    public function __construct($emri, $mbiemri, $mosha = 18)
    {
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->mosha = $mosha;
    }
    // __toString Funskion me vlere kthyse ("return") qe kethen vetem String
    public function __toString()
    {
        return "Ermi: " . $this->emri . " Mbiemri: " . $this->mbiemri . " Mosha: " . $this->mosha . "<br>";
    }

    // e ndan vleren 
    public function setName($emri)
    { //:void
        $this->emri = $emri;
    }
    //e e merr vlern
    public function getName()
    { //:string vlere kthyse
        return $this->emri;
    }
}



$Alpet = new Studenti("Alpet", "Gexha", 16);
$Filan = new  Studenti("Filan", "Fisteku");


echo $Alpet->getName() . "<br>";
echo $Alpet;


$Filan->setName("Filani2");
echo $Filan;