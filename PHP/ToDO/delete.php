<?php include('config.php'); 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$delete = "DELETE from todo where id='$id'";

    mysqli_query($db,$delete);
    header("Location:index.php");
}  