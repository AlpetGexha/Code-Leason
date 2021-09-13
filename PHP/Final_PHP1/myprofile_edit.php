<?php include("config.php");

// ne fillim kyqu para se te hysh ne index

session_start();

ob_start();

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


  <title>Ndryshimi i Profilit</title>
  <!-- ------------ Foto per title bar ------------------ -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/image/Killerlogo.jpg">

  <!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

  <!-- ------------ Links ------------------ -->
  <link rel="stylesheet" type="text/css" href="assets/css/loading.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">


  <!-- ------------ Boostrap css ------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

  <!-- ------------ Boostrap JS ------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
  </script>

  <?php include('items/navbar.php'); ?>
  <div class="container mt-5">

    <!-- ------------ style ------------------ -->
    <style type="text/css">
      #login .container #login-row #login-column #login-box {

        padding: 30px !important;

      }
    </style>

    <!-- ------------ Profili ------------------ -->

    <form method="POST" action="server.php">
      <div id="login">
        <div class="container mt-5">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">
                <div class="form-group">

                  <!-- -------------- FOTO  e Profili-------------------->
                  <h4 class="text-info" style="text-align: center;">Foto e profilit</h4><br>
                  <div class="profile_img">
                    <?php

                    $sql = mysqli_query($db, "SELECT * FROM users where username = '$username'");
                    while ($row = mysqli_fetch_assoc($sql)) {

                      echo "<a target='_blank' href='assets/profile_image/" . $row['image'] . "'>";
                      echo "<img width='286' height='286' src='assets/profile_image/" . $row['image'] . "' alt='Profile Pic'>";
                      echo "</a>";
                      echo "<br>";
                    }

                    ?>
                  </div>

                  <!-- --------------Te dhenat e userit -------------------->
                  <?php
                  $sql = mysqli_query($db, "SELECT * FROM users where username = '$username'");
                  $row = $sql->fetch_assoc();
                  ?>

                </div>

                <a class="photo_herf" href="myprofile_photo_edit.php">Ndrysho foton e Profilit</a>
                <div class="form-group">
                  <label for="emri" class="text-info">Emri:</label><br>
                  <input type="text" name="emri" id="emri" class="form-control" required="" autofocus="" placeholder="<?php echo $row['emri']; ?>" value="<?php echo $row['emri']; ?>" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');">
                </div>

                <div class="form-group">
                  <label for="mbiemri" class="text-info">Mbiemri:</label><br>
                  <input type="text" name="mbiemri" id="mbiemri" class="form-control" required="" placeholder="<?php echo $row['mbiemri']; ?>" value="<?php echo $row['mbiemri']; ?>" oninvalid="this.setCustomValidity('Ju lutem shkruani mbiemrin');" oninput="this.setCustomValidity('');">
                </div>


                <div class="form-group">
                  <label for="email" class="text-info">Email:</label><br>
                  <input type="email" name="email" id="email" class="form-control" required="" placeholder="<?php echo $row['email']; ?>" value="<?php echo $row['email']; ?>" oninvalid="this.setCustomValidity('Ju lutem shkruani emailin');" oninput="this.setCustomValidity('');">
                </div>

                <button type="sumbit" class="btn btn-primary" id="btn_update" name="profil_update">Ndrysho</button>
                <a class="change_password_link" href="password_edit.php"> Ndrysho Passwordin </a>
                <br>
              </div>

              <br>
              <br>
              <br>
            </div>
          </div>
        </div>

      </div>
    </form>
</body>

</html>

<div class="loader loader-default" data-text="Duke u ndryshuar"></div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#btn_update').click(function() {
      if (($('#emri').val().length !== 0) && ($('#mbiemri').val().length !== 0) && ($('#email').val().length !==
          0)) {
        $(".loader").addClass("is-active");
      }
    });
  });
</script>
</body>

</html>