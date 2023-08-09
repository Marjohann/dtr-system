<?php
include('../config/config.php');
$alert_msg= '';
$worksched='';

 if(isset($_POST['add'])){
    $empno  =   $_POST['emp_no'];
    $lastname = $_POST['lastname'];
    $firstname  = $_POST['firstname'];
    $middlename =$_POST['middlename'];
    $bpin   =$_POST['bpin'];
    $department =$_POST['department'];
    $emp_type =$_POST['emp_type'];
    $status = $_POST['status'];


    $insert_user_stmt = "CALL spInsertEmployee(
        :empno,
         :firstname,
          :middlename,
         :lastname,
         :bpin,
        :department,
        :worksched,
         :emp_type,
        :status)";
      
      $set_insert_stmt = $con->prepare($insert_user_stmt);
      $set_insert_stmt->execute([
        ':empno' => $empno,
        ':firstname' => $firstname,
        ':middlename' => $middlename,
        ':lastname' => $lastname,
        ':bpin' => $bpin,
        ':department' => $department,
        ':worksched' => $worksched,
           ':emp_type' => $emp_type,
        ':status' => $status

       
    
      ]);
      $btnStatus = 'disabled';
    $btnNew = 'enabled';
     
     $alert_msg .= ' 
      <div class="new-alert new-alert-success alert-dismissible">
          <i class="icon fa fa-success"></i>
          Data Inserted
      </div>     
    ';
    }
      
   

?>