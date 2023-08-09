<?php 
include('../../config/config.php');

if(isset($_POST['empno'])){
$empno = $_POST['empno'];
$dtefrom = $_POST['dtefrom'];   
$dteto = $_POST['dteto'];
$status = $_POST['status'];
$format = 'Y-m-d';
$sql = "SELECT * from leaveentry where 
        employeeNo = :empno AND
        dateFrom BETWEEN :dtefrom  AND :dteto 
        AND status = :status";

$create_stmt  = $con->prepare($sql);
$create_stmt->execute([
    ':empno'    =>  $empno,
    ':dtefrom'    =>  $dtefrom,
    ':dteto'    =>  $dteto,
    ':status'    =>  $status
]);
while($result = $create_stmt->fetch(PDO::FETCH_ASSOC)){
    $entryno = $result['entryId'];
    $employeeNo = $result['employeeNo'];
    $datefrom = strtotime($result['dateFrom']);
    $dateto = strtotime($result['dateTo']);
    $duration = $result['duration'];
    $leavetype = $result['leaveType'];
    for ($z= $datefrom;$z<=$dateto;$z+=86400){
        $format = 'Y-m-d';
        $i = date($format, $z);
        $SQL = "CALL spUpdateDtrLeave(:entryno,:empno,:date,:leavetype,:duration)";
        $PREP = $con->prepare($SQL);
        // $PREP->execute([
        //     ':entryno'  =>   $entryno,
        //     ':empno'  =>     $employeeNo,
        //     ':date'  =>  $i,
        //     ':leavetype'  =>  $leavetype,
        //     ':duration'  =>  $duration
        //     ]);
        $PREP->bindParam(':entryno',$entryno);
        $PREP->bindParam(':empno',$employeeNo);
        $PREP->bindParam(':date',$i);
        $PREP->bindParam(':leavetype',$leavetype);
        $PREP->bindParam(':duration',$duration);
        $PREP->execute();
        
    }

    echo $dtefrom;
}

}


?>