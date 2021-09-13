<?php 
session_start();
ob_start();
include('../config.php');
include('../items/need_to_login.php'); 
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Contact</title>
</head>
<body>
<?php include('../items/admin_navbar.php');?>
<div class="container mt-5"> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Foto</th>
      <th scope="col">Emri</th>
      <th scope="col">Mbiemri</th>
      <th scope="col">Meshazhi</th>
    </tr>
    <tbody>

      <?php 
$sql = "SELECT u.id, u.image, u.emri, u.mbiemri, m.mesazhi from mesazhi m, users u ";
$result   = mysqli_query($db,$sql);

//shfaqja e te gjithave postimeve qe i keni bere ju
while (($row = $result -> fetch_assoc())!=null) {

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>";
echo "<img width='50' height='50' src='../image_profile/".$row['image']."' alt='Profile Pic'>";
echo "</td>";
echo "<td>".$row['emri']."</td>";
echo "<td>".$row['mbiemri']."</td>";
echo "<td>";
echo '<textarea readonly=""  class="inputat" required=""  name="body" rows="3" cols="30" id="body">'.$row['mesazhi']."</textarea>";
echo "</td>";
}
?>   
</div>
</body>
</html>