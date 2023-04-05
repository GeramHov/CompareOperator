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

<div>
    TEST MODAL
<div class="main">
            <h3>We have found 3 offers!</h3>

            <div class="d-flex flex-column aling-items-center">
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
            <div class="d-flex">
                <p class="text-secondary">Price:</p>
                <h5 class="text-green fw-bold">799 <span>€</span> </h5>

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








</div>