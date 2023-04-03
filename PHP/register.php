<?php
session_start();
include "../CONFIG/db.php";
$erreur = "";

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

<body>
	<section class="vh-100 gradient-custom-2">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-lg-10 col-xl-9">
					<div class="card rounded-3" style="box-shadow: 0 0 0 transparent;">
						<div class="row g-0">
							<div class="col-lg-6 d-flex align-items-center">
								<div class="card-body p-4 p-lg-5 text-black">
									<div class="text-center">
										<img src="./LOGO/logo.png" class="pb-2" style="width: 50%;" alt="logo">
										<h4 class="mt-1 mb-5 pb-1">We are The Compar Team</h4>
									</div>

									<div class="erreur">
										<?php echo $erreur ?>
									</div>

									<form name="fo" method="post" action="">

										<div class="form-outline mb-2">
											<input type="email" id="email" class="form-control" value=""
												placeholder="Email Address" name="email" />
										</div>

										<div class="form-outline mb-2">
											<input type="text" id="nom" class="form-control" placeholder="Name"
												name="nom" />
										</div>
										<div class="form-outline mb-2">
											<input type="text" id="prenom" class="form-control" placeholder="Firstname"
												name="prenom" />
										</div>
										<div class="form-outline mb-2">
											<input type="text" id="pseudo" class="form-control" placeholder="Username"
												name="pseudo" value="" />
										</div>

										<div class="form-outline mb-2">
											<input type="password" id="form2Example22" class="form-control"
												placeholder="Password" name="password" />
										</div>
										<div class="form-outline mb-2">
											<input type="password" id="passconf" class="form-control"
												placeholder="Password Verification" name="passconf" />
										</div>
										<div class="text-center pt-1 mb-5 pb-1">
											<button
												class="log btn text-light btn-block fa-lg gradient-custom-2 mb-3 pb-1 pt-1"
												type="submit" name="save" value="Save" style="outline: none;">Sign
												Up</button>
											<br>
											<a class="text-muted" href="#">Forgot password?</a>
										</div>

										<div class="d-flex align-items-center justify-content-center pb-4">
											<p class="mb-0 me-2">Already Signed up?</p>
											<a href="./register.php" class="btn btn-outline-danger">Log into your
												account</a>
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