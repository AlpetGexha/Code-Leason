<?php include('config.php');
session_start();
ob_start();
if (isset($_POST['submit'])){
	$username = $_SESSION['username'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
   $password1=password_hash($password,PASSWORD_DEFAULT);

	$update = "UPDATE users set emri='$emri',mbiemri='$mbiemri', email='$email',password='$password1' where username='$username'";

	mysqli_query($db,$update);
    header("Location:profile.php");

 }
