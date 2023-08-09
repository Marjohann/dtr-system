<?php
//include('update_user.php');
// include ("../php_scripts/showdtr.php");
include ('../php_scripts/insert_new_employee.php');
include ('../php_scripts/upload_image.php');
$alert_msg = '';
$btnNew ='disabled';
$btnStatus =''; 
include ('design/header.php');
include ('design/navbar.php');
include ('design/sidebar.php');
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <as

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            
            <div class="row md-6 bg-white">
          <div class=" col-md-6">
              
            <h2 class="m-0 text-dark ">Add New Employee</h2><br>
              
          </div><!-- /.col -->
            
<!--
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
            </ol>
          </div> /.col 
-->
        </div><!-- /.row -->
            
              
    <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>" enctype="multipart/form-data">
        <div class = "image border img-square elevation-2 col-md-3 middle" style = "width:300px;margin:auto;" >
        <img src="../dist/img/scc%20logo.jpg" class=" elevation-2" style="margin-top:20px;margin-left:25px;margin-bottom:20px;width:200px;height:200px";   id="image" >
        </div>
         <div class = "col-md-3" style="margin-left:470px">
               <label>Upload Picture</label>
            <input type ="file" name="myFile" id="fileToUpload"  onchange = "loadImage()">
              </div> 
                   <?php echo $alert_msg; ?>
             </div>
        <div class="input-group ">
           
            <div class = "col-md-3">
            <label> Employee No</label>
            <input type="text" class= "form-control" name = "empnum"   value = "<?php echo $empnum ?>"  required>
                </div>
            <div class = "col-md-3">
            <label> First Name</label> 
            <input type = "text" class="form-control" name = "fname"  value = "<?php echo $fname?>" >
            </div>
        
             <div class = "col-md-3">
            <label> Last Name</label> 
            <input type = "text" class="form-control" name = "lname"   value = "<?php echo $lname ?> ">
            </div>
                <div class = "col-md-3">
               <label> Middle Name</label>
            <input type = "text" class="form-control" name = "mname" value = "<?php echo $mname ?>">
            </div>
        </div>
        <br>
          <div class="input-group">
            <div class = "col-md-6">
               <label> Residential Address</label>
            <input type = "text" class="form-control" name= "resaddress" value = "<?php echo $resaddress ?>">
            </div>
            <div class = "col-md-2">
               <label> Zip Code</label>
            <input type = "text" class="form-control" name = "rzipcode" value = "<?php echo $rzipcode ?>">
              </div>  
              <div class = "col-md-2">
              <label> Tel No.</label>
            <input type = "text" class="form-control" name = "rtelno" value = "<?php echo $rtelno ?>">
              </div>
              <div class = "col-md-2">
              <label> Citizenship</label>
            <input type = "text" class="form-control" name = "ctship" value = "<?php echo $ctship ?>">
              </div>
        </div>
              <br>
         <div class="input-group">
               <div class = "col-md-6">
               <label> Permanent Address</label>
            <input type = "text" class="form-control" name = "peraddress" value = "<?php echo $peraddress ?>">
              </div>
               <div class = "col-md-2">
              <label> Zip Code</label>
            <input type = "text" class="form-control" name = "perzipcode" value = "<?php echo $perzipcode ?>" >
              </div>
             <div class = "col-md-2">
              <label> Tel No.</label>
            <input type = "text" class="form-control" name = "pertelno" value = "<?php echo $pertelno ?>">
              </div>
              <div class = "col-md-2">
              <label> Civil Status</label>
            <select  class = "form-control " name = "cstatus"  value = "<?php echo $cstatus ?>" >
                <option>Single</option>
                 <option>Married</option>
                 <option>Widowed</option>
                 <option>Seperated</option>
                  </select>
              </div>
             </div>
              
          
            <br>
        <div class ="input-group">
             <div class = "col-md-2">
               <label> Date of Birth</label>
            <input type = "text" class="form-control" data-provide="datepicker" name = "bday"  value = "<?php echo $bday ?>" >
              </div> 
             <div class = "col-md-2">
               <label>Sex</label>
           <select class = "form-control " name ="sx" value = "<?php echo $sx ?>">
               <option >Male</option>
               <option>Female</option>
                
                 </select>
                 
              </div> 
             <div class = "col-md-2">
               <label>Height(cm)</label>
            <input type = "text" class="form-control" name = "hght"   value = "<?php echo $hght ?>">
              </div> 
             <div class = "col-md-2">
               <label>Blood Type</label>
             <select class = "form-control " name = "btype"  value = "<?php echo $btype ?>">
               <option >A</option>
               <option>B</option>
                 <option>AB</option>
                  <option>O</option>
                  <option>O + </option>
                 </select>
              </div> 
            <div class = "col-md-1">
               <label>Weight</label>
            <input type = "text" class="form-control" name = "wght"  value = "<?php echo $wght ?>">
              </div> 
            <div class = "col-md-3">
               <label>Contact Number</label>
            <input type = "text" class="form-control" name = "cnumber"  value = "<?php echo $cnumber ?>">
              </div> 
        </div>
            <br>
            <div class = "input-group ">
            <div class = "input-group border col-md-5 w-50  p-3" >
                
                 <div class = "col-md-6">
               <label>Pag-ibig No.</label>
            <input type = "text" class="form-control" name = "pgibig"  value = "<?php echo $pgibig ?>" > 
              </div> 
                  <div class = "col-md-6">
               <label>Issued at</label>
            <input type = "text" class="form-control" name = "pgibigissued"  value = "<?php echo $pgibigissued ?>">
              </div> 
            </div>
                <div class ="col-md-1">
                </div>
            <div class ="input-group border col-md-5 w-50  p-3">
                 <div class = "col-md-6">
               <label>Philhealth</label>
            <input type = "text" class="form-control"  name = "phealth" value = "<?php echo $phealth ?>"> 
              </div>        
                  <div class = "col-md-6">
               <label>Issued at</label>
            <input type = "text" class="form-control" name = "phissuedate"  value = "<?php echo $phissuedate ?>" >
              </div> 
            </div>
                </div>
            <br>
             <div class = "input-group ">
                  <div class = "col-md-3">
               <label> Tin No.</label>
            <input type = "text" class="form-control" name = "tin" value = "<?php echo $tin ?>"> 
              </div> 
                  <div class = "col-md-3">
               <label> GSIS Policy</label>
            <input type = "text" class="form-control" name = "gsis" value = "<?php echo $gsis ?>"> 
              </div> 
                 <div class = "col-md-3">
               <label> CTC No.</label>
            <input type = "text" class="form-control" name = "ctc" value = "<?php echo $ctc ?>"> 
              </div> 
                   <div class = "col-md-3">
               <label> GSIS UMID Card</label>
            <input type = "text" class="form-control"  name = "gsisbp" value = "<?php echo $gsisbp ?>"> 
              </div> 
        </div>  
            <br>
           <div class = "box-footer">
              <div class ="col-md-2"style = "margin:auto;">
                  <p><?php echo $alert_msg ?></p>
                       <input type="submit" name="new" <?php echo $btnNew; ?> class="btn btn-primary float-sm-middle" value = "New">                                    
<!--                <button type="submit"  name = "new" class="btn btn-primary float-sm-middle">New</button> -->
             <input type="submit" <?php echo $btnStatus; ?> name = "submit" class="btn btn-primary float-sm-middle" value ="Save">
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
function loadImage(){
//    var upload = document.getElementById("fileToUpload").files[0].name;
//     alert(upload);
//    document.getElementById("image").src = upload;
    var input = document.getElementById("fileToUpload");
var fReader = new FileReader();
fReader.readAsDataURL(input.files[0]);
fReader.onloadend = function(event){
    var img = document.getElementById("image");
    img.src = event.target.result;
}
   
}
</script>   
   
</body>
</html>
