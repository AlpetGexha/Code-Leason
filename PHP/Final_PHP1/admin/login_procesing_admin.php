<?php include('../config.php');
//Session
session_start();
ob_start();

//POST
if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * from user_admin where username = '$username'";
	$results = mysqli_query($db,$sql);
	$row = $results->fetch_assoc();

	if (mysqli_num_rows($results)!=1){ //Nese perdoruesi nuk ekziton
		$user_error = "Ky ADMIN nuk ekziton";	//errori per username
	}
	else if (password_verify($password, $row['password'])) {//Nese passwordi edhe gabim	dhe passwordi per encyptim
		$_SESSION['username'] = $username;//Username
		$_SESSION['loggedIn'] = true;//Nese passwordi edhe ne rregull
		header('Location:email_admin.php');//Shko në faqe kryesore
	}
	else{
		$password_error = "Fjalekalimi eshte gabim";//errori per Password
		
	}
}

?>
