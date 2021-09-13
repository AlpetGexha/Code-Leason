<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title></title>
</head>
<body>

<?php
/*
$sql = "INSERT into users(emri,mbiemri,username,email,password)VALUES('filan','fisniku','filanf','ff@gmail.com','fdsf23324sd') ";
 mysqli_query($db,$sql);
 echo "te thenat u Insertuan me sukses";
 */
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<div class="container mt-5">
<form method="post" action="procesing.php">

  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First Name" name="emri">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last Name" name="mbiemri">
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
  </div>
    <div class="row mt-2">
  <div class="col">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
  </div>
</div>
    <div class="row mt-2">
  <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
      <div class="row mt-2">
    <div class="col-2">
      <input type="text" class="form-control" placeholder="Mosha" name="mosha">
    </div>
  </div>
      <div class="row mt-2">
  <div class="col">
     <select class="custom-select my-1 mr-sm-2 col-3" id="inlineFormCustomSelectPref" name="gjinia">
    <option selected>Gjinia</option>
    <option value="1">Mashkull</option>
    <option value="2">Femër</option>
  </select>
</div>
</div>

  <br>
   <button type="submit" name="submit" class="btn btn-primary">Dergo</button>
</form>
</div>
</body>
</html>