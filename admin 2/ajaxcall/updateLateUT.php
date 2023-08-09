<?php
include ('../../config/config.php');
if(isset($_POST['empno'])){
	// echo "<pre>";
	// print_r("jonard");
	// echo "</pre>";
	$empno =  $_POST['empno'];
	$date = $_POST['dateofupdate'];
	// $id = 		$_POST['idpost'];

	// $checkin = 	str_replace(' ', '', $_POST['checkin']);
	// $breakout =str_replace(' ', '',  $_POST['breakout']);
	// $breakin = str_replace(' ', '', $_POST['breakin']);
	// $checkout= str_replace(' ', '', $_POST['checkout']);
	// $overtimein = str_replace(' ', '', $_POST['overtimein']);
	// $overtimeout =str_replace(' ', '', $_POST['overtimeout']);


	$field = 	$_POST['field'];
	$value =  $_POST['value'];
	// $breakin =  $_POST['breakin'];
	// $checkout=  $_POST['checkout'];
	// $overtimein = $_POST['overtimein'];
	// $overtimeout =$_POST['overtimeout'];
	// $late = $_POST['late'];
	// $late = $_POST['late'];
	// $undertime = $_POST['undertime'];
	$value == '' ? $value = '00:00:00' : $value = $_POST['value'];
	
// $updatequery= "CALL spUpdateDtr(:empno,:date,:field,:value)";
	// $updatequery = "UPDATE dailytimerecord SET 
	// 				inAM = :checkin,
	// 				outAM = :breakout,
	// 				inPM 	=:breakin,
	// 				outPM  = :checkout,
	// 				otIn 	=:overtimein,
	// 				otOut 	=:overtimeout,
	// 				late 	=:late,
	// 				undertime =:undertime,
	// 				 WHERE recordId = :id and
	// 				Date = :date  and employeeNo = :empno";

$updatequery = "UPDATE dailytimerecord SET ".$field." = :value
WHERE employeeNo =:empno AND DATE = :date";
$prepare_query =$con->prepare($updatequery);
$prepare_query->execute([
	':empno' => $empno,
	':date'	=>	$date,
	':value' =>	$value
]);


}

?>