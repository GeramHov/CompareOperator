<?php
    session_start();
    include_once('./PARTIALS/header.php');
    include_once('./CONFIG/db.php');
    include_once('./CONFIG/autoload.php');

// REQUEST THE METHOD TO SHOW ALL DESTINATIONS
$manager = new Manager($db);
$destinations = $manager->getAllDestinations();

if(isset($_FILES['imgfile'])) {
    $image = $_FILES['imgfile']['name'];

    move_uploaded_file($_FILES['imgfile']['tmp_name'], './USER_PHOTOS/' . $image);

  }


?>
    <link rel="stylesheet" href="SCSS/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body>

<section id="profile">
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid mx-5">
    <a class="navbar-brand text-black" href="./index.php">
        <img class="logo" src="./LOGO/logo.png" alt="Logo">
        <img class="logo logo-hover" src="./IMAGES/star.png" alt="Giant rock">
      </a>
    <button class="navbar-toggler text-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-black mx-2" aria-current="page" href="../index.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black mx-2" href="#"><h5>Partners</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black mx-2" href="#"><h5>Pricing</h5></a>
        </li>
        <div class="user ms-5">
            <a href="">
              <img class="mt-1" src="ICONS/shopping-card-black.png" alt="purchasecard" width="30" height="30">
              <img id="reddot" class="mb-1" src="ICONS/red-dot.png" alt="purchasecard" width="7" height="7">
            </a>
        </div>    
        <li>
        <li class="nav-item ">
          <a href="./PROCESS/logout.php" class="btn text-light rounded-0">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="./USER_PHOTOS/<?php echo $_SESSION['image']?>"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> <br>

                                <?php 
                                    if($_SESSION['image'] == 'profilephoto.png'){
                                        echo '
                                        <form action="./PROCESS/add_user_photo.php" method="get" enctype="multipart/form-data"> 

                                        <input type="file" id="userphoto" name="imgfile" accept="image/png, image/jpeg" style="display: none" required>
                                        <input type="hidden" name="id" value="'. $_SESSION['id']. '" class="form-control">
        
                                        <img id="plusbtn" class="my-2" src="ICONS/add.png" alt="add" width="25" height="25" style="cursor:pointer">
                                        <button type="submit" style="background: transparent; border:none" >
                                        <i>Click to add Your photo</i>
                                        </button> 
                                        
                                        </form>
                                        '; 
                                        
                                        } else {
                                            echo '
                                            <form action="./PROCESS/delete_user_photo.php" method="get"> 

                                            <button type="submit" name="id" value="'. $_SESSION['id'] .'"style="background: transparent; border:none" >
                                                <img class="my-2" src="ICONS/delete.png" alt="add" width="20" height="20" style="cursor:pointer"> Delete
                                            </button> 
                                            
                                            </form> 
                                            ';
                                        }
                                    
                                ?>
                                


                            <h5 class="my-3">
                                <?php echo $_SESSION["firstname"] .' '. $_SESSION["lastname"] ?>
                            </h5>
                            <p class="text-muted mb-2">
                                <?php 
                                    if($_SESSION['admin'] == 0){
                                        echo 'User';
                                    } else {
                                        echo 'Administrator';
                                    }
                                ?>
                            </p>
                            <p class="text-muted mb-4">
                                <?php echo 'E-mail: ' . $_SESSION['email'] ;?>
                            </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button id="showcomments" type="button" class="btn text-light rounded-0">My Comments</button>
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
                                        <?php 
                                            $count = 0;
                                            foreach ($destinations as $destination) {
                                                if ($count >= 4) {
                                                    break;
                                                }
                                                echo '
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <img src="'. $destination->getFlag() .'" alt="" width="40" height="40">
                                                        <p class="mb-0">
                                                            '. $destination->getLocation() .'
                                                        </p>
                                                    </li>
                                                ';
                                                $count++;
                                            }
                                        ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                Change Your account informations
                            </div>
<form action="./PROCESS/update_user.php" method="post">

<div class="input-group mb-3">
    <label class="me-3 mt-1" for="basic-url">Firstname</label>
  <input type="text" name="firstname" class="form-control" placeholder="<?php echo $_SESSION['firstname']?>" aria-label="Firstname" aria-describedby="firstname" required>
</div>

<div class="input-group mb-3">
<label class="me-3 mt-1" for="basic-url">Lastname</label>
<input type="text" name="lastname" class="form-control" placeholder="<?php echo $_SESSION['lastname']?>" aria-label="Lastname" aria-describedby="lastname" required>
</div>

<div class="input-group mb-3">
<label class="me-3 mt-1" for="basic-url">E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="email" name="email" class="form-control" placeholder="<?php echo $_SESSION['email']?>" aria-label="email" aria-describedby="email" required>
</div>

<input type="hidden" name="id" value="<?php echo $_SESSION['id']?>" class="form-control">
<input type="hidden" name="admin" value="<?php echo $_SESSION['admin']?>" class="form-control">
<input type="hidden" name="password" value="<?php echo $_SESSION['password']?>" class="form-control">
<input type="hidden" name="image" value="<?php echo $_SESSION['image']?>" class="form-control">

                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" class="btn text-light rounded-0">Update</button>
                    </div>

</form>

                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="./JS/addphoto.js"></script>
    <?php
    include_once('./PARTIALS/bottom.php');
?>