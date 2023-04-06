<?php
session_start();
include_once('../CONFIG/db.php');
include_once('../CONFIG/autoload.php');

// USING MANAGER UPDATE USER METHOD

$manager = new Manager($db);
$manager->UpdateUserInformation($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['admin'], $_POST['email'], $_POST['password'], $_POST['image']);

$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['email'] = $_POST['email'];


header('Location: ../profile.php');