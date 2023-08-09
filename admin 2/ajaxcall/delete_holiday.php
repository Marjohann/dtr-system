<?php
if(isset($_POST['id'])){
include('../../config/config.php');

$holidayid = $_POST['id'];

$sql = "DELETE FROM holiday WHERE entryNo = :id";
$delete_holiday = $con->prepare($sql);

$delete_holiday->execute([':id' =>  $holidayid]);

}


?>