<?php 
$titlename = 'Department';
include('reject_user_account.php');
include ('dtrdesign/header.php');
include('../config/config.php');
include('../php_scripts/add_department.php');
include('session.php');
$alert_msg = '';

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
          <div class ="col-2">
            <button class = "btn btn-primary" 
            id = "adddept" data-toggle="modal" 
            data-target="#add_department">
            Add Department 
            </button>
          </div>
           <div class="form-group has-feedback col-8">
             <?php echo $alert_msg;?>
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
        <div class = "row">
          <div style="height: 500px;"class ="col-12" >
          <div class="card card-primary">
               <div class="card-header">
                <h3 
                class="card-title">Departments
                </h3>
              </div>
              <div class = "card-body">
                <div class ="row">
                <div class = "col-12">
              <form role="form" 
              method="post" 
              name="form" 
              action="<?php htmlspecialchars("PHP_SELF");?>">
            <?php include ('elements/department_table.php'); 
            include ('modal/add_department_modal.php');
            include('modal/edit_department_modal.php');?>
      

              </form>
              </div>
            </div>
           </div>
       </div>
         </div>
         </div>
           </div>
           </div>
           </div>
    </section>



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

<!-- jQuery -->
<?php include('dtrdesign/footer.php');?>

<script>
	$(document).ready(function(){
      $('.select2').select2();
	$('#department').DataTable({
	  	'paging'      : true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'stateSave'   :true
    
	});


  $("#department tbody").on("click", "#edit", function () {

    event.preventDefault();
    console.log('test');
    $("#edit_department").modal('show');
    var currow=  $(this).closest('tr');
    var col1 = currow.find('td:eq(0)').text();
    var col2 = currow.find('td:eq(1)').text();
    $('#edit-deptId').val(col1);
    $('#edit-deptname').val(col2);

  })
  });
</script>
</body>
</html>