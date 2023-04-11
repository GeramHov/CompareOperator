<?php
session_start();
include_once('../CONFIG/db.php');
include_once('../CONFIG/autoload.php');

// ADDING THE PHOTO TO USER PROFILE


$manager = new Manager($db);
$manager->addUserPhoto($_GET['id'], $_GET['imgfile']);

$_SESSION['image'] = $_GET['imgfile'];

header('Location: ../profile.php');