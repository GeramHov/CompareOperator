<?php
session_start();
include "./CONFIG/db.php";

$erreur = "";
if (isset($_POST["login"])) {
     $email = $_POST["email"];
     $password = $_POST["password"];
     $pass_crypt = md5($password); // cryptage du mot de passe avec md5

     $verify = $db->prepare("select * from users where email=? and password=? limit 1");
     $verify->execute(array($email, $pass_crypt));
     $user = $verify->fetch(PDO::FETCH_ASSOC);
     if ($user) {
          $_SESSION["prenom_nom"] = ucfirst(strtolower($user["prenom"])) .
               " " . strtoupper($user["nom"]);
          $_SESSION["connecter"] = "yes";
          $_SESSION["id"] = $user["id"];
          $_SESSION["email"] = $user["email"];
          $_SESSION["admin"] = $user["admin"];
          $_SESSION["pseudo"] = $user["pseudo"];
          $_SESSION["nom"] = $user["nom"];
          $_SESSION["prenom"] = $user["prenom"];
          header("location:index.php");
          exit; // arrêter l'exécution du script après la redirection
     } else {
          $erreur = "Mauvais login ou mot de passe!";
     }
}

?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="style.css">
</head>


<body class="bg-white dark:bg-gray-900 overflow-hidden d-flex align-items-center justify-content-center">

     <div class="py-6">
          <div class="row bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">

               <div class="d-none d-lg-block col-lg-6 bg-cover" style="background-image:url('./plage.jpg')"></div>

               <div class="bg-white dark:bg-gray-900 col-12 col-lg-6 p-5">

                    <div class="mx-auto">
                         <img class="d-flex rounded-md align-items-center w-100 mb-5" src="./LOGO/logo.png" alt="">

                         <div class="erreur">
                              <?php echo $erreur ?>
                         </div>

                         <form method="post" action="">
                              <div class="mt-4">
                                   <label class="form-label text-gray-700 dark:text-white text-sm font-bold mb-2"
                                        for="email">Email Address</label>
                                   <input type="email" id="email" name="email"
                                        class="form-control bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                        type="email">
                              </div>

                              <div class="mt-4">
                                   <div class="d-flex justify-content-between">
                                        <label class="form-label text-gray-700 dark:text-white text-sm font-bold mb-2"
                                             for="password">Password</label>

                                        <a href="#" class="text-xs text-gray-500 dark:text-white">Forget
                                             Password?</a>
                                   </div>

                                   <input type="password" id="password" name="password"
                                        class="form-control bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none">
                              </div>

                              <div class="mt-8">
                                   <button class="btn btn-primary w-100 py-2 px-4 font-bold rounded hover:bg-gray-600"
                                        type="submit" name="login" value="Login">Login
                                   </button>
                              </div>
                         </form>

                         <div class="mt-4 d-flex align-items-center justify-content-between">
                              <span class="border-bottom w-1/5 md:w-1/4"></span>
                              <a href="./register.php" class="text-xs text-gray-500 text-uppercase dark:text-white">or
                                   sign
                                   up</a>
                              <span class="border-bottom w-1/5 md:w-1/4"></span>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</body>

</html>                        <form method="post" action="">
                              <div class="mt-4">
                                   <label class="form-label text-gray-700 dark:text-white text-sm font-bold mb-2"
                                        for="email">Email Address</label>
                                   <input type="email" id="email" name="email"
                                        class="form-control bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                        type="email">
                              </div>

                              <div class="mt-4">
                                   <div class="d-flex justify-content-between">
                                        <label class="form-label text-gray-700 dark:text-white text-sm font-bold mb-2"
                                             for="password">Password</label>

                                        <a href="#" class="text-xs text-gray-500 dark:text-white">Forget
                                             Password?</a>
                                   </div>

                                   <input type="password" id="password" name="password"
                                        class="form-control bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none">
                              </div>

                              <div class="mt-8">
                                   <button class="btn btn-primary w-100 py-2 px-4 font-bold rounded hover:bg-gray-600"
                                        type="submit" name="login" value="Login">Login
                                   </button>
                              </div>
                         </form>

                         <div class="mt-4 d-flex align-items-center justify-content-between">
                              <span class="border-bottom w-1/5 md:w-1/4"></span>
                              <a href="./register.php" class="text-xs text-gray-500 text-uppercase dark:text-white">or
                                   sign
                                   up</a>
                              <span class="border-bottom w-1/5 md:w-1/4"></span>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</body>

</html>