<?php 
include('config.php');
if (isset($_POST['submit'])){
  $new_password = $_POST['new_password'];
  $continiu_password= $_POST['continiu_password'];
  $options = ['cost'=>11];
  $hashed = password_hash($password, PASSWORD_DEFAULT);
  if ($password!=$continiu_password) {
    $msg = "<div class='alert alert-success'> Password didnt match></div>";
  } else {
    $query = "UPDATE users SET password='$hashed' where email='$email' ";
    mysqli_query($db, $query);
     $msg = "<div class='alert alert-success'> Password didnt madadaaddtch></div>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>

<!-- ------------ Meta ------------------ -->
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <meta charset="utf-8">

<!-- ------------ boostrap ------------------ -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- ------------ Link ------------------ -->
<link rel="stylesheet" type="text/css" href="../Final_PHP/style/login.css">

</head>
<body>

<!-- ------------ Boostrap ------------------ -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- ------------ Forma per Login ------------------ -->
    <div id="login">
    <div class="container mt-5">
    <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
    <div id="login-box" class="col-md-12">
     <form action="token_reset_password.php" method="POST" id="login-form" class="form" >
       <h3 class=" text-center text-info" >Harruat Passwordin</h3>
         <div class="form-group">
          <label for="email" class="text-info fas fa-key">Shrunai emailin:</label><br>
         <input type="email" name="email" id="email" class="form-control" placeholder="Email">
           </div>
         <div class="form-group">        
    <input type="submit" id="submit" name="submit" class="btn btn-info btn-md" value="submit">
        </div><br>
 </form>
 </div>
 </div>
 </div>
 </div>
</div>
</body>
</html>
