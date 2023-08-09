 <?php
include('../config/config.php');

if(isset($_POST['find'])){
 
  
  $depid  = $_POST['department'];
  // echo "<pre>";
  // echo jonard;
  // print_r($deptdesc);
  // echo "</pre";
$sql ="SELECT deptId from department where departmentDescription = :depid";
$prep_stmt = $con->prepare($sql);
$prep_stmt -> execute([
  
 ':depid' => $deptdesc
]);
while ($result = $prep_stmt->fetch(PDO::FETCH_ASSOC)) {
  $deptId2 = $result['deptId'];
  
}
}



// function for showing the data in the table
function showDtr(){
  $data['dtr']=$this->mdl_onchange->get_dtr();
  $this->load->view('form_onchange',$data);
}

?>
 

<!DOCTYPE html>

   
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR Information System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- Custom CSS -->
  <link rel="stylesheet" href="../dist/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="../bower_components/pace/pace.css">
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">


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
      <span class="logo-lg"><b>DAILY TIME RECORD</b></span>
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
                <img src="../dist/img/no-photo-icon.png"  class="img-rounded">
                <p>
                  I am Jonard
                  <small>Member since Nov. 2019</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="">
                      <input type="submit" class="btn btn-default btn-flat" name="signout" id="signout" value="Sign Out">
                    </a>
                </div>
              </li>
            </ul>
          </li>

          </form>

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
        <li>
          <a href="">
            <i class="fa fa-user"></i> <span>My profile</span>
          </a>
        </li>
        <li class="header">TRANSACTIONS</li>
        <li>
          <a href="employee">
            <i class="fa fa-user"></i> <span>Add Employee</span>
          </a>
        </li>
        <li>
          <a href ="import_record">
            <i class ="fa fa-user"></i><span> Import Biometric Record</span>
          </a>
        </li>
        <li>
        <li>
          <a href ="officialbusiness">
            <i class ="fa fa-calendar"></i><span> Add Travel Order</span>
          </a>
        </li>
        <li>
          <a href ="">
            <i class ="fa fa-calendar"></i><span> Apply for leave</span>
          </a>
        </li>
            
        <li class="header">TRANSACTIONS</li>
        <li>
          <a href ="users">
            <i class ="fa fa-user"></i><span> Manage Users</span>
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
          Daily Time Record
    
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
<!--         <div class="row">-->
        <div class="col-md-4">
        <div class = "box box-body no-padding   ">
            <div class = "box-header with-border no-padding no-margin">
             <label>Department:</label>
        </div>
            <br>
            
<!--            <div class="col-md-10">-->
          
            <select class="form-control select2 no-padding" style= "width:340px" name="department" id = "deptId" placeholder="Select" value="<?php echo $department; ?>">
            <?php
             
                     $get_user_sql = "SELECT * FROM department";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result['deptId'];
                        $deptdesc = $result['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                </select>
            <br>
                <input type="submit" class="btn btn-primary pull-left" name="find" value="Search">
            </div>
        
        <br>
            <div class="col-md-15 no-padding">
            <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title">Employee Name</h3>
            </div>
            <div class="box-body no-padding">
             <form role="form" method="post" action="<?php htmlspecialchars("PHP_SELF");?>">
              <div class="box-body">
            <table id = "users" class = "table table-bordered table-hover" >
            <thead>
            <th> Employee No. </th>
                <th> Full Name </th>
                <th> show</th>
                </thead>
               
                <tbody id = "usertbody">
               
                <?php
                
    
             $get_allusers_sql = "Select * from employee e inner join department d on e.department = d.deptId  where e.department= '$deptId'";
            $get_allusers_data = $con->prepare($get_allusers_sql);
            $get_allusers_data->execute([]);
                
             while($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr id = "userrow"> 
                    <td style="width:120px" name = "employeeno" ><?php echo $user_data['EmployeeNo'];?></td>
                    <td><?php echo ucfirst($user_data['firstName']) . '  ' . ucfirst($user_data['lastName']);?></td>
                       
                       </tbody>
                  </tr>
              
             <?php } ?>
           
                        
                  
             </table>
             <ul>
 </div>
 
  
                 
        </div>
        </div>
     
    </div>
            
            
           
            </div>
        
                            <!--        DTR TABLE-->
                        <div class="col-md-8 pull-right no-padding no-margin">
                        <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Employee DTR Time</h3>
                            </div>
                            <label>From:</label>
                            <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right " name="datefrom" id="dtefrom">
                                    </div>
                            <label>To:</label>
                            <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right " name="dateto" id="dteto">
                                    </div>
                            <table id="dtr" class ="table table-bordered table-stripped" action ="<?php htmlspecialchars("PHP_SELF");?>">
                                <thead>
                                    <tr>
                                        <th>Check In</th>
                                        <th>Break Out</th>
                                        <th>Break In</th>
                                        <th>Check Out</th>
                                        <th>Overtime In</th>
                                        <th>Overtime Out</th>
                                   
                                </thead>
                                
                                </tr>
                            </table>
                            
                                </div>
                                    </div>
<!--
            <br>
             <br>
             <br>
             <br>
              <br>     
-->

<!--LIST OF EMPLOYEES TABLE-->
   
        
        
      
         
  <!-- footer here -->
    <footer class="main-footer">
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
      
    </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../adminlte2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../adminlte2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="../adminlte2/bower_components/pace/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte2/dist/js/adminlte.min.js"></script>
<script src="../adminlte2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../adminlte2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {

    $(document).ajaxStart(function () {
      Pace.restart()
    })  

  });
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

    
    $('#dtr').DataTable({
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

<script>
$(document).ready(function(){
  $("users").click(function(){
  alert("clicked");
  });

});
</script>

</body>
</html>

