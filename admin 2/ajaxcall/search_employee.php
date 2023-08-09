<?php
/* Database connection start */
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sccdrrmo";
include('../../config/config.php');
// $office = $_POST['office'];


// echo "<pre>";
// echo print_r("test");
// echo "</pre>";
// $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


 $columns= array( 
// datatable column index  => database column name
	0 =>  'employeeNo', 
	1 => 'fullname',
	2 => 'departmentDescription',
    3 => 'biometricid',
    4 => 'employmentstatus',
    5 => 'workScheduleId',
	6 => 'supervisor'
  

);



// getting total number records without any search

$sql = "SELECT CONCAT(b.firstName,' ',LEFT(b.middleName, 1),'. ',b.lastName) as fullname,
        b.employeeNo,
        b.biometricId,
        d.departmentDescription,
        b.workScheduleId,
        b.employmentStatus,
        b.supervisor  
        FROM bioinfo b 
        INNER JOIN department d on b.department = d.deptId ";
$sql.=" ORDER BY b.lastName ASC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$get_user_data = $con->prepare($sql);
$get_user_data->execute();
// $query=mysqli_query($conn, $sql) or die("search_user.php");
// PDOStatement::rowCount

$countnofilter= "SELECT COUNT(employeeNo) as id from bioinfo"; //count all rows w/o filter
$getrecordstmt = $con->prepare($countnofilter);
$getrecordstmt->execute() or die("search_employee.php");
$getrecord = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
$totalData = $getrecord['id'];
// $totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT CONCAT(b.firstname,' ',LEFT(b.middlename, 1),'. ',b.lastname) as fullname
,b.employeeNo,
d.departmentDescription,
b.workScheduleId,
b.supervisor,
b.biometricId,
b.employmentStatus   
FROM bioinfo b 
INNER JOIN department d on b.department = d.deptId ";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.="  and (b.employeeNo LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR b.firstName LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR b.middleName LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR b.lastName LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR CONCAT(firstName,' ',lastName) LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR b.biometricId LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR b.employmentStatus LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR b.workScheduleId LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR d.departmentDescription LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR b.status LIKE '%".$requestData['search']['value']."%' )";

// $query=mysqli_query($conn, $sql) or die("search_user.php");


// $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY b.lastName ASC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$get_user_data = $con->prepare($sql);
$get_user_data->execute();
// $totalData = $get_user_data->fetch(PDOStatement::rowCount);
// $totalFiltered = $totalData;
// $query=mysqli_query($conn, $sql) or die("search_user.php");

	$countfilter= "SELECT COUNT(employeeNo) as id from bioinfo where ";
	$countfilter.="  (employeeNo LIKE '".$requestData['search']['value']."%' ";    
	$countfilter.=" OR firstName LIKE '".$requestData['search']['value']."%' ";
	$countfilter.=" OR CONCAT(firstName,' ',lastName) LIKE '%".$requestData['search']['value']."%' ";
	$countfilter.=" OR middleName LIKE '".$requestData['search']['value']."%' ";
	$countfilter.=" OR lastName LIKE '".$requestData['search']['value']."%' ";
	$countfilter.=" OR biometricId LIKE '".$requestData['search']['value']."%' ";
	$countfilter.=" OR employmentStatus LIKE '%".$requestData['search']['value']."%' ";
	$countfilter.=" OR department LIKE '".$requestData['search']['value']."%' ";
	$countfilter.=" OR supervisor LIKE '%".$requestData['search']['value']."%' ";
	$countfilter.=" OR workScheduleId LIKE '%".$requestData['search']['value']."%' ";
    $countfilter.=" OR status LIKE '%".$requestData['search']['value']."%') ";

$countfilter.=" LIMIT ".$requestData['length']." " ;//count all rows w/ filter
$getrecordstmt = $con->prepare($countfilter);
$getrecordstmt->execute() or die("search_employee.php");
$getrecord = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
$totalData = $getrecord['id'];
$totalFiltered = $totalData;
}
$data = array();
// while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	while ($row = $get_user_data->fetch(PDO::FETCH_ASSOC)){
	$nestedData=array(); 

	$nestedData[] = $row["employeeNo"];
	$nestedData[] = $row["fullname"];
	$nestedData[] = $row["departmentDescription"];
	$nestedData[] = $row["biometricId"];
	$nestedData[] = $row["employmentStatus"];
    $nestedData[] = $row["workScheduleId"];
    $nestedData[] = $row["supervisor"];
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>