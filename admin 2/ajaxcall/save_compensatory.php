<?php
if(isset($_POST['compen'])){
    include('../../config/config.php');
    $empno = $_POST['empno'];
    $compen_date = $_POST['compen'];
    $time   =   $_POST['time'];
    $type = $_POST['type'];


    $sql = "INSERT INTO compensatory SET
    employeeNo = :empno,
    dateRendered = :compendate,
    ttime = :ttime,
    type = :type,
    status = 'PENDING',
    dateClaimed = ''
    ";
    $stmt = $con->prepare($sql);
    $stmt->execute([
      ':empno'  =>  $empno,
      ':compendate' =>  $compen_date,
      ':ttime'  =>  $time,
      ':type'   =>  $type 
    ]);
}


?>