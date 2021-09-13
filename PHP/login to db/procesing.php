<?php include('config.php');?>
<?php
if (isset($_POST['submit'])){
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mosha = $_POST['mosha'];	
$gjinia = $_POST['gjinia'];
}
echo $emri . " " . $mbiemri. " " . $username . " ". $email . " " . $password. " " . $mosha. " ". $gjinia;
$sql = "INSERT into users (emri,mbiemri,username,email,password,mosha,gjinia)VALUES('$emri','$mbiemri','$username','$email','$password','$mosha','$gjinia')";
 mysqli_query($db,$sql);
?>