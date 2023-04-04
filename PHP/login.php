<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="../LOGO/favicon.ico" sizes="16x16" type="image/png">
     <title>CompareOperator</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="../SCSS/style.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
     <section class="gradient-custom-2">

          <nav class="navbar navbar-expand-lg p-0">
               <div class="container-fluid mx-5">
                    <img class="logo" src="../LOGO/logo.png" alt=" Logo">
                    <img class="logo logo-hover" src="../IMAGES/star.png" alt="Giant rock">
                    </a>
          </nav>

          <div class="container pb-5 h-100">
               <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-10 col-xl-9">
                         <div class="card rounded-3" style="box-shadow: 0 0 0 transparent;">
                              <div class="row g-0">
                                   <div class="col-lg-6 d-flex align-items-center">
                                        <div class="card-body p-4 p-lg-5 text-black">
                                             <div class="text-center">
                                                  <img src="../LOGO/logo.png" class="pb-2" style="width: 50%;"
                                                       alt="logo">
                                                  <h4 class="mt-1 mb-5 pb-1">We are The Compare Team</h4>
                                             </div>

                                             <div class="erreur text-danger">
                                                  <?php
                                                  if (isset($_SESSION['error'])) {
                                                       echo $_SESSION['error'];
                                                       session_unset();
                                                  }
                                                  ?>
                                             </div>

                                             <form method="post" action="../PROCESS/login.php">
                                                  <p>Please login to your account</p>

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
                                                       <a href="../PHP/register.php"
                                                            class="btn text-light rounded-0">Sign
                                                            up</a>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                             <h4 class="mb-4">We are more than just a company</h4>
                                             <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                  elit,
                                                  sed do eiusmod
                                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                  veniam, quis nostrud
                                                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                             </p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

</body>
<?php
include_once('../PARTIALS/bottom.php');
?>

</html>