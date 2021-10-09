<?php include("config.php");
//session
session_start();
ob_start();

include('items/need_to_login.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Postimet e Userit</title>

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/loading.css">

  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('items/title_bar_img.php'); ?>

  <!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">
  <!-- ------------ Boostrap css ------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

  <!-- ------------ Boostrap JS ------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

  <!-- ------------ Style ------------------ -->
  <style type="text/css">
    .jumbotron {
      position: relative;
      border: 2px black solid;
      background-color: #e9ecef;
      padding: 40px;
    }

    .delete {
      position: absolute;
      top: 25px;
      right: 20px;
    }

    /*
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
  */

    /* Add Animation 
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

  
  </style>

  <?php include('items/navbar.php'); ?>
  <div class="container mt-5">
    <form class="form-inline" method="get" action="#" style="margin:10px;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
      <button id="btn_search" class="btn btn-outline-primary" type="submit">Search</button>
    </form>
    <?php
    //Selektoj të thënat nga user dhe post per te marr user id dhe post id per te krijuar mundesin qe vetem ti mund ti fshish/ndryshosh postimet e tua qe i keni krijuar
    //from post p = "shkurtesa e post"
    $username = $_SESSION['username'];
    $select = "SELECT u.emri, u.mbiemri, p.emri_post, u.username, p.body, p.image, p.post_time,  p.id from post p, users u where p.user_id = u.id and u.username = '$username' order by p.id DESC ";
    $result   = mysqli_query($db, $select);

    //shfaqja e te gjithave postimeve qe i keni bere ju
    while (($row = $result->fetch_assoc()) != null) {

      echo "<div class='jumbotron'>";
      echo "<h1 class='display-4'>" . $row['emri_post'] . "</h1>";
      echo "<div class='post_foto'>";
      echo "<a target='_blank' href='assets/post_images/" . $row['image'] . "'>";
      echo "<img src='assets/post_images/" . $row['image'] . "' >";
      echo "</a>";
      echo "</div>";
      echo "<div class='delete'>";
      echo "<td><a href='edit.php? id=" . $row['id'] . "'class='btn btn-success'>Ndrysho</a>

<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#post_" . $row['id'] . "'>
 Fshije
</button></td>"; // Edit/Updates

      echo "</div>";
      echo " <p class='lead'>" . $row['body'] . "</p>";
      echo "<hr class='my-4'>";
      echo "<p>Postuesi: " . $row['emri'] . " " . $row['mbiemri'] . "</p>";
      echo "<div class= 'post_time'";
      echo " <p class='lead'>" . $row['post_time'] . "</p>";
      echo "</div>";
      echo "</div>";

      echo '

<!-- Modal -->
<div class="modal fade" id="post_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Fshije Postimin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        A jeni i sigurt q&euml; d&euml;shironi ta fshini k&euml;t&euml; postim
      </div>
      <div class="modal-footer">
      <td> <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
        <a href="delete.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> </td>
      </div>
    </div>
  </div>
</div>';
    }

    if (mysqli_num_rows($result) == 0) {
      echo "<p style='text-align:center; color:red; font-size:20px'> Nuk ka rezultate";
    }
    ?>

    <div class="loader loader-default" data-text="Duke u Fshir"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="assets/js/function.js"> </script>
</body>

</html>