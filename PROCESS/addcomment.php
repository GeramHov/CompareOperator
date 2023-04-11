<?php
session_start();
include_once('../CONFIG/db.php');
include_once('../CONFIG/autoload.php');

if(isset($_POST['message']) && isset($_POST['tour_operator_name']) && isset($_POST['user_id'])) {
    $manager = new Manager($db);
    $manager->addFeedback($_POST['message'], $_POST['note'], $_POST['tour_operator_name'], $_POST['user_id']);
    header('Location: ../index.php');
}

