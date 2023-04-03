<?php
session_start();
include "./CONFIG/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nom = $_POST['nom'] ?? '';
	$prenom = $_POST['prenom'] ?? '';
	$email = $_POST['email'] ?? '';
	$pseudo = $_POST['pseudo'] ?? '';
	$password = $_POST['password'] ?? '';
	$passwordConf = $_POST['passconf'] ?? '';

	$erreur = "";
	if (empty($nom)) {
		$erreur = "Le champ nom est obligatoire!";
	} elseif (empty($prenom)) {
		$erreur = "Le champ prénom est obligatoire!";
	} elseif (empty($email)) {
		$erreur = "Le champ email est obligatoire!";
	} elseif (empty($pseudo)) {
		$erreur = "Le champ Pseudo est obligatoire!";
	} elseif (empty($password)) {
		$erreur = "Le champ mot de passe est obligatoire!";
	} elseif ($password != $passwordConf) {
		$erreur = "Mots de passe différents!";
	} else {
		$verify_email = $db->prepare("select id from users where email=? limit 1");
		$verify_email->execute(array($email));
		$user_email = $verify_email->fetchAll();
		if (count($user_email) > 0) {
			$erreur = "Email existe déjà!";
		} else {
			$ins = $db->prepare("insert into users(nom,prenom,email,pseudo,password) values(?,?,?,?,?)");
			if ($ins->execute(array($nom, $prenom, $email, $pseudo, md5($password)))) {
				header("location:index.php");
			}
		}
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body class="h-screen overflow-hidden d-flex align-items-center justify-content-center" style="background: #d8f3dc;">
	<div class="py-4 w-100 w-md-50">
		<div class="card shadow-lg">
			<div class="row g-0">
				<div class="col-md-6 bg-cover" style="background-image: url('./plage.jpg')"></div>
				<div class="col-md-6">
					<div class="card-body p-md-5">
						<div class="d-flex justify-content-center">
							<img class="flex rounded-md items-center mb-2" src="./LOGO/logo.png" alt="logo">
						</div>
						<form name="fo" method="post" action="">
							<div class="mb-3">
								<label for="email" class="form-label">Email Address</label>
								<input type="email" id="email" name="email" value="" class="form-control">
							</div>
							<div class="mb-3">
								<label for="nom" class="form-label">Nom</label>
								<input type="text" id="nom" name="nom" value="" class="form-control">
							</div>
							<div class="mb-3">
								<label for="prenom" class="form-label">Prénom</label>
								<input type="text" id="prenom" name="prenom" value="" class="form-control">
							</div>
							<div class="mb-3">
								<label for="pseudo" class="form-label">Pseudo</label>
								<input type="text" id="pseudo" name="pseudo" value="" class="form-control">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" id="password" name="password" class="form-control">
							</div>
							<div class="mb-3">
								<label for="passconf" class="form-label">Confirm Password</label>
								<input type="password" id="passconf" name="passconf" class="form-control">
							</div>
							<div class="mb-3">
								<button type="submit" value="Save" name="save"
									class="btn btn-primary w-100">REGISTER</button>
							</div>
							<div class="d-flex justify-content-center">
								<span class="border-bottom w-25 my-3"></span>
								<p class="text-muted mx-3 mb-0">or login</p>
								<span class="border-bottom w-25 my-3"></span>
							</div>
							<div class="mb-3">
								<a href="./login.php" class="text-muted text-uppercase">Login</a>
							</div>
						</form>