<?php include('config.php');
/* if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
  //Mos u submit nese bohet refresh faqja
}*/
session_start();
ob_start();//mban mend login basi keni bere back
if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * from users where username = '$username'";
	$results = mysqli_query($db,$sql);
	$row = $results->fetch_assoc();
	if (mysqli_num_rows($results)!=1){
		$account = "Ky perdorues nuk ekziston";	
	}
	else if (password_verify($password, $row['password'])) {
		$_SESSION['username'] = $username;
		$_SESSION['loggedIn'] = true;
		header('Location:index.php');
	}
	else{
		$password_wrong = "Fjalekalimi eshte gabim";
		
	}
}

?>