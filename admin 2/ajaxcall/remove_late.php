<?php 
include('../../config/config.php');

if (isset($_POST['empno'])) {
 
$opt = $_POST['opt'];
//remove the late in the dtr
if($opt == 'removelate'){
$empno = $_POST['empno'];
$datefrom = $_POST['dateFrom'];
$dateto = $_POST['dateTo'];

$sql = "UPDATE dailytimerecord SET
    late = '00:00:00'
    where employeeNo=:empno and Date BETWEEN :datefrom and :dateto ";
$prep = $con->prepare($sql);
$prep->execute([
':empno'    =>  $empno,
':datefrom'     =>  $datefrom,
':dateto'     =>  $dateto
]);
}  
//remove the undertime in the dtr
if($opt == 'removeundertime'){
    $empno = $_POST['empno'];
    $datefrom = $_POST['dateFrom'];
    $dateto = $_POST['dateTo'];
    
    $sql = "UPDATE dailytimerecord SET
        undertime = '00:00:00'
        where employeeNo=:empno and Date BETWEEN :datefrom and :dateto ";
    $prep = $con->prepare($sql);
    $prep->execute([
        ':empno'    =>  $empno,
        ':datefrom'     =>  $datefrom,
        ':dateto'     =>  $dateto
    ]);
    } 
//REMOVE THE LATE AND UNDERTIME
    if($opt == 'removelateundertime'){
        $empno = $_POST['empno'];
        $datefrom = $_POST['dateFrom'];
        $dateto = $_POST['dateTo'];
        
        $sql = "UPDATE dailytimerecord SET
             late = '00:00:00',
            undertime = '00:00:00'
            where employeeNo=:empno and Date BETWEEN :datefrom and :dateto ";
        $prep = $con->prepare($sql);
        $prep->execute([
            ':empno'    =>  $empno,
            ':datefrom'     =>  $datefrom,
            ':dateto'     =>  $dateto
        ]);
        } 
//  REMOVE THE DAY OFF 
        if($opt == 'removedayoff'){
            $empno = $_POST['empno'];
            $datefrom = $_POST['dateFrom'];
            $dateto = $_POST['dateTo'];
        
            $sql = "SELECT Date, outAM,inPM from dailytimerecord
                WHERE employeeNo=:empno and Date BETWEEN :datefrom and :dateto ";
            $prep = $con->prepare($sql);
            $prep->execute([
                ':empno'    =>  $empno,
                ':datefrom'     =>  $datefrom,
                ':dateto'     =>  $dateto
            ]);

            while($result = $prep->fetch(PDO::FETCH_ASSOC)){
                $getDate = $result['Date'];
                $getOutAM   =$result['outAM'];
                $getInPM    =$result['inPM'];
            if($getOutAM == 'DAY'){
                $updateoutAM = "UPDATE dailytimerecord SET 
                outAM = '' where employeeNo = :empno and Date = :date";
                $exe_updateoutAM = $con->prepare($updateoutAM);
                $exe_updateoutAM->execute([
                    ':empno'=>  $empno,
                    ':date' =>  $getDate
                ]);
            }  
            
            if($getInPM == 'OFF'){
                $updateoutAM = "UPDATE dailytimerecord SET 
                inPM = '' where employeeNo = :empno and Date = :date";
                $exe_updateoutAM = $con->prepare($updateoutAM);
                $exe_updateoutAM->execute([
                    ':empno'=>  $empno,
                    ':date' =>  $getDate
                ]);
            }    
            }
            } 
}
?>