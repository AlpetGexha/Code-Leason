<?php include("config.php");

session_start();
ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false) {
  header("Location:login.php");
  die();
}
?> 
<!DOCTYPE html>
<html>
<head>
		 <meta name="viewport" content="width=device-witdh,initi3l-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="loading.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <!-- Navbar -->
<?php include ('navbar.php');?>

<form method="POST" action="post.php">
	<div class="container mt-5">
      <div class="form-group">
    <label for="formGroupExampleInput">Emri i Postimit</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Shruani  e postimit " name="emri_post" required="">

    <label for="formGroupExampleInput">Shruani Çfar&euml; të doni në lidhje me postimin...</label>
<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="body"></textarea>
  <label for="floatingTextarea2">Shkrunai...</label>
</div>
<button type="submit" class="btn btn-primary" id="submit" name="submit" on>Posto</button>
<div class="loader loader-default " data-text="Duke u postuar"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#submit').click(function(){
                
                    $( ".loader" ) .addClass( "is-active" );
                }
    </script>
</div>
</form>


</script>
</body>
</html>