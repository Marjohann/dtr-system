<?php
include('../../config/config.php');

if(isset($_POST['month'])){

    $insert_stmt = "CALL spInsertLeaveCredits(:empno,:month,:year,:vl,:sl)";
    $prep_stmt = $con->prepare($insert_stmt);
    $prep_stmt->execute([
        ':empno'    =>  $_POST['empnum'],
        ':month'    =>  $_POST['month'],
        ':year'    =>  $_POST['year'],
        ':vl'    =>  $_POST['vl'],
        ':sl'    =>  $_POST['sl']

    ]);
    echo 'success';
}
?>