<?php include('config.php'); 
session_start();
ob_start();

// Delete me id
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$delete = "DELETE from post where id='$id'"; 

	mysqli_query($db,$delete);
    header("Location:userpost.php");
}
?>