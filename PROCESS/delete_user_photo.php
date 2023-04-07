<?php
session_start();
include_once('../CONFIG/db.php');
include_once('../CONFIG/autoload.php');

// DELETING THE USER PHOTO

$manager = new Manager($db);
$manager->deleteUserPhoto($_GET['id']);

$_SESSION['image'] = 'profilephoto.png';

header('Location: ../profile.php');