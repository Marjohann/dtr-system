<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_type = $_SESSION['usertype'];

if($user_type == 'User'){
    header('location:dailytimerecord.php');
}

?>