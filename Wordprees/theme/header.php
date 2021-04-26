<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <img class="navbar-brand" src="wp-content/themes/theme/assets/img/Logo.jpg" alt="logo" style="width:50px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <?php
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary',
            'items_wrap' => '<li id=""class="nav-item">%3$s</li>'
          )
        );
        ?>
      </ul>
    </div>
  </nav>

  <!-- 2  <nav>
<div class="logo">
<a href="#"><img src="/wordpress/wp-content/themes/twentytwentytwo/assets/images/img.png"></a>
</div>
<div class="pages">
<a href="#">Home</a>
<a href="#">About</a>
<a href="#">Sample</a>
</div>
</nav> -->
  </form><br>
  <div class="container">
    <div class="search">
      <?php get_search_form(); ?><br>
    </div>
  </div>
  </div>
  </nav>
  <style type="text/css">
    .sidebar-1 {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }

    .search {
      padding: 10px;
      width: 100%;
      /*border: solid red 2px;*/
    }

    #searchsubmit {
      margin-top: -5px;
    }

    #s {
      padding: 15px;
      display: inline;
      width: 60%;
      color: #212529;

    }

    .screen-reader-text {
      display: none;
    }

    .nav-links {
      display: inline;
    }
  </style>


  <?php wp_head(); ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('document').ready(function() {
      $('#s').attr('placeholder', 'Ju lutem kerkoni ketu...');
    });

    $('document').ready(function() {
      $('#s').addClass("form-control mr-sm-2");
    });

    $('document').ready(function() {
      $('#searchsubmit').addClass("btn btn-primary");
    });
  </script>