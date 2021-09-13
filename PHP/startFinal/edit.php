<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
  header("Location:login.php");
  die();
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$select = "SELECT * from post where id='$id'";
	$results = mysqli_query($db,$select);
	$row = $results->fetch_assoc(); }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">

<form action="update.php" method="POST">
	<div class="container mt-5">
<div class="row">
    <div class="col">
    	<h6>Titulli</h6>
      <input type="text" class="form-control" name="emri_post" autofocus="" value="<?php echo $row['emri_post'];?>">
    </div>
</div>
    <div class="col">
    	<h6>Teksti</h6>
      <input type="text" class="form-control" name="body" value="<?php echo $row['body'];?>">
    </div>
    <button type="submit" class="btn btn-primary" id="submit" value="<?php echo $row['id'];?>" name="update">update</button>
</form>