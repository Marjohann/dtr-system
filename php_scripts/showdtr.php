<?php
include('../config/config.php');
session_start();



$user_name='';
if (!isset($_SESSION['id'])) {
  header('location:../index.php');
}
if(isset($_POST['search'])){
$empno = $_POST['employeeNo'];
$dteTo = $_POST['dateto'];
$dteFrom = $_POST['datefrom'];

$getdtr = "CALL spShowDTR(:empno,:dteTo,:dteFrom)";
$set_insert_stmt = $con->prepare($getdtr);
$set_insert_stmt->execute([
    ':empno '=> $empno,
    ':dteTo '=>$dteTo,
    ':dteFrom '=> $dteFrom
   
]);
    
while($get_dtr = $set_insert_stmt->fetch(PDO::FETCH_ASSOC)){
$timeIn = $get_dtr['inAM'];
$timeoutAm = $get_dtr['outAM'];
$timeinPm = $get_dtr['inPM'];
$timeoutPm = $get_dtr['outPM'];
$otIn = $get_dtr['otIn'];
$otOut = $get_dtr['otOut'];

}
}
?>


