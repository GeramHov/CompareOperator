<?php
session_start();
include_once('PARTIALS/header.php');
?>

<!-- Animation météorite à transformer en scss:  -->
<style>
  .logo-hover {
    transform: rotate(200deg);
    width: 5vh;
    height: auto;
    position: absolute;
    top: 0;
    left: -8;
    display: contents;
    pointer-events: none;
    z-index: 5;
    opacity: 1;
    animation-name: shooting-star;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    ;
  }

  @keyframes shooting-star {
    0% {
      transform: translate(-100%, -100%);
      opacity: 1;

    }

    10% {
      transform: translate(0, 0);
      opacity: 1;

    }

    90% {
      transform: translate(100%, 150%);
      opacity: 1;

    }

    100% {
      transform: translate(500%, 200%);
      opacity: 0;
      transform: rotate(20deg);
    }
  }
</style>
<!-- Animation météorite à transformer en scss:  -->

<section id="home">

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid mx-5">
    <a class="navbar-brand text-light" href="../index.php">
        <img class="logo" src="../LOGO/logo.png" alt="Logo">
        <img class="logo logo-hover" src="./IMAGES/star.png" alt="Giant rock">
      </a>
    <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light mx-2" aria-current="page" href="#"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light mx-2" href="#"><h5>Features</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light mx-2" href="#"><h5>Pricing</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light ms-2 me-5" href=""><h5>Disabled</h5></a>
        </li>
        <li>
          <div class="user ms-5">
            <a id="login" class="me-3" href="../PHP/register.php">
              SignUp
            </a>
            <?php
    if (isset($_SESSION["id"])) {
      echo '<a href="../PHP/logout.php" class="btn btn-danger">Disconnect</a>';
    } else {
      echo '<a href="../PHP/login.php" class="btn text-light rounded-0">Login</a>';
    }
    ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 my-5 d-flex flex-wrap justify-content-between">

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/nyc.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"> <span><img src="../ICONS/usa.png" alt="flag" width="30" height="30"> </span> New York</h4>
                  <h6 class="text-center my-4">USA</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/bangkok.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/thailand.png" alt="flag" width="30" height="30"> </span> Bangkok</h4>
                  <h6 class="text-center my-4">Thailand</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/helsinki.avif" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/finland.png" alt="flag" width="30" height="30"> </span> Helsinki</h4>
                  <h6 class="text-center my-4">Finland</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/losangeles.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/usa.png" alt="flag" width="30" height="30"> </span> Los Angeles</h4>
                  <h6 class="text-center my-4">USA</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/sydney.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/australia.png" alt="flag" width="30" height="30"> </span> Sydney</h4>
                  <h6 class="text-center my-4">Australia</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/santorini.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/greece.png" alt="flag" width="30" height="30"> </span> Santorini</h4>
                  <h6 class="text-center my-4">Greece</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/london.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/uk.png" alt="flag" width="30" height="30"> </span> London</h4>
                  <h6 class="text-center my-4">United Kingdom</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 22rem">
              <img class="rounded-0" src="../IMAGES/florence.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/italy.png" alt="flag" width="30" height="30"> </span> Florence</h4>
                  <h6 class="text-center my-4">Italy</h6>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>











<?php
    include_once('PARTIALS/bottom.php');
?>