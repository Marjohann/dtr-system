<?php
include('../../config/config.php');

if(isset($_POST['empno'])){
    $empno = $_POST['empno'];
    $date = $_POST['date'];
    $inAM = $_POST['inAM'];
    $outAM = $_POST['outAM'];
    $inPM = $_POST['inPM'];
    $outPM = $_POST['outPM'];

$executeRecompute = $con->prepare("CALL spRecomputeTardiness(:empno,:ddate,:inam,:outam,:inpm,:outpm)");
$executeRecompute->execute([
    ':empno'    =>  $empno,
    ':ddate'    =>  $date,
    ':inam'    =>  $inAM,
    ':outam'    =>  $outAM,
    ':inpm'    =>  $inPM,
    ':outpm'    =>  $outPM
]);

echo $inAM;
}
?>