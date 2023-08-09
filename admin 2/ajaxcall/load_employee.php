<?php
//GET THE EMPLOYEES INFORMATION BASED ON KEYWORD 
//reference : add_travel.php / search_employee.php
include ('../../config/config.php');
if(isset($_POST['keyword'])){
$keyword = $_POST['keyword'];
$sql= "SELECT 
CONCAT(lastName,', ',firstName,', ',LEFT(middleName,1),'.') as fullname, 
employeeNo from bioinfo b inner join department d on b.department = d.deptId where 
b.status = 'Active' AND 
(b.lastName like '".$keyword."%' OR 
b.firstName like '".$keyword."%' OR 
d.departmentDescription like '".$keyword."%') 
ORDER BY b.lastName LIMIT 50
";

$get_query = $con->prepare($sql);
$get_query->execute();

while($result = $get_query->fetch(PDO::FETCH_ASSOC)){

    $fullname = $result['fullname'];
    $empno = $result['employeeNo'];
    echo '<tr>';
    echo '<td>';
    echo $empno;
    echo'</td>';
    echo '<td>';
    echo $fullname;
    echo'</td>';

    echo '<td>';
    echo '<button class  = "btn btn-sm btn-primary shadow-none"  id = "select" data-id = '.$empno.'><i class = "fa fa-arrow-right"></i></button>';
    echo'</td>';
    echo '</tr>';
}

}


?>