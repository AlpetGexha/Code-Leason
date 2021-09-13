<?php include('config.php');
if(isset($_POST['update'])){
$id = $_POST['id'];
$gjerat = $_POST['gjerat'];

$update = "UPDATE todo set gjerat='$gjerat' where id='$id'";
mysqli_query($db,$update);
header("Location:index.php");
}
?>	