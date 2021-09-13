<?php
session_start();
ob_start();
session_destroy();//Logout
header("Location:login.php");//shko në login
?>