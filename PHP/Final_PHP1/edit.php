<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
include('items/need_to_login.php');
//Selectimi post "ID"
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = "SELECT * from post where id='$id'";
  $results = mysqli_query($db, $select);
  $row = $results->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Nrysho postimin</title>
</head>
<title>Ndryshimi i Postimit</title>

<!-- ------------ Foto per title bar ------------------ -->
<?php include('items/title_bar_img.php'); ?>

<body>
  <!-- ------------ Foto per title bar ------------------ -->
  <link rel="shortcut icon" type="image/x-icon" href="../Final_PHP/img/Killerlogo.jpg">

  <!-- ------------ Boostrap ------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- ------------ Forma për ndryshim e postmit ------------------ -->
  <?php include('items/navbar.php'); ?>
  <form action="server.php" method="POST">
    <div class="container mt-5">
      <div class="jumbotron">
        <div class="row">
          <div class="col">
            <h6>Titulli</h6>
            <input type="text" class="form-control" name="emri_post" autofocus="" required="" value="<?php echo $row['emri_post']; ?>" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postmit');" oninput="this.setCustomValidity('');">
          </div>
        </div>
        <h6>Teksti</h6>
        <textarea class="form-control" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin');" oninput="this.setCustomValidity('');" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 120px" name="body"><?php echo $row['body']; ?></textarea>
        <button type="submit" class="btn btn-primary" id="submit" style="margin-top: 10px;" value="<?php echo $row['id']; ?>" name="update">Ndrysho</button>
      </div>
    </div>
    </div>
  </form>
</body>

</html>