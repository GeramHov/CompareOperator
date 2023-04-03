<?php
session_start();
include_once('PARTIALS/header.php');
include('./CONFIG/pretydump.php')
?>

<section id="home">

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid mx-5">
    <a class="navbar-brand text-light" href="index.php">
        <img class="logo" src="LOGO/logo.png" alt="Mon logo">
    </a>
    <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="">Disabled</a>
        </li>
      </ul>
      <div class="user ms-5">
        <?php
if (isset($_SESSION["id"])) {
  echo '<a href="logout.php" class="btn btn-danger">Disconnect</a>';
} else {
  echo '<a href="login.php" class="btn btn-primary">Login / Register</a>';
}
?>
      </div>
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

        </div>
    </div>
</div>
</section>











<?php
    include_once('PARTIALS/bottom.php');
?>