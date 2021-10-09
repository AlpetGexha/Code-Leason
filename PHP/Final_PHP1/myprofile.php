<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
include('items/need_to_login.php');
//Sessioni per usernames
$username = $_SESSION['username'];

$select = "SELECT * from users where username='$username'";
$results = mysqli_query($db, $select);
$row = $results->fetch_assoc();
?>
<html>

<head>
  <title>Profili Im</title>

  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('items/title_bar_img.php'); ?>

  <!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

  <!-- ------------ Links ------------------ -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/register.css">

  <!-- ------------ Boostrap css ------------------ -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>
  <style type="text/css">
    .bg-dark {
      background-color: #212529 !important;
    }
  </style>
  <!-- ------------ Boostrap JS ------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

  <style type="text/css">
    #login .container #login-row #login-column #login-box {
      padding: 25px !important;
    }
  </style>
  <?php include('items/navbar.php'); ?>
  <!-- ------------ Banner ------------------ -->
  <div class="banner">
    <h1>
      <?php echo $row['emri'] . " " . $row['mbiemri']; ?>
    </h1>
    <img src="assets/image/banner.jpg"><br>
  </div>
  <!-- ------------ Forma e Profilit ------------------ -->
  <div id="login">
    <div class="container mt-5">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form action="" method="">
              <div class="form-group">
                <div class="profile_img">
                  <?php
                  echo "<a target='_blank' href='assets/profile_image/" . $row['image'] . "'>";
                  echo "<img src='assets/profile_image/" . $row['image'] . "' alt='Profile Pic'>";
                  echo "</a>";
                  echo "<br>";
                  ?>
                </div>
                <label for="emri" class="text-info">Emri:</label><br>
                <input type="text" name="emri" id="emri" class="form-control" value="<?php echo $row['emri']; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="mbiemri" class="text-info">Mbiemri:</label><br>
                <input type="text" name="mbiemri" id="mbiemri" class="form-control" value="<?php echo $row['mbiemri']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="username" class="text-info">Username:</label><br>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="email" class="text-info">Email:</label><br>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
              </div>
              <a href="myprofile_edit.php">Ndrysho profilin</a>

          </div>
          </form>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
</body>

</html>