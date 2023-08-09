<?php

include('../../config/config.php');

if(isset($_POST['workcode'])){
$workcode = $_POST['workcode'];
$sql = "SELECT workscheduleId from workschedule where workscheduleId = :workcode";
$prep = $con->prepare($sql);
$prep->execute([':workcode' =>$workcode]);
$num_row = $prep->rowCount();
if($num_row  > 0){
	echo 'This work code is already exist';
}



}
?>