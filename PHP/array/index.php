<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">

</head>

<body>
	<?php

	$a = array("Futboll", "Basketboll", "Tensi", "Voleboll", "Noti", "Hokej");

	array_push($a, "Golf"); //shto ne fund 
	array_pop($a); //heq te fundit
	array_shift($a); // heq te paren 
	array_unshift($a, "Regbi"); //shto ne fillim 
	$madhesia = count($a);

	for ($i = 0; $i < $madhesia; $i++) {
		echo $a[$i];
		echo "<br>";
	}

	echo count($a); // vlera e $a
	echo "<br>";
	echo "<br>";

	//karakteret sa shkronja
	$output = array_slice($a, 0, 4);
	var_dump($output);
	echo "<br>";
	echo "<br>";

	//mblethje e numrave
	$numrat = [4, 2, 5, 7, 12];
	echo (array_sum($numrat)); //echo //var_dump



	/* 1 
$x = 'Alpet';
var_dump($x);  //fuksion i gatshem
*/

	/* 2
function fuksioni1() {  //krijimi i funksinit
	echo "Dite e bukur";
}
fuksioni1();  //thirrja 
*/

	/* 3
function maksimumi ($x, $y) {
	if ($x <= $y) {return $y;}

	else{return $x;}}
$x = 7;
$y = 7;
$prova = maksimumi($x,$y);
echo "Maksimumi nës mes $x dhe $y është $prova";
*/

	/*
$a = array("Futboll","Basketboll","Tensi","Voleboll" );

echo $a[2];
echo "<br>";
echo end ($a);
*/
	?>

</body>

</html>