<?php
$msg = "";
include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
//Nese nuk je i kyqur nuk mund te hysh ne kete faqe
include('items/need_to_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('items/title_bar_img.php'); ?>
  <title>Kontakti</title>
  <!-- ------------ META ------------------ -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ------------ Link  ------------------ -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/loading.css">

  <!-- ------------ style font  ------------------ -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

  <!-- ------------ boostrap ------------------ -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- ------------  ------------------ -->
</head>

<body>
  <style type="text/css">
    * {
  
    font-family: 'Quicksand', sans-serif;
}
.container {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 100px;
}

.container:after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: -1;
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
  <?php include('items/navbar.php'); ?>
  <!-- ------------ Forma Contact ------------------ -->
  <form method="POST" action="server.php">

    <div class="container mt-5">
      <div class="contact_box_mesazhi">
        <div class="left_mesazhi"></div>
        <div class="right_mesazhi">
          <?php
          if (!empty($msg)) {
            echo '<p class="error_s"> ' . $msg . ' </p>';
          }
          ?>
          <h2>Na Kontaktoni</h2>
          <p style="color: red;">Shkruani mesazhin tuaj, akesat, sugjerime apo &ccedil;far&euml; do q&euml; tjet&euml;r. 100% Anonim </p>
          <!--
        <input type="text" class="inputat" placeholder="Emri" required="" name="emri" >
        <input type="email" class="inputat" placeholder="Email" required="" name="email" >
        <input type="text" class="inputat" placeholder="Numri i telefonit" name="telefoni">
      -->
          <textarea placeholder="Mesazhi..." class="inputat_mesazhi" id="mesazhi" required="" name="mesazhi" rows="10" cols="60" oninvalid="this.setCustomValidity('Ju lutem shkruani mesazhi');" oninput="this.setCustomValidity('');"></textarea>
          <input id="btn_mesazhi" class="btn_mesazhi" type="submit" name="contact_submit" value="Send">
        </div>
      </div>
    </div>
  </form>

  <div class="loader loader-default" data-text="Mesazhi duke u derguar"></div>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="assets/js/function.js"> </script>

</body>

</html>