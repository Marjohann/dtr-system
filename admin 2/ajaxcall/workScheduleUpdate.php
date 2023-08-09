<?php
include('../../config/config.php');

if(isset($_POST['worksched'])){

    $workschedid = $_POST['worksched'];
    $day = $_POST['day'];
    $timeIn = $_POST['timeIn'];
    $breakOut = $_POST['breakOut'];
    $breakIn = $_POST['breakIn'];
    $timeOut = $_POST['timeOut'];
    
    $sql    =   "CALL spUpdateWorkSchedDetails(
                    :workschedid,
                    :daycode,
                    :inAM,
                    :outAM,
                    :inPM, 
                    :outPM)";
    $prepare_stmt = $con->prepare($sql);
    $prepare_stmt->execute([
        ':inAM' =>  $timeIn,
        ':outAM' =>  $breakOut,
        ':inPM' =>  $breakIn,
        ':outPM' =>  $timeOut,
        ':workschedid' =>  $workschedid,
        ':daycode' =>  $day

    ]);


}

?>