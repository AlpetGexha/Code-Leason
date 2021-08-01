
<?php


include('db.php');

$col = array("id", "emri", "mbiemri", "username","email","role","j_data");

$sql = "SELECT * FROM users";

if (isset($_POST["search"]["value"])) {
	$sql .= '
 WHERE
 emri LIKE "%' . $_POST["search"]["value"] . '%" 
 OR mbiemri LIKE "%' . $_POST["search"]["value"] . '%" 
 OR username LIKE "%' . $_POST["search"]["value"] . '%" 
 OR email LIKE "%' . $_POST["search"]["value"] . '%" 
 OR role LIKE "%' . $_POST["search"]["value"] . '%" 
 OR j_data LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}

if (isset($_POST["order"])) {
	$sql .= 'ORDER BY ' . $col[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
	$sql .= 'ORDER BY id DESC ';
}
$sql1 = '';

if ($_POST["length"] != -1) {
	$sql1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$stmt = $db->prepare($sql);
$stmt->execute();
$number_filter_row = $stmt->rowCount();

$stmt = $db->prepare($sql . $sql1);
$stmt->execute();
$result = $stmt->fetchAll();

$data = array();

foreach ($result as $row) {
	$row_array = array();
	$row_array[] = $row['id'];
	$row_array[] = $row['emri'];
	$row_array[] = $row['mbiemri'];
	$row_array[] = $row['username'];
	$row_array[] = $row['email'];
	$row_array[] = $row['role'];
	$row_array[] = $row['j_data'];
	$data[] = $row_array;
}

function count_all_data($db)
{
	$sql = "SELECT * FROM users";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	return $stmt->rowCount();
}

$output = array(
	'draw'   => intval($_POST['draw']),
	'recordsTotal' => count_all_data($db),
	'recordsFiltered' => $number_filter_row,
	'data'   => $data
);

echo json_encode($output);

?>