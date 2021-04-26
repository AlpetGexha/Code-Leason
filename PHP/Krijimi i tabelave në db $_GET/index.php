<?php include('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title></title>
</head>

<body>
  <?php // KRIJIMI I TABELABE NE DATABASE
  /*
$sql = "CREATE table user (id int(11) not null AUTO_INCREMENT, name varchar(255), surname varchar(255), PRIMARY KEY(id))";
mysqli_query($db,$sql);
*/
  /*
$sql = "ALTER table user drop column name";
mysqli_query($db,$sql);
*/
  // Shtimi i tabelave
  /*
$sql = "ALTER table user add mosha int(3) not null";
mysqli_query($db,$sql);
*/
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



  <div class="container mt-3">


    <form method="get" action="get.php">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="First name" name="name">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Last name" name="surname">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
        <small id="emailHelp" class="form-text text-muted">.</small>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Dergo</button>
    </form>
  </div>
</body>

</html>