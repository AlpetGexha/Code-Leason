<?php
include 'config.php';
include 'functions.php';
session_start();
ob_start();


if(isset($_POST["limit"], $_POST["start"]))
{
 $db = mysqli_connect("localhost", "root", "", "alpetgexhaag");
$sql = "SELECT u.emri, u.mbiemri, p.emri_post, p.body , p.image, p.post_time from post p, users u where p.user_id = u.id  order by p.id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"].""; // "% $serach %" perafersish fjala qe e shenon per te kerkuar nje postim
  $result = mysqli_query($db, $sql);

while (($row = $result -> fetch_assoc())!=null) {

  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo "<div class='post_foto'>";
  echo "<a target='_blank' href='assets/post_images/".$row['image']."'>";  
  echo "<img src='assets/post_images/".$row['image']."' >";
  echo "</a>";
  echo "</div>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
  echo "<div class= 'post_time'";
  echo " <p class='lead'>".$row['post_time']."</p>";
  echo "</div>";
  echo "</div>";
} 
}

//****************Kontakit ****************//
if (isset($_POST['contact_submit'])) {
  $mesazhi = mysqli_real_escape_string($db, $_POST['mesazhi']);

  //insertimi i të thënave per contact
  $insert = "INSERT into mesazhi(mesazhi)VALUES('$mesazhi')";
  if ($insert) {
    $msg = "Mesazhi u dergua me sukses";
  } else {
    $msg = "nuk u dergua";
  }

  //hape nje file me emrin contact.txt , "a+" Read/Write
  $file = fopen("contact.txt", "a+");

  $teksti = $emri . "\n" . $email . "\n" . $mesazhi . "\n*********************************************************************\n";
  mysqli_query($db, $insert);

  fwrite($file, $teksti);
  header("Location:contact.php");
}


//****************Create Post****************//
if (isset($_POST['create_post_submit'])) {
  $emri_post = mysqli_real_escape_string($db, $_POST['emri_post']);
  $body = mysqli_real_escape_string($db, $_POST['body']);
  $username = mysqli_real_escape_string($db, $_SESSION['username']);


  /* ********** Image **********/ /*
$target = "images/".basename($image);//vendothja ku ruhen fotot
$fileTmp = $_FILES['image']['tmp_name'];
$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];
$fileError = $_FILES['image']['error'];
*/
  //Marrja e id nga useri 
  $sql = "SELECT id from users where username='$username'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();
  $user_id = $row['id'];
  mysqli_query($db, $sql);
  // Get image name
  $fileSize = $_FILES['image']['size'];
  $targetDir = "assets/post_images/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;
  // Get text

  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT into post (emri_post,body,image,user_id)VALUES('$emri_post','$body','$fileName','$user_id')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = "Postimi u Postua me sukses";
          header('Location:index.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);

}
// /* ********** Image **********/
// $fileExt = explode('.',$fileName);
// $fileAcualeExt = strtolower(end($fileExt));

// $allowed = array('jpg', 'jpeg' , 'png');


// if (in_array($fileAcualeExt, $allowed)) {
// 	if ($fileError === 0 ) {
// 		if ($fileSize < 10485760) { //10mb
// 			$fileNameNew = uniqid('.', true).".".$fileAcualeExt;
// 			$fileDestination = 'images/' .$fileNameNew;
// 			move_uploaded_file($fileTmp, $fileDestination);
// 			 header("Location:index.php");
// 		} else {
// 			$msg = "Fotoja edhe shume e madhe! Ju lutem uplodoni foto deri ne<b> 3mb</b> ";
// 		}
// 	} else {
// 		$msg = "Pate nje problem ne uploadimin e keti fallji! Ju lutem provoni perseri";
// 	}
// } else {
// 	$msg = "Ju nuk mund te uplodoni file te keti tipi! Ju lutem perdorni <b>jpg, jpge ose png </b>(foto) ";


//****************Login****************//
if (isset($_POST['login_submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $sql = "SELECT * from users where username = '$username'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();

  if (mysqli_num_rows($results) != 1) { //Nese perdoruesi nuk ekziton
    $user_error = "Ky p&euml;rdorues nuk ekziston. Regjistrohuni tani <a href='register.php' class='text-info'>Regjistrohu !</a>!!";  //errori per username
  } else if (password_verify($password, $row['password'])) { //Nese passwordi edhe gabim	dhe passwordi per encyptim
    $_SESSION['username'] = $username; //Username
    $_SESSION['loggedIn'] = true; //Nese passwordi edhe ne rregull
    header('Location:index.php'); //Shko në faqe kryesore
  } else {
    $password_error = "Fjalekalimi &euml;sht&euml; gabim"; //errori per Password

  }
}


//****************Profile Update ****************//
if (isset($_POST['profil_update'])) {

  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $password1 = password_hash($password, PASSWORD_DEFAULT); //Passworti i enkriptuar

  $update = "UPDATE users set emri='$emri',mbiemri='$mbiemri', email='$email',password='$password1' where username='$username'";
  mysqli_query($db, $update);
  header("Location:myprofile.php");
}

//****************Profil Photo Update****************//
if (isset($_POST['photo_update_submit'])) {

  $fileSize = $_FILES['image']['size'];
  $targetDir = "assets/post_images/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;

  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES['image']['tmp_name'], "assets/profile_image/" . $_FILES['image']['name'])) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
       $sql2 = "UPDATE users SET image = '" . $_FILES['image']['name'] . "' WHERE username = '" . $_SESSION['username'] . "'";
        mysqli_query($db,$sql2);
        header("Location:myprofile_edit.php");
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    } else {
      $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri" ;
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, & PNG) lejohen n&euml; profil';
  }
} 

//****************Password Update ****************//



  if (isset($_POST['submit'])) {
  $user = $_SESSION['username'];

  if ($user) {
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $new_password = $_POST['new_password'];
    $continiu_password = $_POST['continiu_password'];

    $sql = ("SELECT password FROM users where username='$user'");
    $results = mysqli_query($db, $sql);
    $row = $results->fetch_assoc();
    $db_password = $row['password'];
    // $passwordlength= strlen($new_password);
    //   if ($passwordlength < 6){
    //   $msg = " Fjalëkalimi duhet të jetë së paku 6 karaktere";
    //   }
    //   if ($passwordlength > 255){
    //   $msg = "Fjalëkalimi nuk mund të jetë më i madh se 255 karaktere";
    //   }

    if (password_verify($password, $db_password) == 1) {

      if ($new_password == $continiu_password) {
        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $update_password =  "UPDATE users SET password='$new_password_hash' WHERE username='$user'";
        mysqli_query($db, $update_password);
        $msg_sukses = "Passwordi u ndryshua me sukses";
      } else {

        $msg = "Rishruaj passwordin momental";
      }
    } else {

      $msg = "Passwordi momental &euml;dh&euml; gabim";
    }
  }
}




//****************Regjistrimi ****************//
if (isset($_POST['register_submit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  // Marrja e usernamit dhe emailit qe ekzitonjn ne Data Basë 
  $s_username = "SELECT * FROM users WHERE username='$username'";
  $s_email = "SELECT * FROM users WHERE email='$email'";
  $result_username = mysqli_query($db, $s_username);
  $result_email = mysqli_query($db, $s_email);
  $usernamelength = strlen($username);
  $passwordlength = strlen($password);
  if ($usernamelength < 3) {
    $msg = "Username-i duhet t&euml; jet&euml; s&euml; paku 3 karaktere";
  }
  if ($usernamelength > 50) {
    $msg = " Username-i nuk mund t&euml; jet&euml; m&euml; i madh se 50 karaktere";
  }

  if ($passwordlength < 6) {
    $msg = " Fjal&euml;kalimi duhet t&euml; jet&euml; s&euml; paku 6 karaktere";
  }
  if ($passwordlength > 255) {
    $msg = "Fjal&euml;kalimi nuk mund t&euml; jet&euml; më i madh se 255 karaktere";
  }
  if (mysqli_num_rows($result_username) > 0) { //Errori për usernamein qe ekziton 
    $username_error = "Usernamemi ekziton tashm&euml;";
  }
  if (mysqli_num_rows($result_email) > 0) { //Errori për emailin qe ekziton 
    $email_error = "Emaili ekziton tashm&euml;";
  } else { //Nese jane ne rregull te thenat atëherë insertoj te thenat në Data Basë, encypto passwordin dhe shko ne llogin 
    $password1 = password_hash($password, PASSWORD_DEFAULT);
    $insert = "INSERT into users(emri,mbiemri,username,password,email,mosha,gjinia)VALUES('$emri','$mbiemri','$username','$password1','$email','$mosha','$gjinia')";
    mysqli_query($db, $insert);

    header("Location:login.php");
  }
}

//****************Update ****************//
if (isset($_POST['update'])) {
  $id = $_POST['update'];
  $body = $_POST['body'];
  $emri_post = $_POST['emri_post'];

  //updati nga edit.php 
  $update = "UPDATE post set body = '$body', emri_post = '$emri_post' where id=$id";
  mysqli_query($db, $update);
  header("Location:userpost.php");
}


