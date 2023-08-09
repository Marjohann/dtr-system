<?php
//include('update_user.php');
include("../php_scripts/search_user.php");

?>

<!DOCTYPE html>
<html>
<?php 
$titlename = 'Users';
include('dtrdesign/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php include('dtrdesign/navbar.php');
      include('dtrdesign/sidebar.php');

 ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
                     <section class="content">
                       <div class="container-fluid">
                         <div class="row">
                           <div class="col-3">
                             <div class="box box-solid" style="width:50%;">
                               <a href="add_user.php">
                                 <button class="btn btn-primary btn-block margin-bottom">
                                   Add User
                                 </button>
                               </a>
                             </div>
                           </div>
                         </div>
                         <div classs="row">
                           <div class="col-9 pull-right ">
                             <div class="card">


                               <form role="form" method="get" action="<?php htmlspecialchars("PHP_SELF");?>">
                                 <div class="box-body">
                                   <table id="users" class="table table-bordered table-hover">
                                     <thead>
                                       <tr>
                                         <th> Full Name </th>
                                         <th>Username</th>
                                         <th>Options</th>
                                       </tr>
                                     </thead>
                                     <?php while ($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                     <tr>
                                       <td>
                                         <?php echo ucfirst($user_data['firstName']) . '  ' . ucfirst($user_data['lastName']);?>
                                       </td>


                                       <td><?php echo $user_data['username'];?></td>
                                       <td>
                                         <a class="btn btn-outline-success btn-xs"
                                           href="update_user.php?userpass=<?php echo $user_data['userpass'];?>&id=<?php echo $user_data['id_no'];?> "><i
                                             class="fa fa-check-square-o"></i>
                                         </a>
                                         &nbsp;
                                         <button class="btn btn-outline-danger btn-xs" data-role="confirm_delete"
                                           data-id="<?php echo $user_data['id_no']; ?>"><i
                                             class="fa fa-trash-o"></i></button>
                                       </td>
                                     </tr>


                                     <?php } ?>
                                     </tbody>

                                   </table>
                                 </div>
                             </div>
                             <!-- /.box-body -->
                             </form>
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

<?php include('dtrdesign/footer.php');?>
    <script>
      $(function () {
           $("#users").DataTable();

  });

    </script>
</body>
</html>
