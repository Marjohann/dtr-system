<?php
  include('../config/config.php');

  $alert_msg = '';     

  $btnNew = 'disabled';
  if(!isset($_SESSION['id'])) {
    header('location:../index');
  }
    $user_id = $_SESSION['id']; 
  //if button insert clicked

  if (isset($_POST['insert'])) {
    $idno = $_POST['id_no'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $account_type=$_POST['account_type'];
  

    $insert_user_stmt = "CALL spInsertUser(
    :idno,
     :uname,
      :upass,
     :fname,
     :lname,
    :account_type)";
  
  $set_insert_stmt = $con->prepare($insert_user_stmt);
  $set_insert_stmt->execute([
   ':idno' => $idno,
   ':uname' =>$uname,
   ':upass' => $upass,
   ':fname' => $fname,
   ':lname' => $lname,
   ':account_type' =>$account_type

  ]);
  $alert_msg .= ' 
  <div class="new-alert new-alert-success alert-dismissible">
      <i class="icon fa fa-success"></i>
      Data Inserted
  </div>     
';
$btnStatus = 'disabled';
$btnNew = 'enabled';
  }
    ?>