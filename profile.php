<?php
    session_start();
    include_once('./PARTIALS/header.php');
?>

    <section style="background-color: #eee;">
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid mx-5">
    <a class="navbar-brand text-dark" href="../index.php">
        <img class="logo" src="../LOGO/logo.png" alt="Logo">
        <img class="logo logo-hover" src="./IMAGES/star.png" alt="Giant rock">
      </a>
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" aria-current="page" href="../index.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" href="#"><h5>Features</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark mx-2" href="#"><h5>Pricing</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark ms-2 me-5" href=""><h5>Disabled</h5></a>
        </li>
        <li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">


            <div class="row vh-100">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">
                                <!-- <?php $_SESSION["name"] ?> --> Test
                            </h5>
                            <p class="text-muted mb-1">Lorem</p>
                            <p class="text-muted mb-4">Lorem ipsum dolor sit
                            </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Bouton</button>
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item justify-content-center align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0 text-center">Last Destinations</p>
                                </li>


                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="flag">&#x1F1F2;&#x1F1FD;</i>
                                    <p class="mb-0">Mexicoooo</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="flag">&#x1F1F2;&#x1F1FD;</i>
                                    <p class="mb-0">Mexicoooo</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="flag">&#x1F1F2;&#x1F1FD;</i>
                                    <p class="mb-0">Mexicoooo</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="flag">&#x1F1F2;&#x1F1FD;</i>
                                    <p class="mb-0">Mexicoooo</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Johnatan Smith</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">example@example.com</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Card to
                                        be designed
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Card

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
    include_once('./PARTIALS/bottom.php');
?>