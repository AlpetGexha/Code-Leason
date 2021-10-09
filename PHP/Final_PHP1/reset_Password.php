<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
  body {
    background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
    height: 100vh;
    text-align: center;
  }

  .rpmain {
    display: block;
    margin: auto;
    padding: 10px;
    border: solid 2px black;
    border-radius: 4px;
    background-color: lightblue;
    width: 50%;
    height: auto;
    font-size: 30px;
    text-align: center;
  }

  .RP_h1 {
    text-align: center;
    font-size: 50px;
    color: red;
  }

  .FP_kujdes {
    color: red;
    font-size: 40px;
  }

  .FP_destinacioni {
    color: blue;
  }
</style>
<?php
session_start();
ob_start();
require_once "functions.php";

if (isset($_GET['email']) && isset($_GET['token'])) {
  include('config.php');

  $email = $db->real_escape_string($_GET['email']);
  $token = $db->real_escape_string($_GET['token']);

  $sql = $db->query("SELECT id FROM users WHERE
			email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()
		");

  if ($sql->num_rows > 0) {
    $newPassword = generateNewString();
    $newPasswordEncrypted = password_hash($newPassword, PASSWORD_DEFAULT);
    $db->query("UPDATE users SET token='', password = '$newPasswordEncrypted'
				WHERE email='$email'
			");

    echo '<div class="container mt-5">';
    echo '<h1 class="RP_h1"> Reset Passoword </h1>';
    echo '<div class="rpmain">';
    echo "<p>Passwordi yi i ri &euml;sht&euml; <b>$newPassword</b> <br><a href='login.php'>Kyquni</a></p><hr>";
    echo '<p class="FP_kujdes"><b>KUJDES!!</b></p>';
    echo '<p>' . 'Ky link nuk do tju hapet pasi t&euml; ta keni mbyllur' . '</p>';
    echo '<p>';
    echo ' Ju lutem pasi te jeni kyqeni shkoni n&euml;';
    echo '<p class="FB_destinacioni"><i><b> Profili => Ndrysho profilin => Ndrysho Passwordin</i></b></p>';
    echo "Ne <i> Passowordi Momental</i> shruani passwordin me lart<b><i> $newPassword</b></i> , pastaj shruani passwordin e ri";
    echo '</p>';
    echo '</div>';
    echo '</div>';
  } else
    redirectToLoginPage();
} else {
  redirectToLoginPage();
}
?>