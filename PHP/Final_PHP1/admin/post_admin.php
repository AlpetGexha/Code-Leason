<?php 
include("../config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
//Nese nuk je i kyqur nuk mund te hysh ne kete faqe
include('../items/need_to_login.php');
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Main</title>
  <!-- ------------ LINKS ------------------ -->
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  
<!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

<!-- ------------ Boostrap css ------------------ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
	<?php include('../items/admin_navbar.php'); ?>
<!-- ------------ Boostrap JS ------------------ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://kit.fontawesome.com/a076d05399.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>



<br>
<!-- ------------ Search ------------------ -->
<div class="container">
<form class="form-inline my-2 my-lg-3 col-5" action="#" method="get">
      <input id="ez" class="form-control mr-sm-2 fas" type="search" placeholder="Search" aria-label="Search" name="search"  autofocus="">
      <button id="btn_search" class="btn btn-outline-primary mt-2 my-2 my-sm-0" type="submit"  >Search</button>
    </form>
</div>
<div class="container mt-5">

<?php
  if (isset($_GET['search'])){
  $search= $_GET['search'];
  $sql = "SELECT u.emri, u.mbiemri, p.emri_post, p.body , p.image from post p, users u where p.user_id = u.id and emri_post LIKE '%$search%' order by p.id DESC"; // "% $serach %" perafersish fjala qe e shenon per te kerkuar nje postim
  $result = mysqli_query($db, $sql);
    
while (($row = $result -> fetch_assoc())!=null) {
  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo "<div class='post_foto'>";
  echo "<img src='../images/".$row['image']."' >";
  echo "</div>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
  echo "<div class='post_delete'>";
  echo "<td><a href='edit_admin.php? 'class='btn btn-success'>Ndrysho</a><a href='delete_admin.php?'class='btn btn-danger'>Fshije</a> </td>";// Edit/Updates
  echo "</div>";
  echo "</div>";
  echo "<br>";
} 
//Erroi nese nuk ka poste
if (mysqli_num_rows($result)==0) {
      echo "<p style = 'text-align:center;  color:red;  font-size:20px;' >Nuk ka postime me k&euml;t&euml; em&euml;r </p>";
}
}
/* ------------ Forma per shfaqejn e postime nga databasa ------------------ */
else{
  $select = "SELECT u.emri, u.mbiemri, p.emri_post, p.body , p.image  from post p, users u where p.user_id = u.id order by p.id DESC ";//DESC nga më e reja deri te ajo me e vjetra
$result = mysqli_query($db,$select);

while (($row = $result -> fetch_assoc())!=null) {
  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo "<div class='post_foto'>";
  echo "<img src='../images/".$row['image']."' >";
  echo "</div>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
    echo "<div class='post_delete'>";
  echo "<td><a href='edit_admin.php? 'class='btn btn-success'>Ndrysho</a><a href='delete_admin.php?'class='btn btn-danger'>Fshije</a> </td>";// Edit/Updates
  echo "</div>";
  echo "</div>";
  echo "<br>";

}
}

?>
 <script type="text/javascript">
           $("image").error(function(){
    $(this).parent().hide();
});
 </script>
</div>
</body>
</html>