<?php
//include('update_user.php');
include ("../php_scripts/search_user.php");

?>

<!DOCTYPE html>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee Records</title>
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
  <!-- Pace style -->
  <link rel="stylesheet" href="../bower_components/pace/pace.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Manage </b>Employees</span>
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
              <span class="hidden-xs">Hello <?php echo $user_name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/no-photo-icon.png"  class="img-rounded">
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
          <img src="../dist/img/no-photo-icon.png"  class="img-circle" alt="User Image">
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
      Employees
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
          <a href="add_employee">
            <button class="btn btn-primary btn-block margin-bottom" >
              Add Employees
            </button>                      
          </a>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>
              <div class="box-tools">
             <!--    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="../bower_components/TCPDF/User/blank" target="blank"><i class="fa fa-envelope-o"></i> Generate PDF</a></li>
                <li><a href="../bower_components/PHPExcel/Examples/blank"><i class="fa fa-envelope-o"></i> Export Data</a></li>
                <li><a href="import_data"><i class="fa fa-file-text-o"></i> Import Data</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Employee Record</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="get" action="<?php htmlspecialchars("PHP_SELF");?>">
              <div class="box-body">
            <table id = "users" class = "table table-bordered table-stripped">
                <thead>
                <tr>
                        <th> Full Name </th>
                        <th>Biometric Pin</th>
                        <th>Department</th>
                        <th>Work Schedule</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
            </thead>
            <?php
             $get_allusers_sql = "CALL spSearchEmployee($user_id)";
            $get_allusers_data = $con->prepare($get_allusers_sql);
            $get_allusers_data->execute([]);
             while($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr>
                        <td><?php echo ucfirst($user_data['firstName']) . '  ' . ucfirst($user_data['lastName']);?></td>
                       
                        
                        <td><?php echo $user_data['biometricPin'];?></td>
                        
                        <td><?php echo $user_data['departmentDescription'];?></td>
                        <td><?php echo $user_data['workSchedule'];?></td>
                        <td><?php echo $user_data['Status'];?></td>
                        <td>
                          <a class="btn btn-outline-success btn-xs" href="update_user.php?userpass=<?php echo $user_data['userpass'];?>&id=<?php echo $user_data['id_no'];?> "><i class="fa fa-check-square-o"></i>
                          </a>
                          &nbsp; 
                          <button class="btn btn-outline-danger btn-xs" data-role="confirm_delete" data-id="<?php echo $user_data['id_no']; ?>"><i class="fa fa-trash-o"></i></button>
                        </td>
                      </tr>

        
            <?php } ?>
                        </tbody>
                  
             </table>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-1"></div>
      </div>
    </section>
    <!-- /.content -->
    <!-- modals here -->
        <!-- modal here delete -->
        <div class="modal fade" id="deleteuser_Modal" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirm Delete</h4>
              </div>
              <form method="POST" action="<?php htmlspecialchars("PHP_SELF")?>">
                <div class="modal-body">  
                  <div class="box-body">
                    <div class="form-group">
                    <label>Delete Record?</label>
                    <input type="text" name="user_id" id="user_id" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left bg-olive" data-dismiss="modal">No</button>
                  <!-- <button type="submit" name="delete_user" class="btn btn-danger">Yes</button> -->
                  <input type="submit" name="delete_user" class="btn btn-danger" value="Yes">
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
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="../bower_components/pace/pace.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
     $('#users').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $(document).on('click', 'button[data-role=confirm_delete]', function(event){
      event.preventDefault();
      var user_id = ($(this).data('id'));
      $('#user_id').val(user_id);
      $('#deleteuser_Modal').modal('toggle');
    })
</script> 
</body>
</html>