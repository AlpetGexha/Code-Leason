<?php include('config.php'); 
if(isset($_GET['id'])){ //veten oer url
	$id = $_GET['id'];
	$sql = "DELETE from users where id='$id'"; //delete me id
	mysqli_query($db,$sql);// lidhja
header("Location:index.php");
}
?>