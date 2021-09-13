<?php 
  if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
  header("Location:login.php");
  die();  
}
  /*
  <?php include('items/need_to_login.php');?>
  */
  ?>