<?php
include('../../config/config.php');

if(isset($_POST['workschedid'])){
    $workschedid = '';
    $workscheddescp = '';
    $remarks = '';
    $status = '';
   


$sql = "SELECT * from workschedule where workScheduleId =:workid";
$prepare_stmt = $con->prepare($sql);
$prepare_stmt->execute([
    ':workid' => $_POST['workschedid']

]);
while ($result = $prepare_stmt->fetch(PDO::FETCH_ASSOC)) {
    $workschedid = $result['workScheduleId'];
    $workscheddescp =$result['workScheduleDescription'];
    $remarks = $result['remarks'];
    $status = $result['status'];
  
}

$data = array(
    'workschedid'=>$workschedid,
    'workdesc'  =>$workscheddescp,
    'remarks'   =>  $remarks,
    'status'    =>  $status,
);

echo json_encode($data);


}


?>