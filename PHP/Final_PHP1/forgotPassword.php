<?php
session_start();
ob_start();

use PHPMailer\PHPMailer\PHPMailer;

include "config.php";
require_once "functions.php";


if (isset($_POST['email'])) {


    $email = $db->real_escape_string($_POST['email']);

    $sql = $db->query("SELECT id FROM users WHERE email='$email'");
    if ($sql->num_rows > 0) {

        $token = generateNewString();

        $db->query("UPDATE users SET token='$token', tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email='$email' ");

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->addAddress($email);
        $mail->setFrom("agexha111@gmail.com", "AlpetG");
        $mail->Subject = "Reset Password";
        $mail->isHTML(true);
        $mail->Body = "
                Hi,<br><br>
                
                
                In order to reset your password, please click on the link below:<br>
                <a href='http://alpetg.epizy.com/reset_Password.php?email=$email&token=$token'>
                http://alpetg.epizy.com/reset_Password.php?email=$email&token=$token</a><br><br>
                
                P&euml;rsh&euml;ndetje t&euml; p&euml;rzemvrta,<br>
                AlpetG
            ";
// N&euml;  m&euml;nyr&euml; q&euml; t&euml; ndryshoni fjal&euml;kalimin tuaj, ju lutemi klikoni në lidhjen më posht&euml;:<br>
        if ($mail->send())
            exit(json_encode(array("status" => 1, "msg" => 'Ju lutem shikoni inboxin n&euml; email e then&euml;')));
    } else
        exit(json_encode(array("status" => 0, "msg" => 'Nuk ka account me kete email')));
}
?>



<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('items/title_bar_img.php'); ?>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">

                <img class="FP_img" src="assets/image/Banclan.JPG"><br><br>
                <input class="form-control" required="" id="email" placeholder="Shruani Emalin" autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emailn');" oninput="this.setCustomValidity('');"><br>
                <input type="submit" class="btn btn-primary" value="Ndrysho Password" name="submit">
                <br><br>
                <p id="response"></p>
                <a href="login.php">Back to login</a>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var email = $("#email");

        $(document).ready(function() {
            $('.btn-primary').on('click', function() {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                        url: 'forgotPassword.php',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            email: email.val()
                        },
                        success: function(response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                } else
                    email.css('border', '1px solid red');
            });
        });
    </script>
</body>

</html>