<?php
session_start();

include_once "../CONFIG/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['passconfirm'];

	if ($password === $confirmPassword) {

		$emailCheck = $db->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
		$emailCheck->execute(array($email));
		$userEmail = $emailCheck->fetchAll();

		if (count($userEmail) > 0) {
			header("Location: ../PHP/register.php");
			$_SESSION['error'] = "E-mail exists already!";
		} else {
			$query = $db->prepare("INSERT INTO users(firstname,lastname,email,password, created_at) VALUES (?,?,?,?, NOW())");
			if ($query->execute(array($firstname, $lastname, $email, md5($password)))) {
				header("location: ../index.php");
			}
		}
	} else {
		header("location: ../PHP/register.php");
		echo $_SESSION['message'] = 'Password must be the same!';
	}

}
?>