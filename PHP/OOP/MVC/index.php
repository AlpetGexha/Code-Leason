<?php
include "db.php";
include 'server.php';
include 'Users.php';
include 'UserController.php';
include 'UserView.php';
include 'UserController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$u = new UserView();
$u->shotUsers("Alpet");

//$x = new UserControllers();
//$x->crateUser("Alpet","Gexhaa","Adadajdklajs@gmial.com")

?>
</body>
</html>















