<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title></title>
</head>
<body>

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">emri</th>
      <th scope="col">mbiemri</th>
       <th scope="col">username</th>     
      <th scope="col">email</th>
       <th scope="col">mosha</th>

    </tr>
    <tbody>
    	<?php 
$sql = "SELECT * from users "; //"*" te gjita te thenat
$results = mysqli_query($db,$sql);

while (($row = $results-> fetch_assoc())!=null) {
	/*
	echo $row['emri'];
	echo " ";
	echo $row['mbiemri'];
	echo "<br>";
	*/

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['emri']."</td>";
echo "<td>".$row['mbiemri']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['mosha']."</td>";
echo "</tr>";
}?>
 
</tbody>
  </thead>
</table>
<form action="procesing.php" method="POST">
	 <div class="form-group">
    <label for="formGroupExampleInput">Emri Juaj </label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Shruani emrin tuaj " name="emri" required="">
    <label for="formGroupExampleInput">Emri Postimit</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Shruani  e postimit " name="emri_post" required="">
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Comment i postimit</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" required="" placeholder="Postimi munt te ket vetem 1000 fjalë" required="" ></textarea>
    <button type="submit" class="btn btn-outline-info" name="submit" >Posto</button>
  </div>
</form>
<style type="text/css">
  .jumbotron {
    padding: 17px;
    border: solid black 1px;
    border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.3);
  }
.display-4 {
  font-size: 70px;
}
.lead {
  font-size: 22px;
  color: black; 
  font-family: serif;
}
</style>

<div class="jumbotron">
  <h1 class="display-4"><b>Titulli</b></h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p><i>Postuesi :</i></p>
</div>


<?php 
$sql = "SELECT * from post order by id DESC";
$result_post = mysqli_query($db,$sql); 
while(($row_post = $result_post->fetch_assoc()) !== null){//DESC nga me e reja
 echo'<div class="jumbotron mt-2">';
 echo' <h1 class="display-4">'.$row_post['emri_post'].'</h1>';
 echo' <p class="lead">'.$row_post['body'].'</p>';
 echo'<hr class="my-4">';
 echo' <p>Postuesi: '.$row_post['emri'].'</p>';
 echo' <p class="lead">';
 echo' <a class="btn btn-primary btn-lg" href="#" role="button">Lexo me shume</a>';
 echo '</p>';
 echo'</div>';
	}
?>


</div>
</body>
</html>