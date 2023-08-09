<?php
include('../../config/config.php');
if(isset($_POST['id'])){

    $id = $_POST['id'];
    $deptId = $_POST['deptId'];
if($deptId != 'All'){
$getemployees = "Select employeeNo from bioinfo where department = :department AND status = 'Active' AND employmentStatus = 'Regular' ";
$getemployees_total = $con->prepare($getemployees);
$getemployees_total->execute([':department' =>  $deptId]);
}else {

    $getemployees = "Select employeeNo from bioinfo where status = 'Active' AND employmentStatus = 'Regular' ";
    $getemployees_total = $con->prepare($getemployees);
    $getemployees_total->execute();
}

while ($employee_data = $getemployees_total->fetch(PDO::FETCH_ASSOC)) {
 
$empno  =   $employee_data['employeeNo'];


$sql = "CALL spReflectHoliday(:id,:empno)";

$callSP = $con->prepare($sql);
$callSP->execute([
    ':id'   =>  $id,
    ':empno' => $empno
]);

}
echo "You reflected the Holiday";
}
?>