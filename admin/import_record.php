<?php
//include('update_user.php');
include ("../config/msconfig.php");
include ("../config/config.php");
//include ("../php_scripts/import_employee.php");
// include ("search.php");
//1.1 select employees in employee table
$datefrom=$dateto=$selemployee ='';
$db = '';
$st_get_employee = "SELECT CONCAT(firstName,' ', SUBSTRING(middleName,1,1),'.',' ',lastName) as fullName, employeeNo as empno, biometricPin as biopin from employee";
$result = $con->prepare($st_get_employee);
$result->execute();
 //1.1 end
if(isset($_POST['import'])){
  $selemployee = $_POST['sel_employee'];
 $datefrom = $_POST['datefrom'];
 $dateto= $_POST['dateto'];
    $timeIn = "O";
    $brkout = "0";
    
 //1.2 insert blank records in dailytimerecord
 $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
 $pre_insert_dtr = $con->prepare($stmt_insert_dtr);
 for($i=$datefrom;$i<=$dateto;$i++){

      $pre_insert_dtr ->execute([ 
          ':empno' =>$selemployee,
          ':i' =>$i
     
    ]);
    $result = $con->prepare($st_get_employee);
     $result->execute();
    while ($employee = $result->fetch(PDO::FETCH_ASSOC)) { 
      $empNo = $employee['empno'];
      $bioPin = $employee['biopin'];
      $date_format = 'HH:MM';
        $format_current_date = date_create($i);
      $date_format_2 = date_format($format_current_date,"n/j/Y");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;
      $st_msaccess_search = "Select FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,CHECKINOUT.CHECKTYPE as checktype ,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%'";
      $pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
      $pre_msaccess_stmt->execute();
      while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
        $chktime =  $time_result['checktime'];
        $chktype = $time_result['checktype'];
//          echo $bioPin;
//          echo $date_format_2;
//       echo $chktime;
//        echo $chktype;
         
        if($chktype == $timeIn){
         
          $insert_timeIn = "CALL spInsertTimeIn(:empno,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
              ':empno' =>$empNo,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          if($chktype == $brkout){
          
          $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          $timeInPm = "1";
          if($chktype == $timeInPm){
          
          $insert_timeIn = "CALL spInsertTimeInPM(:empno,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
              
        }
           $timeOutPM = "i";
            if($chktype == $timeOutPM ){
          
          $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
              
        }
      }

    }
    if($i == $dateto){
      break;
    }
  }
    

}
?>

<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Import Biometric Records</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../dist/css/custom.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../adminlte2/bower_components/select2/dist/css/select2.min.css">
    <!-- Pace style -->
    <link rel="stylesheet" href="../bower_components/pace/pace.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Import </b>Records</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="" style="font-size: 2rem;"><i class="fa fa-user"></i></span>
                                <span class="hidden-xs">Hello </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../dist/img/no-photo-icon.png" class="img-rounded">
                                    <p>
                                        I am Sheena
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php">
                                            <input type="submit" class="btn btn-default btn-flat" name="signout" id="signout" value="Sign Out">
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- </form> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../dist/img/no-photo-icon.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Jonard A. Mondero</p>
                        <a href=""><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">ACCOUNT SETTINGS</li>
                    <li class="">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="fa fa-envelope"></i> <span>My profile</span>
                        </a>
                    </li>
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="users">
                            <i class="fa fa-envelope"></i> <span>Manage Employees</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="send_email">
                            <i class="fa fa-envelope"></i> <span>Send Email</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Import Biometric Records
                    <!-- <small>Version 2.0</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../index"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <!-- <a href="add_employee">
            <button class="btn btn-primary btn-block margin-bottom" >
              Add Employees
            </button>                       -->
                        </a>
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <!-- <h3 class="box-title">Folders</h3> -->
                                <div class="box-tools">
                                    <!--    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <!-- <ul class="nav nav-pills nav-stacked"> -->
                                <!-- <li><a href="../bower_components/TCPDF/User/blank" target="blank"><i class="fa fa-envelope-o"></i> </a></li>
                <li><a href="../bower_components/PHPExcel/Examples/blank"><i class="fa fa-envelope-o"></i> </a></li>
                <li><a href="import_data"><i class="fa fa-file-text-o"></i> </a></li> -->
                                <!-- </ul> -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Import Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" name="form" action="<?php htmlspecialchars("PHP_SELF");?>">
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile" name="dburl">

                                    <p class="help-block">Importing logs may take some time.Please be patient.</p>
                                </div>

                                <div class="form-group">
                                    <label>Date From:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right" name="datefrom" id="iddatefrom">
                                    </div>
                                    <br>
                                    <br>


                                    <div class="form-group">
                                        <label>Date To:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right" name="dateto" id="iddateto">
                                        </div>


                                        <div class="form-group">
                                            <label>Employee Name:</label>
                                            <input readonly type="text" id="employeenum" class="form-control" name="employee_num" placeholder="Employee Number">

                                        </div>
                                        <!-- <?php
              //   $chkValue='';
              //   if(isset($_POST['indemp']))
              //   {
              //     $chkValue='enabled';
              //   }
              // else{$chkValue='disabled';
                // }
                ?> -->
                                        <!-- <script type = "text/javascript" src ="http://code.jquery.com/jquery-1.8.2.js"></script>
                <script type = "text/javascript" src = "../autocomplete/jquery.autocomplete.js"></script>
                <script type = "text/javascript" src = "../autocomplete/jquery-1.4.2.min_.js"></script> -->




                                        <!-- <input type = "checkbox"  id ="indemp" onclick="selectImport()">
                  <div class="input-group-addon"> -->

                                        <!-- <input type="text" class="form-control pull-right" id ="idname" name="empname"   placeholder="Employee Name"  value="" >
                   </div> -->

                                        <div class="form-group">
                                            <select class="form-control select2" id="select_employee" style="width: 100%;" onchange="getEmployee()" name="sel_employee">
                                                <option selected="selected">Select Employee</option>

                                                <?php 
                        while ($employee = $result->fetch(PDO::FETCH_ASSOC)) { 
                        //  echo "<option value='"$employee['firstName'] . ' ' .$employee['middleName'] . ' ' . $employee['lastName']"'> </option>";
                        $employeefn = $employee['fullName'];
                        // $empno = $employee = ['EmployeeNo'];
                        echo "<option value = ".$employee['empno'].">" .$employeefn. "</option>";

                         } ?>
                                            </select>
                                        </div>


                                        <input type="submit" class="btn btn-primary" name="import" value="Import">

                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
        </div>
        <!-- /.content-wrapper -->
        <!-- footer here -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; <?php echo 2018; ?>.</strong> All rights
            reserved.
        </footer>
    </div>

    <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


    <!-- java scripts -->
    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- PACE -->
    <script src="../bower_components/pace/pace.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <script type="text/javascript">
        function getemployee() {

            var employee_list = document.getElementById("select_employee").value;
            $('#employeenum').val(employee_list);
        }

        $(document).ready(function() {

            $(document).ajaxStart(function() {
                Pace.restart()
            })

            //select 2
            $('.select2').select2();


        });


        // function selectImport(){
        //   var checkBox = document.getElementById("indemp");
        //   var textbox = document.getElemenentById("idname");
        // if(checkBox.checked == true){
        //   document.getElementById("idname").setAttribute("enabled"));
        //   // textbox.setAttribute = "enabled";
        //   }
        // else
        //   {
        //   document.getElementById("idname").setAttribute("disabled"));
        //   }
        // }

    </script>
</body>

</html>
