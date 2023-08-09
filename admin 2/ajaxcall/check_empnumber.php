<?php
include('../../config/config.php');

if(isset($_POST['empnum'])){
$uname = $_POST['empnum'];
$empnum= '';
$bioid = '';
$sql = "SELECT * from bioinfo where employeeNo = :usname";
$check_sql = $con->prepare($sql);
$check_sql->execute([':usname' => $uname]);
while($result = $check_sql->fetch(PDO::FETCH_ASSOC)){

    $empnum = $result['employeeNo'];
    $bioid = $result['biometricId'];
}
$data = array('data1' => $empnum,
                'data2' => $bioid);
echo json_encode($data);
}


if(isset($_POST['bioid'])){
$uname = $_POST['bioid'];
$empnum= '';
$bioid = '';
$sql = "SELECT * from bioinfo where biometricId = :usname";
$check_sql = $con->prepare($sql);
$check_sql->execute([':usname' => $uname]);
while($result = $check_sql->fetch(PDO::FETCH_ASSOC)){

    $empnum = $result['employeeNo'];
    $bioid = $result['biometricId'];
}
$data = array('data1' => $empnum,
            'data2' => $bioid);
echo json_encode($data);
    
}
?>