<?php 

include('../../config/config.php');
$columns= array( 
    // datatable column index  => database column name
        0 =>  'entity_no', 
        1 => 'username',
        2 => 'fullname',
        3 => 'status',
    
    );
    $dept = $_POST['department'];
	$status = $_POST['empstatus'];

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$getAllIndividual = "SELECT employeeNo,
                     CONCAT(lastName,', ',firstName,', ',LEFT(middleName,1),'.') as fullName
                      FROM bioinfo where department = :dept AND employmentStatus = :status AND status = 'Active'
                      order by lastName LIMIT ".$requestData['start']." ,".$requestData['length']."  ";

$getIndividualData = $con->prepare($getAllIndividual);
$getIndividualData->execute([
	':dept' =>$dept,
	':status'	=>$status
]);                   


$countNoFilter = "SELECT COUNT(employeeNo) as id from bioinfo 
                where department = :dept AND employmentStatus = :status and status = 'Active'";
                $getrecordstmt = $con->prepare($countNoFilter);
                $getrecordstmt->execute([
               ':dept' =>$dept,
	            ':status'	=>$status

]) or die("get_employee_department.php");
$getrecord = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
$totalData = $getrecord['id'];

$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


$getAllIndividual = "SELECT employeeNo,
CONCAT(lastName,', ',firstName,', ',LEFT(middleName,1),'.') as fullName
 FROM bioinfo where department = :dept and employmentStatus = :status AND status = 'Active' AND ";
             
     if( !empty($requestData['search']['value']) ) {
        $getAllIndividual.=" (firstName LIKE '%".$requestData['search']['value']."%'";
        $getAllIndividual.=" OR middleName LIKE '%".$requestData['search']['value']."%' ";
        $getAllIndividual.=" OR lastName LIKE '%".$requestData['search']['value']."%' ";
        $getAllIndividual.=" OR CONCAT(firstName,' ',middleName,' ',lastName) LIKE '%" . $requestData['search']['value'] . "%' ";
        $getAllIndividual.=" OR biometricId LIKE '%".$requestData['search']['value']."%') ";
        $getAllIndividual.=" order by lastName LIMIT ".$requestData['start']." ,".$requestData['length']." ";
        $getIndividualData = $con->prepare($getAllIndividual);
        $getIndividualData->execute([

            ':dept' =>$dept,
            ':status'	=>$status
        ]); 

     $countfilter = "SELECT COUNT(employeeNo) as id from bioinfo 
     where department = :dept AND employmentStatus = :status AND status = 'Active' AND ";
      $countfilter.=" (firstName LIKE '%".$requestData['search']['value']."%'";
      $countfilter.=" OR middleName LIKE '%".$requestData['search']['value']."%' ";
      $countfilter.=" OR lastName LIKE '%".$requestData['search']['value']."%' ";
      $countfilter.=" OR CONCAT(firstName,' ',middleName,' ',lastName) LIKE '%" . $requestData['search']['value'] . "%' ";
      $countfilter.=" OR biometricId LIKE '%".$requestData['search']['value']."%') ";
      $countfilter.=" LIMIT ".$requestData['start']." ,".$requestData['length']." ";

        $getrecordstmt = $con->prepare($countfilter);
        $getrecordstmt->execute([

            ':dept' =>$dept,
            ':status'	=>$status
        ]) or die("get_employee_department.php");
        $getrecord1 = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
        $totalData = $getrecord1['id'];
        $totalFiltered = $totalData;
     }

     $data = array();
// while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	while ($row = $getIndividualData->fetch(PDO::FETCH_ASSOC)){
	$nestedData=array(); 
	$nestedData[] = $row["employeeNo"];
    $nestedData[] = $row["fullName"];

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