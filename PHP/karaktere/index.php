<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-witdh,initial-scale=1.0" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>

<body>

	<?php

	/* 1 */
	$x = 10;
	$y = 3;
	$c = $x + $y; // "+" "-" "*" "/" "%(mbetja)" vetem per numra

	echo $x * $y;
	echo "<br>";

	echo $x - $y;
	echo "<br>";

	echo $x / $y;
	echo "<br>";

	echo $x * $y;
	echo "<br>";

	echo $x % $y;  // echo - thirre 
	echo "<br>";
	echo $c;
	echo "<br>";
	echo "<br>";

	/*2*/
	$emri = 'Alpet';
	$mbiemri = 'Gexha';
	$un = 'Unë quhem';
	$em = $emri . " " . $mbiemri; // "." gjite - hepesira

	echo $emri;
	echo $mbiemri;
	echo "<br>";

	echo $un . " " . $em;
	echo "<br>";

	/*3*/
	$strlen = 'AlpetGexha';
	echo strlen($strlen); // sa shronja(Karaktere-Column)
	echo "<br>";

	/*4*/
	$stlWC = 'Unë Quhem Alpet Gexha vi nga Gjakova';
	echo str_word_count($stlWC); //sa fjal ka në nje fjali
	echo "<br>";

	/*5*/
	$ac = 'Unë Quhem Alpet Gexha vi nga Gjakova';
	echo str_replace('Alpet Gexha', 'AG', $ac); // (search-Kerko)  (replace-zëvendëso) (subject-me kë)
	echo "<br>";

	/*6*/
	$Q = 'Unë Quhem Alpet Gexha Unë Quhem Alpet Gexha ';
	echo strrev($Q); // Qrregullim i vendit
	?>

</body>

</html>