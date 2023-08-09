<?php
include('../../config/config.php');


if(isset($_POST['workschedid'])){
    $workcode = $_POST['workschedid'];
    $days = $_POST['Day'];

    $inAM ='';
    $outAM = '';
    $inPM = '';
    $outPM = '';

    $sql = "SELECT * FROM workscheduledetail where workScheduleDetail = :workid and Day = :day";
    $create = $con->prepare($sql);
    $create->execute([
    ':workid'=> $workcode,
    ':day'  =>  $days

    ]);
    while ($result = $create->fetch(PDO::FETCH_ASSOC)) {

        $inAM   =   $result['inAM'];
        $outAM   =   $result['outAM'];
        $inPM   =   $result['inPM'];
        $outPM   =   $result['outPM'];
    }

    echo "<tr>";

    echo "<td>";
    echo $days;
    echo "</td>";


    echo "<td>";
    echo $inAM;
    echo "</td>";

    echo "<td>";
    echo $outAM;
    echo "</td>";

    echo "<td>";
    echo $inPM;
    echo "</td>";

    echo "<td>";
    echo $outPM;
    echo "</td>";

    echo "</tr>";
}


?>