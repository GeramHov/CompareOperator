<?php
session_start();
include_once('PARTIALS/header.php');
include_once('./CONFIG/db.php');
include_once('./CONFIG/autoload.php');

// REQUEST A METHOD TO SHOW ALL DESTINATIONS
$manager = new Manager($db);
$destinations = $manager->getAllDestinations();

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

  <!-- SEARCH FORM START -->

    <form action="" method="get">
      <div id="showinput" class="d-flex">

        <!-- HIDDEN INPUT START -->
            <input class="searchinput w-75 rounded-1 font-italic" type="text" name="searchkey" placeholder=" Type a destination...">
              <button class="searchinputbtn bg-transparent border-0" type="submit">
                <img class="mx-1" src="./ICONS/search.png" alt="loop" width="25" height="25">
              </button>

        <!-- HIDDEN INPUT END -->

        <!-- HEADER FOR DESTINATION WITH A LOOP TO EXPAND ONCLICK START -->
          <h3 class="destinations text-light mx-3">Destinations</h3>
          <a href="">
            <img id="loop" class="mt-1" src="./ICONS/search.png" alt="loop" width="25" height="25">
          </a>

        <!-- HEADER FOR DESTINATION WITH A LOOP TO EXPAND ONCLICK END -->
        </div>
    </form>
    <!-- SEARCH FORM END -->


<div class="row">
  <div class="col col-lg-12 col-md-12 col-sm-12 my-5 d-flex flex-wrap justify-content-between">
 
  <!-- SEARCH FUNCTION -->
  <?php
    if(isset($_GET['searchkey'])){
    $manager = new Manager($db);
    $searchedDestinations = $manager->getSearchedDestinations($_GET['searchkey']);

    // SHOW SEARCHED DESTINATIONS ON CARD-DISPLAY START
    if(count($searchedDestinations) > 0){

    foreach ($searchedDestinations as $searchedDestination) {

        echo '<div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
        <img class="rounded-0" src="../'.$searchedDestination->getImage().'" class="card-img-top" alt="city">
          <div class="card-body">
            <h4 class="card-title text-center my-2"> <span><img src="../'. $searchedDestination->getFlag().' " alt="flag" width="30" height="30"> </span>  '. $searchedDestination->getLocation().' </h4>
            <h6 class="text-center my-4">  '. $searchedDestination->getCountry().' </h6>
              <div class="text-center d-flex justify-content-center text-secondary">
                <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                <p id="generalnote" class="mb-1">4.8</p>
              </div>
              <div class="text-center my-2">
                <a href="#" class="btn text-light rounded-0">Go There!</a>
              </div>
          </div>
      </div>';

      } 
    }
      
    if(count($searchedDestinations) == 0){

        echo '
          <div class="text-light">No result found.</div>
        ';
        // script to add : redirection to index.php after 3seconds

      }
    }
      
      // SHOW SEARCHED DESTINATIONS ON CARD-DISPLAY END
      
      
      // SHOW ALL DESTINATIONS ON CARD-DISPLAY START
      
      if(!isset($_GET['searchkey'])){

        foreach ($destinations as $destination) {
          echo '<div class="card rounded-0 border-0 m-3" style="width: 17rem; height: 25rem">
          <img class="rounded-0" src="../'.$destination->getImage().'" class="card-img-top" alt="city">
            <div class="card-body">
              <h4 class="card-title text-center my-2"> <span><img src="../'. $destination->getFlag().' " alt="flag" width="30" height="30"> </span>  '. $destination->getLocation().' </h4>
              <h6 class="text-center my-4">  '. $destination->getCountry().' </h6>
                <div class="text-center d-flex justify-content-center text-secondary">
                  <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                  <p id="generalnote" class="mb-1">4.8</p>
                </div>
                <div class="text-center my-2">
                  <a href="#" class="btn text-light rounded-0">Go There!</a>
                </div>
            </div>
        </div>';
      }  

    }

    // SHOW ALL DESTINATIONS ON CARD-DISPLAY END
?>
          
        </div>
    </div>

 

  </div>
</section>

<script src="./JS/searchbutton.js"></script>
<?php
    include_once('PARTIALS/bottom.php');
?>