<?php
include('../../config/config.php');

if(isset($_POST['dept'])){

    $dept = $_POST['dept']; 
    $supervisor = $_POST['supervisor'];
    $emp_status = $_POST['empstatus'];

    $callUpdateSupervisor = "CALL spUpdateSupervisor(:dept,:supervisor,:emp_status)";
    $execute = $con->prepare($callUpdateSupervisor);
    $execute->execute([
        ':dept' =>  $dept,
        ':supervisor'  =>$supervisor,
        ':emp_status'  =>$emp_status
    ]);

    echo "Update successful.";
}



?>