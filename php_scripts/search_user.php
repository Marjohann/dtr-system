<?php
session_start();
$user_name='';
if (!isset($_SESSION['id'])) {
  header('location:../index.php');
}

$user_id = $_SESSION['id'];
include('../config/config.php');
//include('delete.php');

$get_user_sql = "SELECT * FROM user WHERE userId = :id";
$get_user_data = $con->prepare($get_user_sql);
$get_user_data->execute([':id'=>$user_id]);
while ($result = $get_user_data->fetch(PDO::FETCH_ASSOC)) {

  $user_name = $result['username'];
    
} 
$get_allusers_sql = "CALL spSearchUser($user_id) ";
$get_allusers_data = $con->prepare($get_allusers_sql);
$get_allusers_data->execute([]);

?>