<?php include('config.php');
if(isset($_POST['update'])){
$id = $_POST['id'];
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
echo $id;
$sql = "UPDATE users set emri='$emri',mbiemri='$mbiemri',username='$username',email='$email',password='$password' where id='$id'";
mysqli_query($db,$sql);
header("Location:index.php");
}
?>
