<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'AlpetgexhaAG';
 $db = mysqli_connect($servername,$username,$password,$database);
 //php include('config.php');
if (!$db) {die('Nuk mund te lidhet me database');}?>

</body>
</html>