<?php include('config.php');

session_start();
ob_start(); 
if (isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn']==true) {
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-witdh,initi3l-scale=1.0"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Regjister</title>
</head>
<body>
<style type="text/css">
    .body_register{
      padding: 20px;
      border: solid grey 1px;
      width: 800px;
      border-radius: 5px;
      background: lightblue;
    }
    #btn_register {
      padding: 6px;
    }
    .body_register{
      margin:auto;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<div class="container mt-5">
<form method="POST" action="register_procesing.php">
  <div class="body_register">
<h1>Regjistrohu</h1>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Emri" name="emri" autofocus="" required="" >
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Mbiemri" name="mbiemri" required="">
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
      <input type="text" class="form-control" placeholder="Username" name="username" required="">
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" required="">
  </div>
</div>
    <div class="row mt-2">
  <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password" required="">
    </div>

  </div>
  <!--
      <div class="row mt-2">
  <div class="col">
      <input type="password" class="form-control" placeholder="Continue-Password" name="password" required="">
    </div>
  </div>
-->
      <div class="row mt-2">
    <div class="col-2">
      <input type="text" class="form-control" placeholder="Mosha" name="mosha" required="">
    </div>
    <div class="col">
     <select class="custom-select my-1 mr-sm-2 col-3" id="inlineFormCustomSelectPref" name="gjinia" required="">
    <option selected>Gjinia</option>
    <option value="1">Mashkull</option>
    <option value="2">Femër</option>
  </select>
</div>
  </div>
      <div class="row mt-2">
  
</div>
<div class="row col-2 mt-2 ">
  </div>
  <br>
   <button type="submit" name="submit" id="btn_register" class="btn btn-primary">Regjistrohu</button>
   <a href="login.php">Kyquni</a>
</form>
</div>
</div>
</div>
</body>
</html>