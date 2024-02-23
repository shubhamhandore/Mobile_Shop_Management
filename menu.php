<?php
session_start();
pg_connect("host=localhost user=postgres password=postgres dbname=dbmobileshop");?>
<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a href="index.php"  class="nav-link"><b>Home</b></a></li>
                            
                                <?php

                                if($_SESSION['email']==null){
                                    ?>
                                    <li class="nav-item"><a href="register.php" class="nav-link"><b>Register</b></a></li>
                              <li class="nav-item"><a href="login.php" class="nav-link"><b>Login</b></a></li>
                              <?php
                          }
                          else{
                            ?>
                              <li class="nav-item"><a href="welcome.php" class="nav-link"><b>Products</b></a></li>
                              <li class="nav-item"><a href="viewcart.php" class="nav-link"><b>View Cart</b></a></li>
                               <li class="nav-item"><a href="orders.php" class="nav-link"><b>Orders</b></a></li>
                              <li class="nav-item"><a href="logout.php" class="nav-link"><b>Logout</b></a></li>
                              <?php
                          }
                          ?>
              <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
 
    <!--================ Hero banner start =================-->