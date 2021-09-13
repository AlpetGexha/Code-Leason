<?php include('../config.php'); 
if(isset($_GET['id'])){ //veten oer url
	$id = $_GET['id'];
	$sql = "DELETE from post where id='$id'"; //delete me id
	mysqli_query($db,$sql);// lidhja
header("Location:post_admin.php");
}
?>