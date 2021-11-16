<?php
if (defined('ABSPATH')) {

  require_once(ABSPATH . "includes/stats.php");
 
} else {
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>Enfield Chase Rotary - welcome.</title>
  <meta name="description" content="Rotary clubs throughout the world are committed to serving their local, National and International communities in a number of ways. We welcome membership enquiries from like-minded people" />
  <meta name="author" content="Chris Sweeney, Rotary Club of Conwy info@121technology.com" />
  <meta name="rating" content="General" />
  <meta name="robots" content="index,follow" />
  <meta name="revisit-after" content="4 days" />

  <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/style.css" />


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
</head>

<body>
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="./"> </a>
        <span class="cbName 	d-none d-sm-block text-center text-nowrap ">
          <a class="nav-link font-weight-light font-smaller" href="./"> The Rotary Club of Edmonton </a>
        </span>
        <span class="cbName d-block d-sm-none">
          <a class="nav-link " href="./"> Edmonton </a>
        </span>
        <span class="member-link d-none d-lg-block">

          <div class="dropdown-container">
            <div class="dropdown p-3">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonLog" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user " aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLog">
                <?php
                if ($user->is_logged_in()) {
                ?>
                  <li><a class="dropdown-item " href="admin-members.php">Profile</a></li>
                  <li><a class="dropdown-item" href="admin-logout.php">logout</a></li>
                  <li><a class="dropdown-item" href="admin-changePassword.php">Change Password </a></li>
                <?php
                } else {
                ?>
                  <li><a class="dropdown-item active" href="admin-login.php">Members</a></li>
                <?php
                }
                ?>


              </ul>
            </div>
          </div>
          <!-- <a class="nav-link font-weight-light font-smaller" href="./admin-members.php">Members</a> -->


        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars fa-2x"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="d-lg-none">
            <ul class="navbar-nav w-100 justify-content-between">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user " aria-hidden="true"></i>
                  Members
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                  <?php
                  if ($user->is_logged_in()) {
                  ?>
                    <li class=""><a class="dropdown-item" href="admin-members.php">Profile</a></li>
                    <li class=""><a class="dropdown-item" href="admin-logout.php">logout</a></li>
                    <li class=""><a class="dropdown-item" href="admin-changePassword.php">Change Password </a></li>
                  <?php
                  } else {
                  ?>
                    <li class=""><a class="dropdown-item" href="admin-login.php">Log in</a></li>
                  <?php
                  }
                  ?>


                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!--/.Navbar-->

    <!-- second nav-->
    <div class="d-none d-lg-block">
      <div class="row mb-2 p-2 justify-content-md-evenly nav-rotary-row">
        <!-- <div class="row mb-2 p-2 nav-rotary-row "> -->

        <div class="col-md-2">
          <a class="nav-link active nav-rotary p-2" aria-current="page" href="#">Contact</a>
        </div>

        <div class="col-md-2">
          <div class="dropdown">
            <button class="btn dropdown-toggle nav-rotary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              What We Do
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-2">
          <div class="dropdown">
            <button class="btn dropdown-toggle nav-rotary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Meetings &amp; Events
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <a class="nav-link active nav-rotary" aria-current="page" href="#">Join Us</a>
        </div>
        <div class="col-md-2">
          <div class="dropdown">
            <button class="btn dropdown-toggle nav-rotary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              More
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!--iiiiiii-->
    </div>
  </header>