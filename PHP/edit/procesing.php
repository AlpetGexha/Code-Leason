<?php include('config.php');
if (isset($_POST['submit'])){
$emri = $_POST['emri'];
$comment = $_POST['comment'];
$posti = $_POST['emri_post'];

$sql = "INSERT into post (emri,body,emri_post)VALUES('$emri','$comment','$posti')";
mysqli_query($db,$sql);
header("Location:index.php");
}
?>