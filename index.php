<?php
session_start();
include_once('PARTIALS/header.php');
?>

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
          <a class="nav-link text-light mx-2" aria-current="page" href="../index.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light mx-2" href="#"><h5>Features</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light mx-2" href="#"><h5>Pricing</h5></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light ms-2" href="">
              <h5>Disabled</h5>
            </a>
          </li>
          <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            echo '<li class="nav-item">
                <a class="nav-link text-light mx-2 me-5" href="../admin.php">
                <h5>Admin Panel</h5>
                </a>
              </li>';
          }
          ?>
        <li>
          <div class="user ms-5">
            <?php
if(isset($_SESSION['id'])) {
    echo '<a href="../profile.php">
            <img class="mt-1" src="../ICONS/profile-user.png" alt="usericon" width="30" height="30" />
          </a>
          <li class="nav-item mt-2">
            <div class="dropdown">
              <a class="dropdown-toggle text-light mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../PROCESS/logout.php">LogOut</a></li>
              </ul>
            </div>
          </li>';

} else {
    echo '<li class="nav-item ">
            <a class="nav-link text-light mx-2" href="../PHP/register.php">Sign Up</a>
          </li>
          <li class="nav-item ">
          <a href="../PHP/login.php" class="btn text-light rounded-0">Login</a>
          </li>';
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

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/nyc.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"> <span><img src="../ICONS/usa.png" alt="flag" width="30" height="30"> </span> New York</h4>
                  <h6 class="text-center my-4">USA</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/bangkok.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/thailand.png" alt="flag" width="30" height="30"> </span> Bangkok</h4>
                  <h6 class="text-center my-4">Thailand</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.7</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/helsinki.avif" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/finland.png" alt="flag" width="30" height="30"> </span> Helsinki</h4>
                  <h6 class="text-center my-4">Finland</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/losangeles.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/usa.png" alt="flag" width="30" height="30"> </span> Los Angeles</h4>
                  <h6 class="text-center my-4">USA</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/sydney.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/australia.png" alt="flag" width="30" height="30"> </span> Sydney</h4>
                  <h6 class="text-center my-4">Australia</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/santorini.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/greece.png" alt="flag" width="30" height="30"> </span> Santorini</h4>
                  <h6 class="text-center my-4">Greece</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/london.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/uk.png" alt="flag" width="30" height="30"> </span> London</h4>
                  <h6 class="text-center my-4">United Kingdom</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <a href="#" class="btn text-light rounded-0">Go There!</a>
                 </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
              <img class="rounded-0" src="../IMAGES/florence.jpg" class="card-img-top" alt="city">
                <div class="card-body">
                  <h4 class="card-title text-center my-2"><span><img src="../ICONS/italy.png" alt="flag" width="30" height="30"> </span> Florence</h4>
                  <h6 class="text-center my-4">Italy</h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
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