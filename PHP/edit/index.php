<?php include('config.php'); ?>
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
          <th scope="col">Emri</th>
          <th scope="col">Mbiemri</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Mosha</th>
          <th scope="col">Opsionet</th>
        </tr>

      <tbody>
        <?php
        $sql = "SELECT * from users "; //"*" te gjita te thenat
        $results = mysqli_query($db, $sql);

        while (($row = $results->fetch_assoc()) != null) {

          /*
	echo $row['emri'];
	echo " ";
	echo $row['mbiemri'];
	echo "<br>";
	*/

          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['emri'] . "</td>";
          echo "<td>" . $row['mbiemri'] . "</td>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['mosha'] . "</td>";
          echo "<td><a href='delete.php? id=" . $row['id'] . "'>Delete</a>/<a href='edit.php? id=" . $row['id'] . "'>Update</a> </td>"; //opsionif
          echo "</tr>";
        }
        ?>

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
        <label for="exampleFormControlTextarea1">Shruani dicka lidhje me postimin</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" required="" placeholder="Postimi mund të ketë vetëm 1000 shronja" required=""></textarea>
        <button type="submit" class="btn btn-outline-info" name="submit">Posto</button>
      </div>

    </form>
    <?php
    $sql = "SELECT * from post order by id DESC"; //DESC nga me e reja
    $result_post = mysqli_query($db, $sql);
    while (($row_post = $result_post->fetch_assoc()) !== null) {
      echo '<div class="jumbotron mt-2">';
      echo ' <h1 class="display-4">' . $row_post['emri_post'] . '</h1>';
      echo ' <p class="lead">' . $row_post['body'] . '</p>';
      echo '<hr class="my-4">';
      echo ' <p>Postuesi: ' . $row_post['emri'] . '</p>';
      echo ' <p class="lead">';
      echo '   <a class="btn btn-primary btn-lg" href="#" role="button">Lexo me shume</a>';
      echo '</p>';
      echo '</div>';
    }
    ?>

  </div>
</body>

</html>