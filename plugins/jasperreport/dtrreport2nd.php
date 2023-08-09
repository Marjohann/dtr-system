<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("PHPJasperXML.inc.php");
include_once ('setting.php');
include('reportconnection.php');
//get the date info and combined it into string
$empno= $_GET['empno'];
$date = $_GET['year'];
$datefrom 	=		$date."-16";
$dateto 	= 		$date."-31";		
//sql statement for 2nd half report
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("employeeNo"=>'12345678');
$xml = $PHPJasperXML->load_xml_file("dtrreport2nd.jrxml");
// $PHPJasperXML->xml_dismantle($xml);
$PHPJasperXML->sql ="
SELECT CONCAT(e.lastName,', ',e.firstName,', ',LEFT(e.middleName, 1),'.')  AS fullName,
d.inAM,d.outAM,d.inPM,d.outPM,d.otIn,d.otOut,e.supervisor,DATE_FORMAT(d.Date,'%d')as day,
DATE_FORMAT(d.Date,'%M,%Y')AS month,
TIME_FORMAT(ADDTIME(late,undertime),'%H:%i') as late,
TIME_FORMAT(d.undertime,'%H:%i') as undertime,
(SELECT TIME_FORMAT(ADDTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(late))),SEC_TO_TIME(SUM(TIME_TO_SEC(undertime)))),'%H:%i')  FROM bioinfo e 
INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE e.employeeNo = ".$empno." 
AND d.Date BETWEEN '".$datefrom."' AND '".$dateto."')as total 
FROM bioinfo e 
INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE e.employeeNo = ".$empno." 
AND d.Date BETWEEN '".$datefrom."' AND '".$dateto."'
GROUP BY Date";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);

$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
