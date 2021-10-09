<?php include('config.php'); 
session_start();
ob_start();
//if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
 // header("Location:login.php");
 // die();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$delete = "DELETE from post where id='$id'"; 

	mysqli_query($db,$delete);
    header("Location:userpost.php");
}
?>