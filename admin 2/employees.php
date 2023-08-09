<?php
$titlename = 'Employees';
include_once('reject_user_account.php');
include ('dtrdesign/header.php');
include('../config/config.php');
include('session.php');
$alert_msg='';
include('sql/save_employee.php');
// $select_emp = "CALL spGetAllEmployee";
// $prep_emp = $con->prepare($select_emp);
// $prep_emp->execute();

$getAllEmployees = "SELECT (SELECT COUNT(EmployeeNo) FROM bioinfo  ) AS totalemp,
(SELECT COUNT(EmployeeNo) FROM bioinfo WHERE STATUS = 'Active') AS activeemp,
	(SELECT COUNT(employeeNo) FROM bioinfo WHERE STATUS = 'Not Active') AS notactive ,
	(SELECT COUNT(employeeNo) FROM bioinfo WHERE employmentStatus = 'Job Order' AND status = 'Active') AS joborders,
	 (SELECT COUNT(employeeNo) FROM bioinfo WHERE employmentStatus = 'Regular' AND status = 'Active') AS regulars,
     (SELECT COUNT(employeeNo) FROM bioinfo WHERE employmentStatus = 'Contractual' AND status = 'Active') AS contractual
	FROM bioinfo";
$stmt = $con->prepare($getAllEmployees);
$stmt->execute();
$getNoEmployees ;
$getActive ;
$getInActive;
$jobORders;
$regulars;
$contractual;
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $getNoEmployees =   $result['totalemp'];
    $getActive =   $result['activeemp'];
    $getInActive =   $result['notactive'];
    $jobORders = $result['joborders'];
    $regulars = $result['regulars'];
    $contractual = $result['contractual'];
}


?>

<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include ('dtrdesign/navbar.php');
  include('dtrdesign/sidebar.php');
?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row col-12">
                        <!--  <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employees</h1><br>
              
          </div>-->
                        <div class="col-2">
                            <div class="small-box bg-primary ">
                                <div class="inner">
                                    <h3><?php echo $getNoEmployees?></h3>
                                    <p>Employees</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-plus" id="addemp"  data-toggle="modal"  data-target="#addemployee"></i>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="small-box bg-warning ">
                                <div class="inner">
                                    <h3><?php echo $getActive?></h3>
                                    <p>Active Employees</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-user" ></i>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="small-box bg-danger ">
                                <div class="inner">
                                    <h3><?php echo $getInActive?></h3>
                                    <p>In-Active Employees</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-user" ></i>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="small-box bg-info ">
                                <div class="inner">
                                    <h3><?php echo $regulars?></h3>
                                    <p>Regular Employees</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-user" ></i>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="small-box bg-info ">
                                <div class="inner">
                                    <h3><?php echo $jobORders?></h3>
                                    <p>Job Order Employees</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-user" ></i>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="small-box bg-info ">
                                <div class="inner">
                                    <h3><?php echo $contractual?></h3>
                                    <p>Contractual</p>
                                </div>
                                <div class="icon mt-4">
                                    <i class="fa fa-user" ></i>
                                </div>
                        </div>       
                        <div class="row">
                            <div class="col-12">
                        <div class="form-group has-feedback ">
                            <?php echo $alert_msg; ?>
                              </div>
                              </div> 
                              </div>
                      
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- Small boxes (Stat box) -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <div class="row">
                                        <h3 class="card-title text-bold">EMPLOYEE'S TABLE</h3>
                                       
                              </div>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">
                                            <?php include('elements/tbl_employee.php')?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include('modal/add_employee_modal.php');?>
            <?php include('modal/add_worksched_modal.php');?>
            <?php include('modal/update_supervisor_modal.php');?>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0-alpha
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include('dtrdesign/footer.php');?>
    <script src="javascript/employee_script.js"></script>
    <script>

    </script>
</body>

</html>