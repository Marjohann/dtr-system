<?php
//include('update_user.php');
// include ("../php_scripts/showdtr.php");
include ('../php_scripts/insert_new_employee.php');
include ('../php_scripts/upload_image.php');
include ('design/header.php');
include ('design/navbar.php');
include ('design/sidebar.php');
$datesearch='';
$setdate= date('n/j/Y');
$alert_msg = '';
$bnumber = '';

?>
<!DOCTYPE html>

<html>
  <body class="hold-transition sidebar-mini">
      <div class="wrapper">
          
          <div class="content-wrapper">
              
               <section class="content">
        <div class="container-fluid">
          
            <div class="row md-6">
          <div class=" col-md-12 bg-white" >
              
            <h2  style="align:center;margin-top:6px;text-align:center;margin-bottom:auto;font-family: Times New Roman, Times, serif;">VIEW BIOMETRIC RECORD</h2><br>
              
          </div><!-- /.col -->
          </div>
          <div class = "col-md-10"> 
             <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>" enctype="multipart/form-data">
                 <div class="input-group" style ="padding-bottom:40px;">
               <label style="margin-right:20px"> Enter Biometric Pin:</label>
                     <div  style ="width:200px;padding-right:20px">
                         <input type = "text" name ="pin"  placeholder = "Enter Pin" class ="form-control" value = "<?php if(isset($_POST['pin'])){ echo $_POST['pin'];} echo $bnumber; ?>">
                         </div> 
                     
                     <label style="margin-right:10px">Date:</label>
                     <i style="padding-top:10px;padding-right:10px"class="fa fa-calendar"></i>
                     <div class="date col-md-3" >

                         <input type="text" class="form-control" id="datepicker" placeholder = "Select Date" autocomplete="off" name="datefrom" value="<?php  if(isset($_POST['datefrom'])){ echo $_POST['datefrom'];} echo
                                $datesearch; ?>">
                     </div>
                     <input type="submit"  name = "search" class="btn btn-primary " value="Search" style="height:40px">
                     </div>
                 <div class="col-md-12" >
                 <table id = "viewlogs" class = "table table-bordered table-hover" style ="margin-left:90px;">
                 <thead>
                     </thead>
                     <th>Name</th>
                     <th>Pin</th>
                     <th>Date</th>  
                     <th>Time</th>           
                     <th>Transaction</th>
                     <th>Machine Used</th>
                    <?php include ('elements/view_logtable.php')?>
                 </table>
                     </div>
            </form>
        
            
            </div>
      </div>
              </section>
          </div>
      </div>
      
      
      <script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
 
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
      
      <script>
         $('#datepicker').datepicker({
            autoclose: true
        })
      </script>
    </body>
    
    
</html>