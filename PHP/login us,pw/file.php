<?php 
if (isset($_POST['submit'])){ 
$username = $_POST['username'];	
$password = $_POST['password'];

if ($username == 'Alpet' && $password == 'alpet123') {
	echo "Ju jeni kyqur me sukses";
}
else {
	echo "Nuk jeni kyqur me sukses";
}
}
?>