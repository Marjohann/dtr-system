<?php
include('../../config/config.php');

if(isset($_POST['id'])){

    // $sql = "UPDATE dailytimerecord SET :stateno = :time WHERE Date = :id AND employeeNo = :empno";
    $sql = "CALL spUpdateSpecificRecord(:stateno,:time,:id,:empno)";
    $execute= $con->prepare($sql);
    $execute->execute([':stateno'   =>     $_POST['stateno'],
                        ':time'     =>     $_POST['time'],
                         ':id'      =>     $_POST['id'],
                        ':empno'    =>     $_POST['empno']
    
                        ]);


}

?>