<?php
$msg = "";
include "config.php";
include "server.php";
// ne fillim kyqu para se te hysh ne index
ob_start();
//Nese nuk je i kyqur nuk mund te hysh ne kete faqe
include('items/need_to_login.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Main</title>
    <!-- ------------ Foto per title bar ------------------ -->
    <?php include('items/title_bar_img.php'); ?>

    <!-- ------------ Links ------------------ -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- ------------ Meta ------------------ -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">

    <!-- ------------ Boostrap css ------------------ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

    <!-- ------------ Boostrap JS ------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>

    <?php include('items/navbar.php'); ?>
    <div class="TitujtJ_container">
        <div class="TitujtJ">
            <div class="TitujtJ_effect">
                <?php
                $sql3 = "SELECT emri_post from post ";
                $result2 = mysqli_query($db, $sql3);
                while (($row = $result2->fetch_assoc()) != null) {
                    echo "<div class='TitujtJ_p'><span>&#183;</span>" . $row['emri_post'] . "</div>";
                }
                ?>

            </div>
        </div>
    </div>
    <div class="container mt-5">

        <style>

        </style>

        <!-- ------------ Search ------------------ -->
        <form class="form-inline" method="get" action="#">
            <input class="form-control mr-sm-2" type="search" placeholder="Krekoni Postime" name="search_post">
            <button id="btn_search" class="btn btn-outline-primary" type="submit">Kerko</button>
        </form>



        <?php
        // ------------ Forma per shfaqejn e postime nga databasa me serch ------------------ 
        if (isset($_GET['search_post'])) {
            $search = $_GET['search_post'];
            $sql = "SELECT u.emri, u.mbiemri, p.emri_post, p.body , p.image, p.post_time from post p, users u where p.user_id = u.id and emri_post LIKE '%$search%' order by p.id DESC"; // "% $serach %" perafersish fjala qe e shenon per te kerkuar nje postim
            $result = mysqli_query($db, $sql);



            while (($row = $result->fetch_assoc()) != null) {

                echo "<div class='jumbotron'>";
                echo "<h1 class='display-4'>" . $row['emri_post'] . "</h1>";
                echo "<div class='post_foto'>";
                echo "<a target='_blank' href='assets/post_images/" . $row['image'] . "'>";
                echo "<img src='assets/post_images/" . $row['image'] . "' >";
                echo "</a>";
                echo "</div>";
                echo " <p class='lead'>" . $row['body'] . "</p>";
                echo "<hr class='my-4'>";
                echo "<p>Postuesi: " . $row['emri'] . " " . $row['mbiemri'] . "</p>";
                echo "<div class= 'post_time'";
                echo " <p class='lead'>" . $row['post_time'] . "</p>";
                echo "</div>";
                echo "</div>";
            }

            //Erroi nëse nuk ka poste
            if (mysqli_num_rows($result) == 0) {
                echo "<p style = 'text-align:center;  color:red;  font-size:20px;' >Nuk ka postime me k&euml;t&euml; em&euml;r </p>";
            }
        } else {
            echo '
               <div id="jumbotron"></div>
               <div id="jumbotron_loading"></div>

            ';
        }

        ?>
    </div>
    <script src="assets/js/function.js"></script>
</body>

</html>