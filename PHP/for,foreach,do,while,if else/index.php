<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	$moshaa = array("Alpet" => "16", "Etink" => "17", "Gjan" => "17");
	foreach ($moshaa as $x => $value) {
		echo "$x është $value";
		echo "<br>";
	}



	/*
$makinat = array("BWM","Auid","Golf2");

foreach ($makinat as $makina ) {
	echo "$makina";
	echo "<br>";
}
*/
	/* for
for ($i=0 ; $i < 10 ; $i++) { 
	echo "numir $i";
}
*/

	/* do
$y = 2;
do {
	echo "Numir eshte $y"; //kodi
	$y++;
}
while ($y >= 10) ;// kushti
*/

	/*
 $x = 1;
 while ( $x <= 10) { //kushti
 	echo "Numri $x"; //deri sa x<=10 persërite //kodi
 	$x++; //deri te 10
 }
*/

	/*
$a = 1;
$b = 2;

if ($a = $b ) {
	echo "Hello";
}
*/

	/*  1
$a = 5;
$b = 7;

if ($a < 6 && $b < 5) { // "&& ose ose" "|| vetem një"
	echo "Sakt";
}

else{
	echo "Gabim";
}
*/

	/*  2
$mosha = 12;

if ($mosha > 10 && $mosha < 16 ) {
	echo "Adoleshent";
}

	elseif ($mosha >= 16 && $mosha <= 18) {
		echo "I rritur";
	}

	else{
		echo "Më i vjetër";
	}
*/

	/*  3
$dita = 'E Hënë';
switch ($dita) {
	case 'E Hënë':
		echo "Sot është dita e Hënë";
		break;
			case 'E Marte':
		echo "Sot eshete dita e Marte";
		break;
	
	default:
	echo "Asjëra";
		break;
}
*/


	?>

</body>

</html>