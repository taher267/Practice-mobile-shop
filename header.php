<?php $url = "http://localhost/shopee2/"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopee</title>

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>assets/css/bootstrap.min.css">

    <!-- Owl-carousel -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>assets/css/owl.theme.default.min.css"/>

    <!-- font awesome icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>assets/css/all.min.css">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo $url;?>style.css">
    <?php require 'functions.php';
    //echo "<h1>Bismillah</h1>";
    ?>
</head>

<body>

    <!-- start #header -->
        <header id="header">
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-rale font-size-12 text-black-50 m-0">Jordan Calderon 430-985 Eleifend St. Duluth Washington 92611 (427) 930-5255</p>
                <div class="font-rale font-size-14">
                    <?php if (!isset($_COOKIE['Auth'])): ?>
                      <a href="login.php" class="px-3 border-right border-left text-dark">Login</a>
                      <a href="signup.php" class="px-3 border-right border-left text-dark">Signup</a>
                    <?php else:?>
                      <a href="login.php" class="px-3 border-right border-left text-dark">Log Out</a>
                    <?php endif; ?>
                    <a href="#" class="px-3 border-right text-dark">Whishlist (0)</a>
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
                <a class="navbar-brand" href="<?php echo $url; ?>">Mobile Shopee</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">On Sale</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                      </li>
                  </ul>
                  <form action="#" class="font-size-14 font-rale">
                      <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($Cart->GetCartData(1,'cart')); ?>
                          
                          <?php ?>
                        </span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

        </header>
    <!-- !start #header -->

    <!-- start #main-site -->
        <main id="main-site">