<?php
if (isset($_POST['empno'])) {
    include('../../config/config.php');
    $empno = $_POST['empno'];
    $chk_date = $_POST['date'];
    $dte=date('Y-m-d', strtotime( $chk_date));
    $sql = "SELECT Date,inAM,outAM,inPM,outPM from dailytimerecord where employeeNo = :empno and Date = :date";
    $create = $con->prepare($sql);
    $create->execute([
        ':empno' => $empno,
        ':date' => $dte
    ]);
    while ($result = $create->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>";
        echo "<td>";
        echo $result['Date'];
        echo "</td>";
        echo "<td>";
        echo $result['inAM'];
        echo "</td>";
        echo "<td>";
        echo $result['outAM'];
        echo "</td>";
        echo "<td>";
        echo $result['inPM'];
        echo "</td>";
        echo "<td>";
        echo $result['outPM'];
        echo "</td>";
        echo "</tr";
    }

}
