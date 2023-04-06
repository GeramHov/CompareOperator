<?php
session_start();
include_once('PARTIALS/header.php');
include_once('./CONFIG/db.php');
include_once('./CONFIG/autoload.php');

// REQUEST THE METHOD TO SHOW ALL DESTINATIONS
$manager = new Manager($db);
$destinations = $manager->getAllDestinations();

// REQUEST THE METHOD TO SHOW ALL COMPANIES
$manager = new Manager($db);
$companies = $manager->getAllCompanies(); 

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
          <a class="nav-link text-light mx-2" href="#"><h5>Partners</h5></a>
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
              <img class="closeup" src="./ICONS/left.png" alt="close" width="12" height="12">

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
  <div class="col col-lg-12 col-md-12 col-sm-12 my-5 d-flex flex-wrap justify-content-center">
    <!-- <img src="./TOUR_OPERATOR_ICON/flyone.png" alt="" width="50" height="50"> -->

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
            <div class="startingprice text-secondary mx-3" <p>From  <span class="text-dark fw-bold">'. $searchedDestination->getstartingPrice() .' €</span> </p> </div>
              <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
              <p id="generalnote" class="mb-1">4.8</p>
            </div>
              <div class="text-center my-2">
                <a href="" class="showmodal btn text-light rounded-0">Go There!</a>
              </div>
          </div>
      </div>';

      } 
    }
    
    // SHOW NO RESULT FOUND WHEN NO MATCH + RELOAD THE PAGE AFTER 3 SECONDS
    if(count($searchedDestinations) == 0){

      echo '
      <div class="text-light">No result found.</div>';

      echo ' 
      <script>  
      setTimeout(function() {
        window.location.href = "index.php";
      }, 3000);
    </script>';

      }
    }
      
      // SHOW SEARCHED DESTINATIONS ON CARD-DISPLAY END
      
      
      // SHOW ALL DESTINATIONS ON CARD-DISPLAY START
      
      if(!isset($_GET['searchkey'])){
        foreach ($destinations as $destination) {
            echo '<div id="card" class="card rounded-0 border-0 m-4" style="width: 17rem; height: 25rem">
            <img class="rounded-0" src="../'.$destination->getImage().'" class="card-img-top" alt="city">
              <div class="card-body">
                <h4 class="card-title text-center my-2"> <span><img src="../'. $destination->getFlag().' " alt="flag" width="30" height="30"> </span>  '. $destination->getLocation().' </h4>
                <h6 class="text-center my-4">  '. $destination->getCountry().' </h6>
                  <div class="text-center d-flex justify-content-center text-secondary">
                  <div class="startingprice text-secondary mx-3" <p>From  <span class="text-dark fw-bold">'. $destination->getstartingPrice() .' €</span> </p> </div>
                    <img class="mt-1 me-1" src="../ICONS/star.png" alt="star" width="15" height="15">
                    <p id="generalnote" class="mb-1">4.8</p>
                  </div>
                  <div class="text-center my-2">
                    <button class="btn text-light rounded-0" data-bs-toggle="modal" data-bs-target="#modal-'. $destination->getId() .'">Go There!</button>
                  </div>
              </div>
          </div>
  
        <div class="modal modal-xl modal-fullscreen-md-down fade" id="modal-'. $destination->getId() .'" tabindex="-1" aria-labelledby="generalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content mx-auto">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="generalLabel">'. $destination->getLocation().'</h1>
              <h3 class="fw-bold mx-4">'. $destination->getCountry() .'</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
            <h3>We have found 3 offers!</h3>

            <div class="card bg-light w-75 my-4">
            <div class="card-body h-25">
              <div class="d-flex justify-content-center">
                <a href="" target="_blank">
                  <img src="./TOUR_OPERATOR_ICON/american.png" alt="comp" width="95" height="50">
                </a>
              </div>
              <h5 class="text-secondary text-center mt-2">
              American Airways
              </h5>
            </div>
          </div>

          <div class="card bg-light w-75 my-4">
          <div class="card-body h-25">
            <div class="d-flex justify-content-center">
              <a href="" target="_blank">
                <img src="./TOUR_OPERATOR_ICON/american.png" alt="comp" width="95" height="50">
              </a>
            </div>
            <h5 class="text-secondary text-center mt-2">
            American Airways
            </h5>
          </div>
        </div>

        <div class="card bg-light w-75 my-4">
        <div class="card-body h-25">
          <div class="d-flex justify-content-center">
            <a href="" target="_blank">
              <img src="./TOUR_OPERATOR_ICON/american.png" alt="comp" width="95" height="50">
            </a>
          </div>
          <h5 class="text-secondary text-center mt-2">
          American Airways
          </h5>
        </div>
      </div>

          </div>
          <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
          ';
          }
      }  


    // SHOW ALL DESTINATIONS ON CARD-DISPLAY END
?>

<!-- MORE BUTTON TO SHOW MORE -->
</div>
<a href="" style="text-decoration: none">
  <div class="d-flex justify-content-end text-center mb-5 align-items-center">
    <h4 class="text-light mx-2">More</h4>
     <img class="morebtn mb-2" src="./ICONS/left.png" alt="close" width="15" height="15">
  
  </div>
</a>
    </div>

  </div>
</section>

<!-- SECTION PARTNERS START -->

<section id="partners">
  
  <div class="container my-5">

    <div class="d-flex text-green">
      <h3 class="partners mx-3">Partners</h3>
        <a href="">
          <img id="loopcomp" class="mt-1" src="./ICONS/search-green.png" alt="loop" width="25" height="25">
        </a>
    </div>

    <form action="" method="get">
      <div id="showinput" class="d-flex">
      <input class="searchinputcomp w-75 rounded-1 font-italic" type="text" name="compsearchkey" placeholder=" Type a company...">
              <button class="searchinputcompbtn bg-transparent border-0" type="submit">
                <img class="mx-1" src="./ICONS/search-green.png" alt="loop" width="25" height="25">
              </button>
              <img class="closeupcomp mt-2" src="./ICONS/left-green.png" alt="close" width="12" height="12">
      </div>
    </form>

  <div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 my-5 d-flex flex-wrap justify-content-center">

    <!-- SEARCH FUNCTION -->

    <?php
      if(isset($_GET['compsearchkey'])){
        $manager = new Manager($db);
        $searchedCompanies = $manager->getSearchedCompanies($_GET['compsearchkey']);

        if(count($searchedCompanies) > 0) {
          foreach ($searchedCompanies as $searchedCompany) {
            echo '
            <div class="card bg-light w-75 my-4">
            <div class="card-body h-25">
              <div class="d-flex justify-content-center">
                <a href="' . $searchedCompany->getLink() . '" target="_blank">
                  <img src="./' . $searchedCompany->getIcon() . '" alt="comp" width="95" height="50">
                </a>
              </div>
              <h5 class="text-secondary text-center mt-2">
              ' . $searchedCompany->getName() . '
              </h5>
            </div>
          </div>
            ';

            echo "
            <script>
                window.onload = function() {
                    const scrollParam = '" . $_GET['compsearchkey'] . "';
                    if (scrollParam) {
                        const element = document.getElementById('partners');
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            </script>
        ";
          }
        }

        if(count($searchedCompanies) == 0){
          echo '
          <div class="text-green">No result found.</div>';
    
          echo ' 
            <script>  
            setTimeout(function() {
            window.location.href = "index.php";
            }, 3000);
            </script>'
            ;

            echo "
            <script>
                window.onload = function() {
                    const scrollParam = '" . $_GET['compsearchkey'] . "';
                    if (scrollParam) {
                        const element = document.getElementById('partners');
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            </script>
        ";
        }
      }

      if(!isset($_GET['compsearchkey'])){
        foreach ($companies as $company){
          echo '
          <div class="card bg-light w-75 my-4">
          <div class="card-body h-25">
            <div class="d-flex justify-content-center">
              <a href="' .$company->getLink() . '" target="_blank">
                <img src="./' . $company->getIcon() . '" alt="comp" width="95" height="50">
              </a>
            </div>
            <h5 class="text-secondary text-center mt-2">
            '. $company->getName() . '
            </h5>
          </div>
        </div>
          ';
        }
      }
    ?>
    </div>
  </div>
</div>

</section>

<!-- SECTION PARTNERS END -->


<script src="./JS/searchbutton.js"></script>
<script src="./JS/modal.js"></script>
<?php
    include_once('PARTIALS/bottom.php');
?>