<?php 
if (isset($_GET['submit'])){
	$name = $_GET ['name'];
	$surname = $_GET ['surname'];
	$email = $_GET ['email'];
	echo "$name,$surname,$email";}
?>