<?php include('config.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * from users where id='$id'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc(); // "-> fetch_assuc()"shenderrimi ne  varg asociativ
}
?>
<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title></title>
</head>

<body>
  <form action="update.php" method="POST">
    <div class="container mt-5">

      <div class="row">
        <div class="col">
          <h6>Emri</h6>
          <input type="text" class="form-control" name="emri" autofocus="" value="<?php echo $row['emri']; ?>">
        </div>
        <div class="col">
          <h6>Mbiemri</h6>
          <input type="text" class="form-control" value="<?php echo $row['mbiemri']; ?>" name="mbiemri">
        </div>
      </div>
      <div class="col-4">
        <h6>Username</h6>
        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
      </div>
      <div class="col">
        <h6>Email</h6>
        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
      </div>
      <div class="col-6">
        <h6>Password</h6>
        <input type="password" class="form-control" id="password" name="password" autofocus="" value="<?php echo $row['password']; ?>">
      </div>
      <button onclick="showpassword()">Show password</button>
      <br><br>
      <button type="submit" class="btn btn-primary" name="update">Update</button>

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- Hidden button qe mundeon qasjen me id  trgon id ne data base qe te mund ta  ndryshoj editin  -->

  </form>
  </div>
  <script type="text/javascript">
    function showpassword() {
      document.getElementById('password').type = 'text';
      event.preventDefault();
    }
  </script>
</body>

</html>