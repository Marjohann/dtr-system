<?php 
if (session_status() == PHP_SESSION_NONE) {
session_start();
}


$user_type = $_SESSION['usertype'];
$user_id = $_SESSION['id'];


if($user_type == 'User'){
    header('location:../index.php');
}

if (!$user_id) {
    header('location:../index.php');
}


?>