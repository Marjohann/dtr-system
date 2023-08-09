<!DOCTYPE html>

<?php 
include('../config/config.php');
include('../config/mssql.php');
$employeeNo = '';
$fullname = '';
$supervisor = '';
$status = '';
$department = '';
$getEmployee = "SELECT * from bioinfo b inner join department d on b.department = d.deptId  WHERE biometricId = :bioid";
$setEmployee = $con->prepare($getEmployee);


$setEmployee->execute([
    ':bioid'   =>  $_GET['biometricpin']
]);

while($result = $setEmployee->fetch(PDO::FETCH_ASSOC)){
    $employeeNo = $result['employeeNo'];
    $fullname = $result['firstName'].', '.$result['lastName'].', '.$result['middleName'];
    $supervisor = $result['supervisor'];
    $status = $result['status'];
    $department = $result['departmentDescription'];
}

$st_msaccess_search = "SELECT checktype ,checktime,sn ,badgenumber from checkinout   
 inner join userinfo  on  checkinout.USERID = userinfo.USERID 
 where userinfo.badgenumber = :biometric and  DATEPART(yy,checktime)= :year 
 AND datepart(mm,checktime) = :month 
 ORDER BY checktime" ;
 $pre_msaccess_stmt = $mscon->prepare($st_msaccess_search);
 $pre_msaccess_stmt->execute([
	':biometric'	=>	 $_GET['biometricpin'],
	':year'	=>	  $_GET['year'],
	':month'	=>	$_GET['month']
 ]);

?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>H.R. DTR System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <!-- icheck bootstrap -->
    <!-- <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/datatables/datatables.select.min.css">
    <link rel="stylesheet" href="../plugins/datatables/datatables.jquery.select.min.css">
    <title><?php echo $_GET['biometricpin']?></title>
</head>

<body class="fixed-layout">
    <div class="content">
        <div class="row m-2">
            <div class="col-4">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../icons/add_employee.jpg"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $fullname?></h3>

                    <p class="text-muted text-center">Employee Details</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Employee Number</b> <a class="float-right"><?php echo $employeeNo?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Department</b> <a class="float-right"><?php echo $department?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Supervisor</b> <a class="float-right"><?php echo $supervisor?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="float-right"><?php echo $status?></a>
                        </li>
                    </ul>


                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="title text-center">
                            <h1>BIOMETRIC MACHINE TIME</h1>
                            <p>Note: This view logs </p>
                        </div>

                    </div>

                    <div class="card-body">
                        <table style = "font-size: 15px;
  padding: 10px;"class="table table-hover table-bordered align-middle text-center" id = "viewlogs">
                            <thead>
                                <th>Date</th>
                                <th>Time</th>
                                <th>State</th>
                                <th>Location</th>
                            </thead>
                            <tbody  >
                                <?php 
                                 while( $timeresult = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if($timeresult == 0){
                                        echo "failed";
                                    }else{
                                        //DISPLAYS THE TIME INTO THE INSERT LOG TABLE
                                    $sn = $timeresult['sn'];
                                       $checktime_time = date_create($timeresult['checktime']);
                                    
                                   $checktime = date_format($checktime_time,"h:i A");
                                    $checktype = $timeresult['checktype'];
                                    $checkstate = 'Check In';
                                    $checkColor = 'Green';
                               
                                       switch($sn){
                                           case "3569182360161":
                                           $location = "CED BTM";
                                           break;
                                           case "3486862430001":
                                           $location = "ITCSO BTM";
                                           break;
                                           case "3486862430384":
                                           $location = "CTO BTM";
                                           break;
                                           case "3569182360034":
                                           $location = "CMO BTM";
                                           break;
                                           case "3486862430380":
                                           $location = "PMSD BTM";
                                           break;
                                           case "3486862430309":
                                           $location = "CWD BTM";
                                           break;
                                           case "3486862430243":
                                           $location = "SP BTM";
                                           break;
                                           case "3486862430322":
                                           $location = "COA BTM";
                                           break;
                                           case "OGT7030057022400300":
                                           $location = "OCA BTM";
                                           break;
                                           case "OPH6040056041500373":
                                           $location = "CSWDO BTM";
                                           break;
                                           case "3486862430036":
                                               $location = "CHO BTM";
                                           break;
                                       }
                               
                               
                               
                                    switch($checktype){
                                       case "O":
                                           $checkstate = 'Check In';
                                           $checkColor = '#F3ED1A';
                                           break;
                                       case "0":
                                           $checkstate = 'Break Out';
                                           $checkColor = '#91FF61';
                                           break;
                                       case "1":
                                           $checkstate = 'Break In';
                                           $checkColor = '#FFC100';
                                           break;
                                       case "i":
                                       $checkstate = 'Check Out';
                                       $checkColor = '#00FFEC';
                                       break;
                               
                                    }
                                   }
                                 
                               
                                ?>
                                <tr >
                                    <td style = "color:black"><?php echo date_format($checktime_time ,"Y/m/d")?></td>
                                    <td style = "color:black"><?php echo $checktime?></td>
                                    <td style = "color:black"> <?php echo $checkstate?></td>
                                    <td style = "color:black"> <?php echo $location?></td>
                                </tr>
                                <?php }?>
</tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>

        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>  
        <script src="../plugins/datatables/jquery.dataTables.js"></script>

        <script>
            $("#viewlogs").DataTable({
              
            });
            </script>
</body>

</html>