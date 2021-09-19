
<?php
/*
 HP mbështet vetëm trashëgiminë e vetme: një klasë fëmijë mund të trashëgojë vetëm nga një prind i vetëm.

Pra, çfarë nëse një klasë duhet të trashëgojë sjellje të shumta? Tiparet OOP e zgjidhin këtë problem.

Ttrait përdoren për të deklaruar metoda që mund të përdoren në klasa të shumta. Karakteristikat mund të kenë metoda dhe metoda abstrakte që mund të përdoren në klasa të shumta, dhe metodat mund të kenë çdo modifikues aksesi (publik, privat ose të mbrojtur).

Tiparet deklarohen me fjalën trait kyçe
  */


trait CPUComputer
{
    public function CPU1()
    {
        echo "Intel Core i7-4770 3.40GHz ";
    }
}

trait GPUComputer
{
    public function GPU1()
    {
        echo "NVIDIA GeForce GTX 1060 6BG";
    }
}

class CPU
{
    use CPUComputer;
}

class GPU
{
    use GPUComputer;
}
class AllIn
{
    use CPUComputer, GPUComputer;
}

$obj = new CPU();
$obj->CPU1();
echo "<br />";

$obj2 = new GPU();
$obj2->GPU1();
echo "<br /> <br />";

$obj3 = new AllIn();
$obj3->GPU1();
echo " / ";
$obj3->CPU1();


/*
 *Klasa përdor tiparin, dhe të gjitha metodat në tipar do të jenë të disponueshme në klasë.

Nëse klasat e tjera duhet të përdorin funksionin thjesht përdorni tiparin Trait Name në ato klasa. Kjo zvogëlon dyfishimin e kodit, sepse nuk ka nevojë të rideklaroni të njëjtën metodë pa pushi
*/
?>