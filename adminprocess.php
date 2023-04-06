<?php
require_once("./CONFIG/db.php");
require_once('./CONFIG/autoload.php');
$destination_id = $_POST['id'];
$location = $_POST['field1'];
$country = $_POST['field2'];
$price = $_POST['field3'];

// Mettre à jour la destination
$Manager = new Manager($db);
$Manager->updateDestination($destination_id, $location, $country, $price);