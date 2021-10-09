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
<div class="container mt-5">
<form method="POST" action="profile_update.php">
  <div class="body_register">
<h1></h1>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Emri" name="emri" autofocus="" required="" >
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Mbiemri" name="mbiemri" required=""  >
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" required=""  >
  </div>
</div>
    <div class="row mt-2">
  <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password" required=""value="">
      <button type="sumbit" class="btn btn-primary" id="submit" name="submit">Update</button>
    </div>
  </div>
</form>
</div>
</div>
</div>