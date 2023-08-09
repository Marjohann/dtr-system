<?php 
if(isset($_POST['empno'])){
    include('../../config/config.php');
   $employeeno = $_POST['empno'];
   $sql = "SELECT * FROM compensatory where employeeNo = :empno";
   $stmt = $con->prepare($sql);
   $stmt ->execute(['empno' =>$employeeno]);
   
   while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>";
        echo $result['entryno'];
        echo "</td>";
        echo "<td>";
        echo $result['dateRendered'];
        echo "</td>";
        echo "<td>";
        echo $result['ttime'];
        echo "</td>";
        echo "<td>";
        echo $result['type'];
        echo "</td>";
        echo "<td>";
        echo $result['status'];
        echo "</td>";
        echo "<td>";
        echo $result['dateClaimed'];
        echo "</td>";
        echo "<td>";
       echo '<button class = "btn btn-primary btn-md btn-circle " id = "upload_compen"> <i class = "fa fa-upload"></i></button> ';
       echo '<button class = "btn btn-danger btn-md btn-circle" id = "delete_compen"  > <i class = "fa fa-trash"></i></button> ';
        echo "</td>";
        echo "</tr>";

   }
   
   
}

?>