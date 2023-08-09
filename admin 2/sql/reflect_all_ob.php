<?php 
include('../../config/config.php');

if(isset($_POST['empno'])){
$empno = $_POST['empno'];
$dtefrom = $_POST['dtefrom'];   
$dteto = $_POST['dteto'];
$status = $_POST['status'];
$format = 'Y-m-d';
$sql = "SELECT * from officialbusiness where 
        employeeNo = :empno AND
        datefrom BETWEEN :dtefrom  AND :dteto 
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
    $datefrom = strtotime($result['datefrom']);
    $dateto = strtotime($result['dateto']);
    $duration = $result['duration'];
    $obtype = $result['obtype'];

    for ($z= $datefrom;$z<=$dateto;$z+=86400){
        $format = 'Y-m-d';
        $i = date($format, $z);
        $SQL = "CALL spUpdateDtrOfficialBusiness(:entryno,:empno,:date,:obtype,:duration)";
        $PREP = $con->prepare($SQL);
        $PREP->execute([
            ':entryno'  =>   $entryno,
            ':empno'  =>     $employeeNo,
            ':date'  =>  $i,
            ':obtype'  =>  $obtype,
            ':duration'  =>  $duration
            ]);
        
    }

   
}
echo $dtefrom;
}


?>