<?php
include("config.php");
include("server.php");
include('items/need_to_login.php');

$username = $_SESSION['username'];

$select = "SELECT * from users where username='$username'";
$results = mysqli_query($db, $select);
$row = $results->fetch_assoc();

?>
<!DOCTYPE html>
<html>

<head>
  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('items/title_bar_img.php'); ?>

  <title>Ndryshimi i Passwordit</title>
  <!-- ------------ Foto per title bar ------------------ -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/Killerlogo.jpg">

  <!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

  <!-- ------------ Links ------------------ -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
  <link rel="stylesheet" type="text/css" href="assets/css/loading.css">

  <!-- ------------ Boostrap css ------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

  <!-- ------------ Boostrap JS ------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  <?php include('items/navbar.php'); ?>
  <div class="container mt-5">

    <!-- ------------ style ------------------ -->
    <style type="text/css">
      #login .container #login-row #login-column #login-box {
        padding: 30px;
      }

      .error_s {
        background: #b3ffb3;
        color: #A94442;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        margin: 20px auto;
        text-align: center;
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
                  <?php
                  //Errori 
                  if (!empty($msg)) {
                    echo '<p class="error"> ' . $msg . ' </p>';
                  }
                  if (!empty($msg_sukses)) {
                    echo '<p class="error_s"> ' . $msg_sukses . ' </p>';
                  }
                  ?>
                  <label for="emri" class="text-info">Passowordi Momental</label><br>
                  <input type="password" name="password" class="form-control" id="passowordi_momental" autofocus="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani passowordin Momental');" oninput="this.setCustomValidity('');">
                </div>
                <div class="form-group">
                  <label for="mbiemri" class="text-info">Passwordi i ri</label><br>
                  <input type="password" name="new_password" class="form-control" id="passowordi_new" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani passwordin e ri');" oninput="this.setCustomValidity('');">
                </div>
                <div class="form-group">
                  <label for="email" class="text-info">Rishruaj passwordin e ri</label><br>
                  <input type="password" name="continiu_password" class="form-control" id="rishruaj_passowordi_new" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani rishruaj passwordin e ri');" oninput="this.setCustomValidity('');">
                </div>
                <button type="sumbit" class="btn btn-primary" id="btn_update" name="submit">Ndrysho</button>
                <br>
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="loader loader-default" data-text="Ju lutem prisni"></div>
    <script src="assets/js/function.js"></script>

</body>

</html>