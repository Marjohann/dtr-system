
<?php
//GETS THE DATA IN BIOINFO AND DISPLAY AS A JSON TYPE
include('../../config/config.php');

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $employeeno ='';
    $lastname   ='';
    $firstname  ='';
    $middlename ='';
    $bioid  ='';
    $department ='';
    $employmentstatus   ='';
    $supervisor ='';
    $status ='';
    $worksched ='';
    $workId = '';
    $workDesc=  '';
// $sql = "SELECT b.*, d.departmentDescription FROM bioinfo b INNER JOIN department d ON b.department  = d.deptId WHERE b.employeeNo = :id LIMIT 1";
$sql="SELECT b.*, workScheduleDescription FROM bioinfo b 
INNER JOIN workschedule w on b.workScheduleId = w.workScheduleId COLLATE latin1_general_ci
where employeeNo = :id LIMIT 1";
$exe_sql = $con->prepare($sql);
$exe_sql->execute([':id'=>  $id]);
while($result = $exe_sql->fetch(PDO::FETCH_ASSOC)){
    $employeeno = $result['employeeNo'];
    $lastname = $result['lastName'];
    $firstname = $result['firstName'];
    $middlename = $result['middleName'];
    $bioid = $result['biometricId'];
    $department = $result['department'];
    $employmentstatus = $result['employmentStatus'];
    $supervisor = $result['supervisor'];
    $status = $result['status'];
    $worksched = $result['schedule'];
    $workId =   $result['workScheduleId'];
    $workDesc = $result['workScheduleDescription'];

   
}
$data = array(
    'employeeno'   =>   $employeeno,   
    'lastname'      =>  $lastname,
    'firstname'    =>   $firstname, 
    'middlename'   =>   $middlename, 
    'bioid'         =>  $bioid, 
    'department'   =>   $department, 
    'employmentstatus'=>$employmentstatus, 
    'supervisor'   =>   $supervisor, 
    'status'   =>       $status,
    'worksched'   =>   $worksched,
    'workId'    =>  $workId,
    'workDesc'=>    $workDesc
   );
   echo json_encode($data);
}


?>