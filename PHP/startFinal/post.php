<?php include('config.php');
session_start();
ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
  header("Location:login.php");
  die();
}
if (isset($_POST['submit'])){
	$emri_post = $_POST['emri_post'];
	$body = $_POST['body'];
$username = $_SESSION['username'];

$sql = "SELECT id from users where username='$username'";
$results = mysqli_query($db, $sql);
$row = $results->fetch_assoc();
$user_id = $row['id'];

	$insert = "INSERT into post (emri_post,body,user_id)VALUES('$emri_post','$body','$user_id')";
     mysqli_query($db,$insert);
header("Location:userpost.php");
}
