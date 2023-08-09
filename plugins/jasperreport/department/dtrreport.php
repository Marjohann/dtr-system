<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('../setting.php');
include('../reportconnection.php');
// include('../../../config/config.php');
$dept = $_GET['dept'];
$date = $_GET['year'];
$days = $_GET['days'];
$emp_status = $_GET['empstatus'];
// $getEmp = "SELECT employeeNo from bioinfo WHERE department = '".$dept."' and status = 'Active'";
// $prepEmp = $con->prepare($getEmp);
// $prepEmp->execute();
// $empno =  [];
// while ($result = $prepEmp->fetch(PDO::FETCH_ASSOC)) {
// $empno[] = $result['employeeNo'];
// }
$PHPJasperXML = new PHPJasperXML();
if($days == '30'){$xml = $PHPJasperXML->load_xml_file("report3x3-30.jrxml");}
if($days == '31'){$xml = $PHPJasperXML->load_xml_file("report3x3.jrxml");}
if($days == '29'){$xml = $PHPJasperXML->load_xml_file("report3x3-29.jrxml");}
if($days == '28'){$xml = $PHPJasperXML->load_xml_file("report3x3-28.jrxml"); }
// $PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("employeeNo"=>'12345678');
// foreach($empno as $value){

     
// $PHPJasperXML->xml_dismantle($xml);
// $PHPJasperXML->sql ="
// SELECT CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,e.supervisor,
// d.inAM,
// d.outAM,
// d.inPM,
// d.outPM,
// d.otIn,
// d.otOut,
// DATE_FORMAT(d.Date,'%d')AS DAY,
// DATE_FORMAT(d.Date,'%M,%Y')AS month,
// (SELECT TIME_FORMAT(ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(late))),SEC_TO_TIME(SUM(TIME_TO_SEC(undertime)))),'%H:%i')FROM DAILYTIMERECORD
// WHERE DATE LIKE '".$date."' AND employeeNo = e.employeeNo  GROUP BY DAY) AS totallate,
// TIME_FORMAT(ADDTIME(late,undertime),'%H:%i') AS late
// FROM bioinfo e INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE e.department = '".$dept."'  AND Date LIKE '".$date."' AND e.status = 'Active' AND e.employmentStatus = '".$emp_status."' GROUP BY fullName,Date ;
// ";

$PHPJasperXML->sql = "
SELECT 
    CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,
    e.supervisor,
    d.inAM,
    d.outAM,
    d.inPM,
    d.outPM,
    d.otIn,
    d.otOut,
    DATE_FORMAT(d.Date,'%d') AS DAY,
    DATE_FORMAT(d.Date,'%M,%Y') AS MONTH,
    t.totallate,
    TIME_FORMAT(ADDTIME(d.late,d.undertime),'%H:%i') AS late
FROM 
    bioinfo e 
INNER JOIN 
    dailytimerecord d 
ON 
    e.employeeNo = d.employeeNo 
INNER JOIN 
    (
        SELECT 
            employeeNo, 
            TIME_FORMAT(ADDTIME(SUM(late),SUM(undertime)),'%H:%i') AS totallate
        FROM 
            DAILYTIMERECORD 
        WHERE 
            DATE LIKE '".$date."-%' 
        GROUP BY 
            employeeNo
    ) t 
ON 
    e.employeeNo = t.employeeNo 
WHERE 
    e.department = '".$dept."'  
    AND DATE LIKE '".$date."-%' 
    AND e.status = 'Active' 
    AND e.employmentStatus = '".$emp_status."' 
GROUP BY 
    fullName,
    DATE

";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
    //page output method I:standard output  D:Download file
    $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
    $PHPJasperXML->outpage("I");
// }

?>