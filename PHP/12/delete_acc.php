<?php include('config.php'); 
session_start();
ob_start();
if(isset($_POST['submit'])){
   // $id = $_POST['id'];
	$username = $_SESSION['username'];


	$select = "SELECT * from users where username='$username'";
	$results = mysqli_query($db,$select);
	$row = $results->fetch_assoc(); 
    $id= $row['id'];

	$delete_post = "DELETE from post where user_id='$id' ";
	mysqli_query($db,$delete_post);
     
    $delete_acc = "DELETE from users where id='$id'";
    mysqli_query($db,$delete_acc);
    header("Location:logout.php");

}
?>