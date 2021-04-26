<?php
if (isset($_POST['submit'])) { //_POST variabla globale
    $mbiemri = $_POST['mbiemri'];
    $emri = $_POST['emri'];
    $file = fopen("testi.txt", "a+");
    $teksti = $emri . "\n" . $mbiemri . "\n***************\n";
    fwrite($file, $teksti);
    header("Location:index.php");
}
?>