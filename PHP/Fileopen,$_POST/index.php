<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <div class="container mt-5">


    <?php
    /*
$file = fopen("teksti.txt", "w"); //w-wride
$teksti = "Nje tekst";
fwrite($file, $teksti);
fclose($file);
*/
    /*

$emri = "teksti.txt";
$file = fopen($emri, "r"); // r-read
$filesize = filesize($emri); //madhesia e falit()
$filedata = fread($file, $filesize);// faili qe duhet lexuar(fread)
echo "$filedata";
*/
    /*
$emrii = "teksti.txt";
$file = fopen($emrii, "w+"); // w+ - read/wire
fwrite($file, "Pershendetje");
*/
    ?>

    <form method="Post" action="file.php">
      <!-- action faili qe eksekutohet -->
      <input type="text" name="emri" placeholder="Emri" autofocus=""> <br>
      <input type="text" name="mbiemri" placeholder="Mbiemri"> <br>
      <input type="submit" name="submit">
    </form>
  </div>
</body>

</html>