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
    <link rel="stylesheet" href="SCSS/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body>
<section id="home">

  <!-- NAVBAR -->

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-5">
      <a class="navbar-brand text-light" href="index.php">
        <img class="logo" src="LOGO/logo.png" alt="Logo">
        <img class="logo logo-hover" src="./IMAGES/star.png" alt="Giantrock">
      </a>
      <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light mx-2" aria-current="page" href="index.php">
              <h5>Home</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light mx-2">
              <h5 id="partnersbtn">Partners</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-2 me-5" href="">
              <h5>Contact</h5>
            </a>
          </li>
          <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            echo '<li class="nav-item">
                <a class="nav-link text-light mx-2 me-5" href="admin.php?info=users">
                <h5>Admin Panel</h5>
                </a>
              </li>';
          }
          ?>

          <?php
          if (isset($_SESSION['id']) && $_SESSION['image'] == 'profilephoto.png') {
            echo '<li>
          <div class="user ms-5">
            <a href="">
              <img src="ICONS/shopping-cart.png" alt="purchasecard" width="30" height="30">
              <img id="reddot" class="mb-1" src="ICONS/red-dot.png" alt="purchasecard" width="7" height="7">
            </a>
          <a href="profile.php">
            <img class="mt-1 ms-2" src="ICONS/profile-user.png" alt="usericon" width="30" height="30" />
          </a>
          <li class="nav-item mt-2">
            <div class="dropdown">
              <a class="dropdown-toggle text-light mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="PROCESS/logout.php">LogOut</a></li>
              </ul>
            </div>
          </li>';
          } elseif (isset($_SESSION['id']) && $_SESSION['image'] != 'profilephoto.png') {
            echo '
      <li>
          <div class="user ms-5">
            <a href="">
              <img src="ICONS/shopping-cart.png" alt="purchasecard" width="30" height="30">
              <img id="reddot" class="mb-1" src="ICONS/red-dot.png" alt="purchasecard" width="7" height="7">
            </a>
      <a href="profile.php">
      <img class="mt-1 rounded-5 ms-2" src="USER_PHOTOS/' . $_SESSION['image'] . '" alt="usericon" width="40" height="40" />
    </a>
    <li class="nav-item mt-2">
      <div class="dropdown">
        <a class="dropdown-toggle text-light mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="PROCESS/logout.php">LogOut</a></li>
        </ul>
      </div>
    </li>';
          } else {
            echo '<li class="nav-item ">
            <a class="nav-link text-light mx-2" href="PHP/register.php">Sign Up</a>
          </li>
          <li class="nav-item ">
          <a href="PHP/login.php" class="btn text-light rounded-0">Login</a>
          </li>';
          }
          ?>
      </div>
      </li>
      </ul>
    </div>
    </div>
  </nav>

  <!-- MAIN PAGE -->

  <div class="container">


    <!-- SEARCH FORM START -->

    <form action="" method="get">
      <div id="showinput" class="d-flex">

        <!-- HIDDEN INPUT START -->
        <input class="searchinput w-75 rounded-1 font-italic" type="text" name="searchkey" placeholder=" Type a destination...">
        <button class="searchinputbtn bg-transparent border-0" type="submit">
          <img class="mx-1" src="ICONS/search.png" alt="loop" width="25" height="25">
        </button>
        <img class="closeup" src="ICONS/left.png" alt="close" width="12" height="12">

        <!-- HIDDEN INPUT END -->

        <!-- HEADER FOR DESTINATION WITH A LOOP TO EXPAND ONCLICK START -->
        <h3 class="destinations text-light mx-3">Destinations</h3>
        <a href="">
          <img id="loop" class="mt-1" src="ICONS/search.png" alt="loop" width="25" height="25">
        </a>

        <!-- HEADER FOR DESTINATION WITH A LOOP TO EXPAND ONCLICK END -->
      </div>
    </form>
    <!-- SEARCH FORM END -->


    <div class="row">
      <div class="col col-lg-12 col-md-12 col-sm-12 my-5 d-flex flex-wrap justify-content-center">

        <!-- SEARCH FUNCTION -->
<?php
  if (isset($_GET['searchkey'])) {
  $manager = new Manager($db);
  $searchedDestinations = $manager->getSearchedDestinations($_GET['searchkey']);

  // SHOW SEARCHED DESTINATIONS ON CARD-DISPLAY START
  if (count($searchedDestinations) > 0) {

  foreach ($searchedDestinations as $searchedDestination): ?>
  
  <div id="card" class="card rounded-0 border-0 m-4" style="width: 17rem; height: 25rem">
      <img class="rounded-0" src="<?= $searchedDestination->getImage() ?>" class="card-img-top" alt="city">
      <div class="card-body align-items-between">
        <h4 class="card-title text-center my-2"> <span><img src="<?= $searchedDestination->getFlag() ?> " alt="flag" width="30" height="30"> </span> <?= $searchedDestination->getLocation() ?> </h4>
        <h6 class="text-center my-4"> <?= $searchedDestination->getCountry() ?> </h6>
        <div class="text-center d-flex justify-content-center text-secondary">
          <div class="startingprice text-secondary mx-3">
            <p>From <span class="text-dark fw-bold"><?= $searchedDestination->getstartingPrice() ?> €</span> </p>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach; }?>

          <!-- SHOW NO RESULT FOUND WHEN NO MATCH + RELOAD THE PAGE AFTER 3 SECONDS -->
          <?php 
          
          if (count($searchedDestinations) == 0) {

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

        ?>

        <!-- SHOW SEARCHED DESTINATIONS ON CARD-DISPLAY END -->


        <!-- SHOW ALL DESTINATIONS ON CARD-DISPLAY START -->
<?php  if(!isset($_GET['searchkey'])){
foreach ($destinations as $destination) : ?>

    <div id="card" class="card rounded-0 border-0 m-4" style="width: 17rem; height: 25rem">
      <img class="rounded-0" src="<?= $destination->getImage() ?>" class="card-img-top" alt="city">
      <div class="card-body">
        <h4 class="card-title text-center my-2"> <span><img src="<?= $destination->getFlag() ?> " alt="flag" width="30" height="30"> </span> <?= $destination->getLocation() ?> </h4>
        <h6 class="text-center my-4"> <?= $destination->getCountry() ?> </h6>
        <div class="text-center d-flex justify-content-center text-secondary">
          <div class="startingprice text-secondary mx-3">
            <p>From <span class="text-dark fw-bold"><?= $destination->getstartingPrice() ?> €</span> </p>
          </div>

        </div>
        <div class="text-center my-2">
          <button class="btn text-light rounded-0" data-bs-toggle="modal" data-bs-target="#modal-<?= $destination->getId() ?>">Go There!</button>
        </div>
      </div>
    </div>

    <?php $offers = $destination->getOffers(); ?>


    <div class="modal modal-xl modal-fullscreen-md-down fade" id="modal-<?= $destination->getId() ?>" tabindex="-1" aria-labelledby="generalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content mx-auto">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="generalLabel"><?= $destination->getLocation() ?></h1>
            <h3 class="fw-bold mx-4"><?= $destination->getCountry() ?></h3>
            <img class="mb-1" src="<?= $destination->getFlag() ?> " alt="flag" width="30" height="30">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h4>We have found 3 offers!</h4>
            <?php foreach ($offers as $offer) : ?>
              <div class="d-flex">
                
                  <div class="card bg-light w-75 my-3">
                    <div class="d-flex">
                      <div class="card-body h-25">
                        <div class="d-flex justify-content-center align-items-center">
                          <a href="" target="_blank">
                            <img src="./<?= $offer['tour_operator_icon'] ?>" alt="comp" width="95" height="50">
                          </a>
                        </div>
                        <h5 class="text-secondary text-center mt-2">
                          <?= $offer['tour_operator_name'] ?>
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="flex-column align-items-center py-4">
                    <div class="d-flex justify-content-center align-items-center mx-4">
                      <img class="mx-2 mb-1" src="./ICONS/plane.png" alt="plane" width="45" height="45">
                      <p class="text-secondary mx-3">Price:</p>
                      <h3 class="text-green fw-bold pb-2"><?= $offer['price'] ?> <span>€</span> </h3>
                    </div>
                    <div class="d-flex justify-content-center mb-4 mt-2">
                      <a class="addcart" href="">
                        <img src="./ICONS/shopping-card-black.png" alt="buy" width="30" height="30">
                      </a>
                    </div>
                    <div class="rate mx-5">
                      <form action="<?php
                      if(isset($_SESSION['id'])){
                        echo './PROCESS/addcomment.php';
                      }
                      ?>
                      " method="post">
                        <span class="star-cb-group">
                        <input type="radio" id="rating-5" name="note" value="5" /><label for="rating-5">5</label>
                        <input type="radio" id="rating-4" name="note" value="4" /><label for="rating-4">4</label>
                        <input type="radio" id="rating-3" name="note" value="3" /><label for="rating-3">3</label>
                        <input type="radio" id="rating-2" name="note" value="2" /><label for="rating-2">2</label>
                        <input type="radio" id="rating-1" name="note" value="1" /><label for="rating-1">1</label>
                        <input type="radio" id="rating-0" name="note" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                        </span>
                    </div>

                  </div>


                </div>
                    <div id="commentbox" class="form-floating mb-4 d-flex">
                      <input type="hidden" name="tour_operator_name" value="<?= $offer['tour_operator_name'] ?>">
                      <input type="hidden" name="user_id" value="
                        <?php 
                          if(isset($_SESSION['id'])){
                            echo $_SESSION['id'];
                          }
                        ?>">
                      <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                      <label class="text-secondary" for="floatingTextarea">Comments</label>
                      <button class="btn text-light mx-1 rounded-0" type="submit">Send</button>
                    </div>
                  </form>
            <?php endforeach; ?>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach; }?>

      <!-- MORE BUTTON TO SHOW MORE -->
    </div>
    <a href="" style="text-decoration: none">
      <div class="d-flex justify-content-end text-center mb-5 align-items-center">
        <h4 class="text-light mx-2">More</h4>
        <img class="morebtn mb-2" src="./ICONS/left.png" alt="close" width="15" height="15">

      </div>
    </a>

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
        if (isset($_GET['compsearchkey'])) {
          $manager = new Manager($db);
          $searchedCompanies = $manager->getSearchedCompanies($_GET['compsearchkey']);
        ?>  
        <?php
          if (count($searchedCompanies) > 0) {
            foreach ($searchedCompanies as $searchedCompany): ?>

            <div class="card bg-light w-75 my-4">
            <div class="card-body h-25">
              <div class="d-flex justify-content-center">
                <a href="<?= $searchedCompany->getLink() ?>" target="_blank">
                  <img src="./<?= $searchedCompany->getIcon() ?>" alt="comp" width="95" height="50">
                </a>
              </div>
              <h5 class="text-secondary text-center mt-2">
              <?= $searchedCompany->getName() ?>
              </h5>
            </div>
          </div>

            <script>
                window.onload = function() {
                    const scrollParam = '<?= $_GET['compsearchkey'] ?>';
                    if (scrollParam) {
                        const element = document.getElementById('partners');
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            </script>
       
        <?php endforeach ?>
        <?php } ?>  

          <?php if (count($searchedCompanies) == 0) { ?>

          <div class="text-green">No result found.</div>

            <script>  
            setTimeout(function() {
            window.location.href = "index.php";
            }, 3000);
            </script>

            <script>
                window.onload = function() {
                    const scrollParam = '<?= $_GET['compsearchkey'] ?>';
                    if (scrollParam) {
                        const element = document.getElementById('partners');
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            </script>

        <?php } ?>
        <?php } ?>  

        <?php if (!isset($_GET['compsearchkey'])) { ?>
          <?php foreach ($companies as $company) : ?>
           
          <div class="card bg-light w-75 my-4">
          <div class="card-body h-25">
            <div class="d-flex justify-content-center">
              <a href="<?= $company->getLink() ?>" target="_blank">
                <img src="./<?= $company->getIcon() ?>" alt="comp" width="95" height="50">
              </a>
            </div>
            <h5 class="text-secondary text-center mt-2">
            <?= $company->getName() ?>
            </h5>
          </div>
          <div id="showfeedbackbtn" class="text-center text-secondary" style="cursor: pointer">
              See feedbacks
              <img src="./ICONS/down-arrow.png" alt="downarrow" width="20" height="20"/>
          </div>
            <?php
             // REQUEST THE METHOD TO SHOW FEEDBACKS BY A COMPANY
              $manager = new Manager($db);
              $feedbacks = $manager->getFeedbacksByCompanyName($company->getName()); 

              
              
              foreach ($feedbacks as $feedback): ?>
                <?php 
                // REQUEST THE METHOD TO SHOW USER INFO BY HIS ID
                 $manager = new Manager($db);
                 $users = $manager->getUserByHisId($feedback->getUserId()) ?>
              <div id="feedback" class="mt-2">
                  <div class="d-flex justify-content-between my-2 px-5">
                      <?php foreach ($users as $user) : ?>
                        <div class="d-flex">
                          <img class="rounded-5" src="./USER_PHOTOS/<?= $user->getImage()?>" alt="userphoto" width="35" height="35">
                          <h6 class="text-secondary mx-3 mt-2"><?= $user->getFirstName() ?>  <?= $user->getLastName() ?> :</h6>
                        </div>
                        <?php endforeach ?>
                      <q class="mx-4"><i><?= $feedback->getMessage() ?></i></q>
                      <h5 class="text-secondary"><?= $feedback->getNote() ?></h5>
                  </div>
              </div>
            <?php endforeach ?>
        </div>

        <?php endforeach ?>
        <?php } ?>
        
      </div>
    </div>
  </div>

</section>
<section id="footer" class="text-light text-center d-flex justify-content-center align-items-center">
    Gueram &copy 2023
</section>

<!-- SECTION PARTNERS END -->

<script src="./JS/note.js"></script>
<script src="./JS/showfeedback.js"></script>
<script src="./JS/searchbutton.js"></script>
<script src="./JS/modal.js"></script>
<script src="./JS/scrolltoview.js"></script>
<?php
include_once('PARTIALS/bottom.php');
?>