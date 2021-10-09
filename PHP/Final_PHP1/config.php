<?php 
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'alpetgexhaag';
 $db = mysqli_connect($servername,$username,$password,$database);
 //php include('config.php');
if (!$db) {
    die('Nuk mund te lidhet me database');
}
?>