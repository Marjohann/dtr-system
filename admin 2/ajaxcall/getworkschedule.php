<?php
include('../../config/config.php');

if(isset($_POST['workschedid'])){
    $workschedid = '';
    $workscheddescp = '';
    $remarks = '';
    $status = '';
    $inAM ='';
    $outAM = '';
    $inPM = '';
    $outPM = '';
    $getDay = '';

$sql = "CALL spGetWorkSchedule(:workid,:days)";
$prepare_stmt = $con->prepare($sql);
$prepare_stmt->execute([
    ':workid' => $_POST['workschedid'],
    ':days' => $_POST['Day']
]);
while ($result = $prepare_stmt->fetch(PDO::FETCH_ASSOC)) {
    $getDay = $result['Day'];
    $inAM = $result['inAM'];
    $outAM = $result['outAM'];
    $inPM = $result['inPM'];
    $outPM = $result['outPM'];

}

$data = array(
    'getDay'=>$getDay,
    'inAM'  => $inAM,
    'outAM' => $outAM,
    'inPM' => $inPM,
    'outPM' => $outPM
);

echo json_encode($data);


}


?>