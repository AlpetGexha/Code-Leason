<?php 
include('../config.php');
if (isset($_POST['submit'])){
  $new_password = $_POST['new_password'];
  $continiu_password= $_POST['continiu_password'];
  $options = ['cost'=>11];
  $hashed = password_hash($new_password, PASSWORD_DEFAULT);
  if ($new_password!=$continiu_password) {
    $msg = "<div class='alert alert-success'> Password didnt match></div>";
  } else {
    $query = "UPDATE users SET password='$hashed' where email='$email' ";
    mysqli_query($db, $query);
     $msg = "<div class='alert alert-success'> Password didnt madadaaddtch></div>";
  }
}
?>