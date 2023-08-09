<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('../setting.php');
include('../reportconnection.php');
$dept = $_GET['dept'];
$date = $_GET['year'];
$datefrom 	=		$date."-01";
$dateto 	= 		$date."-15";		
$emp_status = $_GET['empstatus'];
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("employeeNo"=>'12345678');
$xml = $PHPJasperXML->load_xml_file("dtrreport1st.jrxml");
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
// WHERE DATE BETWEEN '".$datefrom."' AND '".$dateto."' AND employeeNo = e.employeeNo  GROUP BY DAY) AS totallate,
// TIME_FORMAT(ADDTIME(late,undertime),'%H:%i') AS late
// FROM bioinfo e INNER JOIN dailytimerecord d ON e.employeeNo = d.employeeNo WHERE e.department = '".$dept."'  AND Date  BETWEEN '".$datefrom."' AND '".$dateto."' AND e.status = 'Active' AND e.employmentStatus = '".$emp_status."' GROUP BY fullName,Date";

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
            DATE  BETWEEN '".$datefrom."' AND '".$dateto."'
        GROUP BY 
            employeeNo
    ) t 
ON 
    e.employeeNo = t.employeeNo 
WHERE 
    e.department = '".$dept."'  
    AND DATE BETWEEN '".$datefrom."' AND '".$dateto."'
    
    AND e.status = 'Active' 
    AND e.employmentStatus = '".$emp_status."' 
GROUP BY 
    fullName,
    DATE

";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);

$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
