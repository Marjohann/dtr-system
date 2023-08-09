<?php
include("../../config/config.php");
if(isset($_POST['month'])){
$getMonth = $_POST['month'];

$query = "SELECT COUNT(recordId),d.employeeNo FROM dailytimerecord  d 
INNER JOIN bioinfo i ON d.`employeeNo` = i.`employeeNo` 
WHERE inAM = '' AND outAM = '' AND inPM = '' AND outPM = '' 
AND DATE LIKE :getMonth AND i.`employmentStatus` = 'Job Order' 
GROUP BY d.employeeNo HAVING COUNT(recordId) > 16 ";
    $xeute = $con->prepare($query);
    $xeute->execute([
        ':getMonth' =>   $getMonth
    ]);

    while($result = $xeute->fetch(PDO::FETCH_ASSOC)){
        $empno = $result['employeeNo'];

        $update_user = "UPDATE bioinfo SET status = 'Not Active' WHERE employeeNo = :empno";
        $xcute_update = $con->prepare($update_user);
        $xcute_update->execute([':empno'=> $empno]);

    }
    echo "success";
}

?>