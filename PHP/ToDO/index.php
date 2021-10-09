<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>To Do</title>
	<style type="text/css">
		.jumbotron{
		  padding: 12px;
		  position: relative;
		}
		.delete {
	    position: absolute; 
	    right:10px;
	    top: 10px;
		}
	</style>

</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


<div class="container mt-5">
<form action="procesing.php" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Gjërat qe doni ti bëni sot </label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Shruani gjerat qe doni ti beni sot " name="gjerat" required="">
    <button type="submit" class="btn btn-outline-info" name="submit" >SHTO</button>
  </div>
<?php 
$select = "SELECT * from todo order by id DESC";

$result = mysqli_query($db,$select);

while(($row = $result->fetch_assoc()) != null){
 echo'<div class="jumbotron mt-2" style="background-color: #e9ecef;">';
 echo' <h1 class="display-4">'.$row['gjerat'].'</h1>';
 echo '<div class="delete">';
 echo "<td><a href='delete.php? id=".$row['id']."'>Delete</a>/<a href='edit.php? id=".$row['id']."'>Edit</a></td>";
 echo'</div>'; 
 echo'</div>';
} 

?>
</form>
</body>
 </div>
</html>