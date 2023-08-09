<?php 
include('../../config/config.php');

if(isset($_POST['workcode'])){
	$workcode = $_POST['workcode'];
 $sql = "SELECT * FROM workscheduledetail WHERE workScheduleDetail = :workcode";
 $get_worksched = $con->prepare($sql);
 $get_worksched->execute([':workcode' =>$workcode]);
 while($result = $get_worksched->fetch(PDO::FETCH_ASSOC)){
 	echo "<tr>";
 	echo '<td>'.$result['Day'].'</td>';
 	echo '<td>'.$result['inAM'].'</td>';
 	echo '<td>'.$result['outAM'].'</td>';
 	echo '<td>'.$result['inPM'].'</td>';
 	echo '<td>'.$result['outPM'].'</td>';
 	echo "</tr>";
 }



}

// echo "hello";

?>