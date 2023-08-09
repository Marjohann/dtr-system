<?php
include('../../config/config.php');

if(isset($_POST['worksched'])){

    $worksched = $_POST['worksched'];
    $workdesc   =   $_POST['workdesc'];
    $remarks =  $_POST['remarks'];
    $status = $_POST['status'];

    $sql = "UPDATE workschedule SET
            workScheduleDescription = :workdesc,
            remarks =   :remarks,
            status  =   :status
            WHERE workScheduleId    =   :worksched";

   $prepareStmt=    $con->prepare($sql);
   $prepareStmt->execute([
    ':worksched'    =>  $worksched,
    ':workdesc'    =>  $workdesc,
    ':remarks'    =>  $remarks,
    ':status'    =>  $status

   ]);         


}

?>