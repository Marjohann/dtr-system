<?php
include ('../../config/config.php');

if (isset($_POST['empno'])) {
    $entryno = $_POST['entryno'];
    $datefrom =  strtotime($_POST['datefrom']);
    $dateto = strtotime($_POST['dateto']);
    $empno = $_POST['empno'];
    $leavetype = $_POST['leavetype'];
    $duration = $_POST['duration'];
   
    $SQL = "CALL spUpdateDtrLeave(:entryno,:empno,:date,:leavetype,:duration)";
    $PREP = $con->prepare($SQL);



    $format = 'Y-m-d';
    for ($z=$datefrom;$z<=$dateto;$z+=86400) {
        $i = date($format, $z);
    
        $PREP->execute([
    ':entryno'  =>   $entryno,
    ':empno'  =>     $empno,
    ':date'  =>  $i,
    ':leavetype'  =>  $leavetype,
    ':duration'  =>  $duration
    ]);


        if ($i == $dateto) {
            break;
        }
        echo $i;
    }
}

?>