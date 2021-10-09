<?php 
session_start();
ob_start();
include('../config.php');
include('../items/need_to_login.php');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Email</title>
</head>
<body>
<?php include('../items/admin_navbar.php');?>
<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>  
      <th scope="col">Foto e Profilit</th>
      <th scope="col">Emri</th>
      <th scope="col">Mbiemri</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Mosha</th>
      <th scope="col">Gjinia <br> 0=M,1=F <br>
      </th>
    </tr>
    <tbody>

      <?php 
$sql = "SELECT * from users "; 
$results = mysqli_query($db,$sql);

while (($row = $results-> fetch_assoc())!=null) {

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>"."<img width='85' height='85' src='../image_profile/".$row['image']."' alt='Profile Pic'>"."</td>";
echo "<td>".$row['emri']."</td>";
echo "<td>".$row['mbiemri']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['mosha']."</td>";
echo "<td>".$row['gjinia']."</td>";
echo "</tr>";
}
?>
</div>
</body>
</html>