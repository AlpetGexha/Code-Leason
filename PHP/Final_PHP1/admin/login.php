<?php 
$password_error="";
$user_error="";
?>
<?php 
include('../config.php');
include('login_procesing_admin.php');
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login_admin.css">
    <title>Login Page</title>

</head>

<body>
<!-- ------------ Forma per Login ------------------ -->
  <div class="container mt-5">
    <form action="#" method="post">
      <div class="foto_back">
        <div class="login-box">
        <h1>ADMIN</h1>
            <div class="textbox">
        <?php
        //Errori nese usernamei nuk egziston
       if (!empty($user_error)){
        echo '<p class="error"> '.$user_error.' </p>';    
        }
        //Errori nese passwordi edhe gabim
       if (!empty($password_error)){
        echo '<p class="error"> '.$password_error.'</p>';
        }
         ?>
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="ADMIN username" name="username" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="">
            </div>
            <input class="button" type="submit" name="submit" value="submit">
        </div>
        </div>
    </form>
  </div>
</body>
</html>