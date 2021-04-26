<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<table>
		<tr>
			<th>Emir</th>
			<th>Dispozicion</th>
			<th>Shitur</th>
		</tr>
		<?php
		$vargu = array(
			array("BWM", 4, 5),
			array("Audi", 5, 3),
			array("Ferrari", 1, 0)
		);

		for ($i = 0; $i < count($vargu); $i++) {
			echo "<tr>";
			for ($j = 0; $j < 3; $j++) {
				echo "<th>" . $vargu[$i][$j] . "</th>";
			}
			echo "</tr>";
		}
		?>
		</tr>
	</table>

	<?php
	$a = [1, 2, 4, 5, 6, 7];
	for ($i = 0; $i < 6; $i++) {
		echo $a[$i];
		echo "<br>";
	}

	$b = ["a", "b", "c", "d"];
	echo $b[2];
	echo "<br>";
	foreach ($b as $x) {
		echo $x;
		echo "<br>";
	}
	$c = ["Gjakova" => "07", "Prishtina" => "01"];
	foreach ($c as $x => $value) {
		echo "$x = $value";
		echo "<br>";
	}

	// for in for
	for ($i = 0; $i < 6; $i++) {
		echo "rendi $i";
		echo "<br><br>";
		for ($j = 0; $j < 6; $j++) {
			echo $j;
		}
		echo "<br>";
	}
	$vargu = array(
		array("BWM", 4, 5),
		array("Audi", 5, 3),
		array("ferrari", 1, 0)
	);


	?>

</body>

</html>