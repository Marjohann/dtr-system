
<?php
include('../config/config.php');
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
<title>
Official Business
</title>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
<!--      <span class="logo-mini"><b>A</b>LT</span>-->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Travel </b>Order</span>
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
                  I am Jonard
                  <small>Member since Nov. 2019</small>
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
     <div class="content-wrapper">
         <section class="content-header">
      <h1>
      Add Travel Order
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
          <section class="content">
          <div class="col-lg">
               <div class="box box-primary">
                    <div class="box-header with-border">
              <h3 class="box-title">Search Employee</h3>
                   </div>
                   
                    <form role="form" method="get" action="<?php htmlspecialchars("PHP_SELF");?>">
                        <div class="box-body">
                              <table id = "employee" class = "table table-bordered table-hover"   action ="<?php htmlspecialchars("PHP_SELF");?>">
                                   <thead>
                <tr class = "emprow">
                        <th> Employee No </th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <!-- <th>Add</th> -->
                    </tr>
            </thead>
                 <?php
            //  $get_allusers_sql = "Select * from employee e inner join department d on e.department = d.deptId";
            //  $get_allusers_sql = "Select * from employee";

             $get_allusers_sql = "CALL spSearchEmployee($user_id)";

            $get_allusers_data = $con->prepare($get_allusers_sql);
            $get_allusers_data->execute([]);
             while($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr>
                         <td class= "empnumber"><?php echo $user_data['EmployeeNo'];?></td>
                        <td id= "fullName"><?php echo ucfirst($user_data['firstName']) . '  ' . ucfirst($user_data['lastName']);?></td>
                       
                                  
                        <td id= "dept"><?php echo $user_data['departmentDescription'];?></td>
                      
                        <!-- <td>
                          <a class="btn btn-outline-success btn-xs" href="update_user.php?userpass=<?php echo $user_data['userpass'];?>&id=<?php echo $user_data['id_no'];?> "><i class="fa fa-check-square-o"></i>
                          </a>
                          &nbsp; 
                          
                        </td> -->
                      </tr>

        
            <?php } ?>                  
                                  
                            </table>
                            <label>From:</label>
                           
                            <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control  " name="datefrom" id="dtefrom">
                                    </div>
                        
                         <label>To:</label>
                           
                            <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control  " name="dateto" id="dteto">
                                    </div>
                            <table id = "selemp" class = "table table-bordered table-hover" action ="<?php htmlspecialchars("PHP_SELF");?>">
                                <thead>
                                    <th>
                                          <tr id = "selectedrow " >
                        <th> Employee No </th>
                        <th>Full Name</th>
                        <th>Department</th>
                        
                      
                    </tr>
                                </thead>
                                <tbody id = "selbody" onclick = "deleteRow(this)">
                        </tbody>
                            </table>
                   </form>
                   
                </div>
                   
                   
            </div>
              
              
         </div>
         
    </section>   
             
    </section>
    </div>
     
    </div>
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
    
<script type="text/javascript">

$(document).ready(function() {

$(document).ajaxStart(function () {
  Pace.restart()
})  

});
      $('#employee').DataTable({
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

//Function to get the values inside the table
var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];
tbody.onclick = function (e) {
    e = e || window.event;
    var empno = [];
    var  fullname = [];
    var  department= [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) {
        var cells = target.getElementsByTagName("td");
        // for (var i = 2; i = cells.length; i) {
            empno.push(cells[0].innerHTML);
            fullname.push(cells[1].innerHTML);
            department.push(cells[2].innerHTML);
        // }
    }

   
  //To catch the value from the first table and display to the second table
    var table = document.getElementById("selbody");

    var row = table.insertRow(0);
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3= row.insertCell(2);
    cell1.innerHTML = empno;
    cell2.innerHTML = fullname;
    cell3.innerHTML = department;
};

function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("selbody").deleteRow(i);
}
    </script>
</body>
</html>
