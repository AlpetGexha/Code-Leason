<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
	header("Location:login.php");
	die();
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	 <meta name="viewport" content="width=device-witdh,initi3l-scale=1.0"/>
   <link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<?php include ('navbar.php');?>
<style type="text/css">

  #btn_search{
    margin: 10px 0px 0px !important;
  }

</style>  
<div class="container mt-5">
  s
    <form class="form-inline my-2 my-lg-3 col-5" action="#" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search"  autofocus="">
      <button id="btn_search" class="btn btn-outline-primary mt-2 my-2 my-sm-0" type="submit"  >Search</button>
    </form>


<?php
  if (isset($_GET['search'])){
  $search= $_GET['search'];
  $sql = "SELECT u.emri, u.mbiemri, p.emri_post, p.body from post p, users u where p.user_id = u.id and emri_post LIKE '%$search%' order by p.id DESC";
  $result = mysqli_query($db, $sql);
  
while (($row = $result -> fetch_assoc())!=null) {
  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
  echo "</div>";
  echo "<br>";

 
} 
if (mysqli_num_rows($result)==0) {
      echo "<p style = 'text-align:center;  color:red;  font-size:20px;' >Nuk ka postime me k&euml;t&euml; em&euml;r </p>";
}
}
else{
  $select = "SELECT u.emri, u.mbiemri, p.emri_post, p.body from post p, users u where p.user_id = u.id order by p.id DESC ";
$result = mysqli_query($db,$select);

while (($row = $result -> fetch_assoc())!=null) {
  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
  echo "</div>";
  echo "<br>";
}
}

?>
 
</div>
</body>
</html>