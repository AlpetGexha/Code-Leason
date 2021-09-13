<?php 
include('../config.php');

if (isset($_GET['email']) && isset($_GET['token'])) {
  $email = real_escape_string($db,$_GET['email']);
  $token = real_escape_string($db,$_GET['token']);

  $sql = "SELECT id FROM users WHERE 
  email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()";
  $run = mysqli_query($db, $sql);
  if (mysqli_num_row($sql)>0) {
    $row = mysqli_fetch_array($run);
    $token = $row['token'];
    $email = $row['email'];
  } else {
    header("location:login.php");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <!-- ------------ Foto per title bar ------------------ -->
 
	<title>Ndryshimi i Profilit</title>
    <!-- ------------ Foto per title bar ------------------ -->
<link rel="shortcut icon" type="image/x-icon" href="assets/css/Killerlogo.jpg">
  
  <!-- ------------ Meta ------------------ -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta charset="utf-8">

  <!-- ------------ Links ------------------ -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/style/login.css">

  <!-- ------------ Boostrap css ------------------ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">

<!-- ------------ style ------------------ -->
<style type="text/css">
#login .container #login-row #login-column #login-box {
  padding: 30px;
} 


</style>

<!-- ------------ Profili ------------------ -->
<form method="POST" action="#">
<div id="login">
<div class="container mt-5">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">

   <div class="form-group">
     <label for="mbiemri" class="text-info">Passwordi i ri</label><br>
       <input type="password" name="new_password"  class="form-control" required=""> 
         </div>
        <div class="form-group">
            <label for="email" class="text-info">Rishruaj passwordin e ri</label><br>
       <input type="password" name="continiu_password"  class="form-control" required="">
    </div>
      <button type="sumbit" class="btn btn-primary" id="btn_update" name="submit">Ndrysho</button>
     <br>
   </div>
<?php 
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
</div>
</div>
</div>
</div>
</form>