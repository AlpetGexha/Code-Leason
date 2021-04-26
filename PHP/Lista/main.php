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
			<th>KM/h</th>
			<th>Çmimi</th>
		</tr>
		<?php
		$vargu = array(
			array("BWM", 4, 5, 140, "3 000€"),
			array("Audi", 5, 3, 150, "2 000€"),
			array("Mercedes", 2, 4, 120, "4 000€"),
			array("Ferrari", 1, 0, 300, "400 000€")
		);


		for ($i = 0; $i < count($vargu); $i++) {
			echo "<tr>";
			for ($j = 0; $j < 5; $j++) {
				echo "<th>" . $vargu[$i][$j] . "</th>";
			}
			echo "</tr>";
		}
		?>
		</tr>
	</table>

</body>

</html>



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
			<th>KM/h</th>
			<th>Çmimi</th>
			<th>Komenti</th>
		</tr> <br>
		<?php
		$vargu = array(
			array("BWM", 4, 5, 140, "3 000€", "Mirë"),
			array("Audi", 5, 3, 245, "2 000€"),
			array("Mercedes", 2, 4, 120, "4 000€", "Nuk me pëlqen"),
			array("Ferrari", 1, 0, 300, "400 000€")
		);

		foreach ($vargu as $x) {
			echo "<tr>";
			foreach ($x as $y) {
				echo "<th>" . $y . " " . "</th>";
			}
			echo "</tr>";
		}

		?>
	</table>
</body>

</html>