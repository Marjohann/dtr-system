<?php 
include('../../config/config.php');
$result = "";
if(isset($_POST['employeeNo'])){
 
$empno = $_POST['employeeNo'];
$leavetype = $_POST['leaveType'];
$datefrom = $_POST['dateFrom'];
$dateto = $_POST['dateTo'];

// empno:empno,
// leavetype:leavetype,
// datefrom:datefrom,
// :dateto

$getLeave = $con->prepare("
SELECT entryId from leaveentry where 
employeeNo = :empno AND
leaveType = :leavetype AND
dateFrom = :datefrom AND
dateTo  =   :dateto LIMIT 1
");
$getLeave->execute([
':empno'    =>  $empno,
':leavetype'    =>  $leavetype,
':datefrom'    =>  $datefrom,
':dateto'    =>  $dateto
]);
if($getLeave->rowCount() >   0){
    $result = "true";
}
// json_encode($result);
echo $result;
}
?>