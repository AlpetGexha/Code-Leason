
<?php
/*
  include "server.php";

$table = new Table();
$table->title = "My table";
$table->numRows = 5;

$row = new Row();
$row->numCells = 3;
*/



/*
<?php
include "server.php";

$table = new Html\Table();
$table->title = "My table";
$table->numRows = 5;

$row = new Html\Row();
$row->numCells = 3;

*/


//<?php
include "server.php";
use Html as H;
$table = new H\Table();
$table->title = "My table";
$table->numRows = 5;

$row = new H\Row();
$row->numCells = 3;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namespace</title>
</head>

<body>

    <?php $table->msg(); ?>
    <?php $row->msg(); ?>
</body>

</html>