<?php
$msg = "";
include("config.php");
include("server.php");
include('items/need_to_login.php');

?>
<!DOCTYPE html>
<html>

<head>
  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('items/title_bar_img.php'); ?>
  <title>Krijimi i posteve</title>

  <!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

  <!-- ------------ Link ------------------ -->
  <link rel="stylesheet" type="text/css" href="assets/css/loading.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/create_post.css">

  <!-- ------------ Boostrap CSS------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- ------------ Font-Style ------------------ -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<body>
  <style type="text/css">
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
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

  </style>
  <!-- ------------ Jquery JS ------------------ -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <!-- ------------ Boostrap JS------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <?php include('items/navbar.php'); ?>
  <!-- ------------ Forma për krijimin e postit ------------------ -->
  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="container mt-5">
      <div class="center_create_post">
        <?php
        if (!empty($msg)) {
          echo '<p style="color: red; text-align: center;" > ' . $msg . '</p>';
        }
        ?>
        <h2>Krijo nj&euml; postim</h2>
        <input id="emri_post" type="text" class="inputat_create_post" placeholder="Emri i Postimit" required="" name="emri_post" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">
        <textarea placeholder="Shruani Çfar&euml; t&euml; doni n&euml; lidhje me postimin..." class="inputat_create_post" required="" name="body" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>
        <!-- ----------Upload --------- -->
        <div class="Upload">
          <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjithni n&euml; Foto');" oninput="this.setCustomValidity('');">
        </div> 
        <input id="btn_create_post" class="btn_create_post" type="submit" name="create_post_submit" value="Posto">
      </div>
    </div>
  </form>

  <!-- ----------LOADING (Duke u pustuar)---------- -->
  <div class="loader loader-default" data-text="Duke u postuar"></div>
  <script>
    $(document).ready(function() {
      $('#btn').click(function() {
        if (($('#emri_post').val().length !== 0) && ($('#body').val().length !== 0) && ($('#upload').val().length !== 0)) {
          $(".loader").addClass("is-active");
        }
      });
    });
  </script>
</body>

</html>