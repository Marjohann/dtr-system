<?php 


if(isset($_POST['save_holiday'])){
    
    $hname = $_POST['hname'];
    $date = strtotime($_POST['date']);
  
    $format = 'Y-m-d';
    $period = $_POST['period'];
    $sql = "INSERT INTO holiday SET
    HolidayName = :hname,
    date = :date,
    period = :period ";

    $execute_sql = $con->prepare($sql);
    $execute_sql->execute([
        ':hname'    =>  $hname,
        ':date'     =>  date($format,$date),
        ':period'   =>  $period
    ]);
$alert = "true";

}

?>