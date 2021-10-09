<?php include('config.php');
if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mosha = $_POST['mosha'];
	$gjinia = $_POST['gjinia'];
	
   $password=password_hash($password,PASSWORD_DEFAULT);

	$insert = "INSERT into users(emri,mbiemri,username,password,email,mosha,gjinia)VALUES('$emri','$mbiemri','$username','$password','$email','$mosha','$gjinia')";

 mysqli_query($db, $insert);
 header("Location:login.php");
 }
