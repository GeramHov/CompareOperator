<?php
    session_start();
    include_once('./PARTIALS/header.php');
?>

<section id="passreset">
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
          <a class="nav-link text-light ms-2 me-5" href=""><h5>Disabled</h5></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container pb-5 w-50 my-5">
               <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-10 col-xl-9">
                         <div class="card rounded-3" style="box-shadow: 0 0 0 transparent;">
                              <div class="row g-0">
                                   <div class="col-lg-12 d-flex align-items-center">
                                        <div class="card-body p-4 p-lg-5 text-black">
                                             
                                             <form method="post" action="">
                                                  <p>Confirm Your E-mail address</p>

                                                  <div class="form-outline mb-4">
                                                       <input type="email" id="form2Example11" class="form-control"
                                                            placeholder="Email Address" name="email" />
                                                  </div>

                                                  <div class="form-outline mb-4">
                                                       <input type="password" id="form2Example22" class="form-control"
                                                            placeholder="Password" name="password" />
                                                  </div>

                                                  <div class="text-center pt-1 mb-5 pb-1">
                                                       <button
                                                            class="log btn text-light btn-block fa-lg gradient-custom-2 mb-3 pb-1 pt-1 rounded-0"
                                                            type="submit" name="login" value="Login"
                                                            style="outline: none;">Log in</button>
                                                       <br>
                                                       <a class="text-muted" href="#">Forgot password?</a>
                                                  </div>

                                                  <div class="d-flex align-items-center justify-content-center pb-4">
                                                       <p class="mb-0 me-2">Don't have an account?</p>
                                                       <a href="../PHP/register.php" class="btn text-light rounded-0">Sign
                                                            up</a>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
    </section>






<?php
    include_once('./PARTIALS/bottom.php');
?>

