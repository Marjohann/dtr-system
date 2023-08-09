 <?php
include('../../config/config.php');

if(isset($_POST['workId'])){
$workid = $_POST['workId'];
$day = $_POST['day'];
$checkin = $_POST['CheckIn'];
$breakout = $_POST['BreakOut'];
$breakin = $_POST['BreakIn'];
$checkout = $_POST['CheckOut'];

$insert_stmt = "CALL spInsertScheduleDetail(
				:workid,
				:day,
				:checkin,
				:breakout,
				:breakin,
				:checkout)";
	$prepare_stmt = $con->prepare($insert_stmt);
	$prepare_stmt->execute([
		':workid'	=>	$workid,
		':day'=>		$day,
		':checkin'=>	$checkin,
		':breakout'=>	$breakout,
		':breakin'=>	$breakin,
		':checkout'=>	$checkout

	]);
		$delete = "DELETE FROM workscheduledetail WHERE workScheduleDetail = :workid AND
		 inAM = '' AND outAM = '' AND inPM = ''  AND outPM = '' ";
			$delete_prepare = $con->prepare($delete);
			$delete_prepare->execute([
				':workid'	=>	$workid
			]);
		if($prepare_stmt){
			echo "success";
		}else{
			echo "failed";	
		}
}

?>