<?php 
$password_wrong="";
$account = "";
?>
<?php include('config.php');
include('login_procesing.php');
//Pasi te kyqemi nuk kemi ne voj te rikyqemi perseri

if (isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn']==true) {
	header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-witdh,initi3l-scale=1.0"/>
   <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<div class="container-sm mt-5">
	<style type="text/css">
		.body_login{
			border: solid grey 1px;
			width: 500px;
			border-radius: 5px;
			background: lightblue;
		}
		#btn_login {
			padding: 5px;
		}
		.body_login{
			margin:auto;
		}
e
    .h1_login{
      text-align: center;
    }
	</style>

<form method="POST" action="#">

	<div class="body_login">
    <h1 class="h1_login">Kyquni</h1>
    <div class="row mt-2 col-6" style="margin: auto">
    	<?php
    	if (!empty($password_wrong)){

    	echo '<p class="error">
    	 '.$password_wrong.'
    	 </p>';
    	 
}

if (!empty($account)){

    	echo '<p class="error">
    	 '.$account.'
    	 </p>';
    	 
}
    	 ?>
    	
  <div class="col">
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required="">
  </div>
</div>
<div class="row mt-2 col-6" style="margin: auto">
  <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password" required="">
    </div>
  </div>
  <br>
  <div style="text-align: center;">
  <input class="btn btn-primary"  id="btn_login" type="submit" name="submit" value="Submit"><br>
  <a href="register.php"> Krijo një llogari </a>
</div>
</form>
</div>
</div>
</html>