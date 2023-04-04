<?php
    session_start();
    include_once "../CONFIG/db.php";

    if (isset($_POST["login"])) {
         $email = $_POST["email"];
         $password = $_POST["password"];
         $passDecrypt = md5($password); // DECRYPT USER PASSWORD
    
         $verify = $db->prepare("SELECT * FROM users WHERE email=? AND password=? limit 1");
         $verify->execute(array($email, $passDecrypt));
         $user = $verify->fetch(PDO::FETCH_ASSOC);
         if ($user) {
    
              $_SESSION["firstname"] = ucfirst(strtolower($user["firstname"]));
              $_SESSION["lastname"] = ucfirst(strtolower($user["lastname"]));
              $_SESSION["id"] = $user["id"];
              $_SESSION["email"] = $user["email"];
              $_SESSION["admin"] = $user["admin"];
    
              header("location: ../index.php");
              exit; // STOP EXECUTION WHEN REDIRECTED
         } else {
               
               header("location: ../PHP/login.php");
              $_SESSION['error'] = "Login or password incorrect!";
         }
    }
?>