<?php 
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'AlpetgexhaAG';
 $db = mysqli_connect($servername,$username,$password,$database);
 //php include('config.php');
if (!$db) {die('Nuk mund te lidhet me database');}

$sql = "DELETE from users where id=1";//delete me id 
mysqli_query($db,$sql);
?>