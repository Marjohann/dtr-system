<?php
//include('update_user.php');
// include ("../php_scripts/showdtr.php");
include ('../php_scripts/insert_new_employee.php');
include ('../php_scripts/upload_image.php');
include ('design/header.php');
include ('design/navbar.php');
include ('design/sidebar.php');

$alert_msg = '';
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
          
            <div class="row md-6">
          <div class=" col-md-12 bg-white" >
              
            <h2  style="align:center;margin-top:6px;text-align:center;margin-bottom:auto;font-family: Times New Roman, Times, serif;">PERSONNEL INFORMATION SYSTEM</h2><br>
              
          </div><!-- /.col -->
            
<!--
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
            </ol>
          </div> /.col 
-->
        </div><!-- /.row -->
         <div class = "row">     
    <div class = "col-md-8 border p-3">          
    <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>" enctype="multipart/form-data">
        <?php include ('elements/pis_table.php');?>
        </div>
        
        <div class = "col-md-4 border" style="background-color:hsl(0, 0%, 71%);">
            <div class="image" id ="image">
          <img src="../dist/img/scc%20logo.jpg" class="img-circle elevation-2" alt="User Image" style="margin-top:50px;margin-left:20px;width:300px;height:300px;";  >
              
                
        </div>
        </div> 
        <br>
         <br> 
        <br>
        
       
        <div class=" border p-3 col-md-7 ">
          <div class="input-group ">
            <label> Employee No:  </label> &nbsp;
        <div style = "width:40 px ">
            <input readonly type="text" class= "form-control" name = "empnum" id ="empnum" >
      </div>
              &nbsp;  &nbsp; &nbsp;
               <label> Civil Status:  </label>  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:100px">
            <input readonly type="text" class= "form-control" name = "civil" id ="civil" >
              
            </div>
        <br>
               <br> 
             <div class="input-group ">
             <label> First Name:  </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div style = "width:40 px">
            <input readonly type="text" class= "form-control" name = "fname" id ="fname" >
      </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <label> Date of Birth:  </label>   &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:120px">
            <input readonly type="text" class= "form-control" name = "bday" id ="bday" >
              
            </div>
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Middle Name: </label> &nbsp;
        <div style = "width:40 px">
            <input readonly type="text" class= "form-control" name = "mname" id ="mname" >
             
      </div> &nbsp; &nbsp;&nbsp;&nbsp;
                 <label> Sex:  </label>   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        <div style = "width:100px">
            <input readonly type="text" class= "form-control" name = "sx" id ="sx" >
              
            </div>
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Last Name:  </label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:40 px">
            <input readonly type="text" class= "form-control" name = "lname" id ="lname" >
      </div> &nbsp; &nbsp;&nbsp;&nbsp;
          <label> Height:  </label>   &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
        <div style = "width:100px">
            <input readonly type="text" class= "form-control" name = "hght" id ="hght" >
              
            </div>
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Residential Address:  </label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:400px">
            <input readonly type="text" class= "form-control" name = "raddress" id ="raddress" >
      </div>
          
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Res. Adrs. Zip Code: </label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <div style = "width:100px">
            <input readonly type="text" class= "form-control" name = "rzipcode" id ="rzipcode" >
      </div>
          
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Residential Tel. No.:  </label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:150px">
            <input readonly type="text" class= "form-control" name = "rtelno" id ="rtelno" >
      </div>
          
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Permanent Address:  </label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:400px">
            <input readonly type="text" class= "form-control" name = "paddress" id ="paddress" >
      </div>
          
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Prmnt. Adrs. Zip Code:  </label> &nbsp;&nbsp;&nbsp;
        <div style = "width:100px">
            <input readonly type="text" class= "form-control" name = "pzipcode" id ="pzipcode" >
      </div>
          
                  <br>
               <br> 
            </div>
             <div class="input-group ">
             <label> Permanent Tel No.:  </label> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:150px">
            <input readonly type="text" class= "form-control" name = "ptelno" id ="ptel" >
      </div>
          
                  <br>
               <br> 
            </div>
            
           
          
                  <br>
               <br> 
            </div>
            
        </div>
        <div class="border p-3  col-md-5 ">
             <div class="input-group ">
             <div class = "input-group">
             <label> Blood type:  </label>  &nbsp; &nbsp;&nbsp;&nbsp;
        <div style = "width:80px;margin-right:40px">
            <input readonly type="text" class= "form-control" name = "btype" id ="btype"  >
      </div>
                 <label style= "margin-right:20px"> Weight:  </label>  
        <div style = "width:80px">
            <input readonly type="text" class= "form-control" name = "wght" id ="wght" >
      </div>
      </div>
                 <br>
                 <br>
                 <div class = "input-group">
                  <label> Contact No.:  </label> &nbsp;&nbsp;
        <div style = "width:200px;margin-right:40px ">
            <input readonly type="text" class= "form-control" name = "cnumber" id ="cnumber" >
      </div>
                 </div>
                 
                 <br>
                 <br>
                 <div class = "input-group">
                   <label> Pag-ibig No.:  </label> &nbsp;&nbsp;
        <div style = "width:200px;margin-right:50px">
            <input readonly type="text" class= "form-control" name = "pgibig" id ="pgibig" >
      </div> 
                 </div>
                  <br>
                 <br>
                 <div class = "input-group">
                  <label style="margin-right:30px"> Issued at:  </label> 
        <div style = "width:200px">
            <input readonly type="text" class= "form-control" name = "pgibigissued" id ="pgibigissued" >
      </div>
                 </div>
                <br>
                 <br>  
                <div class = "input-group">
                   <label style="margin-right:10px"> Philhealth No.:  </label> 
                 <div style = "width:180px;margin-right:80px">
            <input readonly type="text" class= "form-control" name = "pnumber" id ="pnumber" >
                </div>
                 </div>
                 <br>
                 <br>  
                  <div class = "input-group">
                   <label style="margin-right:30px"> Issued at:  </label>
                 <div style = "width:200px;margin-right:100px">
            <input readonly type="text" class= "form-control" name = "pissued" id ="pissued" >
                </div>
                 </div>
                 <br>
                 <br> 
                  <div class = "input-group">
                   <label style="margin-right:70px"> TIN:  </label> 
                 <div style = "width:200px;margin-right:100px">
            <input readonly type="text" class= "form-control" name = "tin" id ="tin" >
                </div>
                 </div>
                 <br>
                 <br>  
                    <div class = "input-group">
                   <label style="margin-right:30px"> GSIS No.:  </label> 
                 <div style = "width:200px;margin-right:100px">
            <input readonly type="text" class= "form-control" name = "gsisno" id ="gsisno" >
                </div>
                 </div>
                  <br>
                 <br> 
                  <div class = "input-group">
                   <label style="margin-right:35px"> CTC No.:  </label>
                 <div style = "width:200px;margin-right:100px">
            <input readonly type="text" class= "form-control" name = "ctc" id ="ctc" >
                </div>
                 </div>
                   <br>
                 <br>  
                  <div class = "input-group">
                   <label style="margin-right:10px"> GSIS UMID No.:  </label> 
                 <div style = "width:175px">
            <input readonly type="text" class= "form-control" name = "gsisumid" id ="gsisumid" >
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            </div>
            </div>
            
        </div>
       
            </form>
        
        </div>
      </section>
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar --> 
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!--<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="../plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<!--<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!-- jvectormap -->
<!--<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="../plugins/knob/jquery.knob.js"></script>-->
<!-- daterangepicker -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
<!--<script src="../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- datepicker -->
<!--<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>-->
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="../dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="../dist/js/demo.js"></script>-->
 
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../admin%202/javascript/pisform.js"></script>
    
   
</body>
    
    
</html>
