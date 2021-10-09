<?php include('config.php');
if (isset($_POST['submit'])){
$id = $_POST['id'];
$gjerat = $_POST['gjerat'];

$insert = "INSERT into todo (id,gjerat)VALUES('$id','$gjerat')";
mysqli_query($db,$insert);
header("Location:index.php");  
}
?> 