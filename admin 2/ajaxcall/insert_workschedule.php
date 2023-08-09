<?php
include('../../config/config.php');

if(isset($_POST['workid'])){
$workid = $_POST['workid'];
$workdesc = $_POST['workdesc'];
$remarks = $_POST['remarks'];
$status = $_POST['status'];

$insert_stmt = "INSERT into workschedule set 
				workScheduleId = :workid,
				workScheduleDescription = :workdesc,
				remarks	=	:remarks,
				status	=	:status ";

	$prepare_stmt = $con->prepare($insert_stmt);
	$prepare_stmt->execute([
		':workid'	=>	$workid,
		':workdesc'=>	$workdesc,
		':remarks'=>	$remarks,
		':status'=>		$status

	]);			

	

	}		
?>