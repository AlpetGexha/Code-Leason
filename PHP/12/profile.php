<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
	header("Location:login.php");
	die();
}

	$username = $_SESSION['username'];

	$select = "SELECT * from users where username='$username'";
	$results = mysqli_query($db,$select);
	$row = $results->fetch_assoc(); 

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

<div class="container mt-5">
<form method="" action="">
  <div class="body_register">
<h1></h1>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Emri" name="emri" value="<?php echo $row['emri'];?>" readonly >
    </div>
    <div class="col" >
      <input type="text" class="form-control" placeholder="Mbiemri" name="mbiemri" value="<?php echo $row['mbiemri'];?>" readonly >
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
      <input type="text" class="form-control" placeholder="Username" name="username"  value="<?php echo $row['username'];?>" readonly >
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" value="<?php echo $row['email'];?>" readonly >
  </div>
</div>
    <div class="row mt-2">
  </div>

  <a href="profile_edit.php">Ndrysho profilin</a>
   
</form>
</div>
</div>
</div>