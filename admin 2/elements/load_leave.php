<?php include ('../../config/config.php');
if(isset($_POST['employeeno'])) {
$datefrom = $_POST['dtfr'];
$empno = $_POST['employeeno'];
$dateto = $_POST['dtto'];
$select_travel = "SELECT * FROM leaveentry WHERE EmployeeNo = :empno  AND datefrom BETWEEN :datefrom AND  :dateto";
$prep_select=$con->prepare($select_travel);
$prep_select->execute([
    ':empno' => $empno,
':datefrom' => $datefrom,
':dateto' => $dateto,

]);
while( $ledgerresult = $prep_select->fetch(PDO::FETCH_ASSOC)) {
  

        echo '<tr>';
        echo '<td>';
        echo $ledgerresult['entryId'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['datefrom'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['dateto'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['details'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['status'];
        echo '</td>'; 
        echo '<td><button class = "btn btn-primary btn-md btn-circle" data-id='.$ledgerresult['employeeNo'].' id = "update_leave" > <i class = "fa fa-save"></i></button> </td>';   
        echo '</tr>';
        echo "<p>";
        echo print_r($ledgerresult['entryId']);
        echo "</p>";
    }
     
}


?>