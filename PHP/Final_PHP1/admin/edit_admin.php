<?php include("../config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
include('../items/need_to_login.php');
//Selectimi post "ID"
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$select = "SELECT * from post where id='$id'";
	$results = mysqli_query($db,$select);
	$row = $results->fetch_assoc(); 
  $row = ['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<title>Ndryshimi i Postimit</title>

  <!-- ------------ Foto per title bar ------------------ -->
 <?php include('../items/title_bar_img.php'); ?>
 
<body>
<!-- ------------ Foto per title bar ------------------ -->
 <link rel="shortcut icon" type="image/x-icon" href="../img/Killerlogo.jpg">
 
<!-- ------------ Boostrap ------------------ -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<!-- ------------ Link ------------------ -->
<link rel="stylesheet" type="text/css" href="../Final_PHP/style/style.css">

<!-- ------------ Forma për ndryshim e postmit ------------------ -->
<form action="update_admin.php" method="POST">
  <div class="container mt-5">
<div class="row">
    <div class="col">
      <h6>Titulli</h6>
      <input type="text" class="form-control" name="emri_post" autofocus="" value="<?php echo $row['emri_post'];?>">
    </div>
</div>
      <h6>Teksti</h6>
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="body"><?php echo $row['body'];?></textarea>
      <button type="submit" class="btn btn-primary" id="submit" name="update">Ndrysho</button>

    </div>
</div>  
</form>
</body>
</html>
