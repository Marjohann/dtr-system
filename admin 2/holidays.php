<?php
//include('update_user.php');
$titlename = 'List of Holidays';
?>

<!DOCTYPE html>
<html>
<?php include 'dtrdesign/header.php';
include('../config/config.php');
include('session.php'); 
$alert = "false";


?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php include('dtrdesign/navbar.php');
include 'dtrdesign/sidebar.php';
include './components/textfields.php';
include('sql/save_holiday.php');
$deptId [] = '';
$deptdesc [] = '';

$getRecord = "SELECT *, DATE_FORMAT(DATE,'%b %e, %Y') 
AS ddate,DATE_FORMAT(DATE,'%m-%d-%Y') AS dateformat from holiday ORDER BY dateformat ASC";
$get_holidays = $con->prepare($getRecord);
$get_holidays->execute();

$getDepartment = "SELECT * FROM department WHERE status = 'Active'";
$getDepartmentQuery = $con->prepare($getDepartment);
$getDepartmentQuery->execute();

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Holidays</h1>
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

    <div class="modal fade" id="loading_modal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
      </div>
      <div class="modal-body">
       <h4 id = "notification_message">The System is updating the records please wait....</h4>
      </div>
      <div class="modal-footer">
        <button type="button" hidden id = "close_modal" class="btn btn-primary"  data-dismiss="modal" >Done</button>
      </div>
    </div>
  </div>
</div>


                     <section class="content">
                       <div class="container-fluid">
                         <div class="row">
                           <div class="col-4">
                               <div class = "card">
                             <div class="card-body">
                             <form role="form" method="post" action="<?php htmlspecialchars("PHP_SELF");?>">
                              <?php textField('Holiday Name:', 'holidayname', 'hname');?>
                            <div class ="row input-group">
                                <label style="padding-right:5px">Date:</label>
                                <div style="padding-right:5px;"
                                 class="input-group-addon col-2">
                                 <i class="fa fa-calendar"></i>
                                   </div>
                                   <div class = "col-8">
                                   <input type="text" class="form-control"
                               data-provide="datepicker" autocomplete="off"
                               name="date" id="date"
                              val="<?php echo $curdate; ?> ">
                                   </div>

                             </div>

                             <div class = "input-group row" style ="margin-top:20px;">
                            <label class = "col-3">Period:</label>
                            <select name ="period" class ="form-control col-9">
                                <option>Whole Day</option>
                                <option>Morning</option>
                                <option>Afternoon</option>
                                <option>Break Out/ Break In</option>
                            </select>
                             </div>
                             <div class = "row custom_button"  style ="margin-top:20px;">
                               <button type = "submit" name = "save_holiday" class  = "form-control btn btn-primary"><i class = "fa fa-save"></i></button>
                             </div>
                <?php if ($alert == "true") {?>
                             <div class="alert alert-success alert-dismissible" style ="margin-top:20px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fa fa-check"></i> Success!</h5>
                  You have successfully added a new holiday.
                </div>
                <?php }?>
                            </div>
                            </div>

                           </div>


                           <div class="col-8 pull-right ">
                             <div class="card">
                            <div class = "card-header">
                                <label><b>LIST OF HOLIDAYS</b></label>
                            </div>
                            <div class = "card-body">

                                 <div class="box-body">
                                  <div class = "form-group">
                                    <label class = "">Department:</label>
                                     <select class ="form-control col-6 select2" style = "margin-bottom:3rem;"id = "dept">
                                      <option  selected>Select Department...</option>
                                      <option value = "All">All Departments</option>
                                          <?php 
                                          while ($result = $getDepartmentQuery->fetch(PDO::FETCH_ASSOC)) {?>
                                           <option value = '<?php echo  $result['deptId'];?>' >
                                           <?php echo $result['departmentDescription'];?>
                                          </option>
                                   <?php } ?>
                                        
                                    
                                         </select>

                                         </div>

                                   <table id="users" class="table table-bordered  table-hover ">
                                     <thead>
                                       <tr>
                                         <th> Entry No </th>
                                         <th>Holiday Name</th>
                                         <th>Date</th>
                                         <th>Period</th>
                                          <th>Options</th>
                                       </tr>
                                     </thead>
                                     <?php while ($holiday_data = $get_holidays->fetch(PDO::FETCH_ASSOC)) {?>
                                     <tr>
                                       <td><?php echo $holiday_data['entryNo'];?></td>
                                       <td><?php echo $holiday_data['HolidayName'];?></td>
                                       <td><?php echo $holiday_data['ddate'];?></td>
                                       <td><?php echo $holiday_data['period'];?></td>
                                
                                       <td>
                  
                                         <button class="btn btn-outline-success btn-xs"
                                         id = "approveHoliday"  ><i
                                             class="fa fa-check-square-o"></i>
                                         </button>
                                         &nbsp;
                                         <button class="btn btn-outline-danger btn-xs" data-role="confirm_delete"
                                          id = "remove_holiday"><i
                                             class="fa fa-trash-o"></i></button>
                                     
                                       </td>
                                     </tr>


                                     <?php }?>
                                     </tbody>

                                   </table>
                                   </div>
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

<?php include 'dtrdesign/footer.php';?>
    <script>
      $(function () {
    
           $("#users").DataTable({ 
           "ordering":false
        
            }
          
           );
      $('#dept').select2();

  });

  //APPROVE THE HOLIDAY
  $('#users tbody').on( 'click', '#approveHoliday', function(){
    event.preventDefault();
    var dept  =  $('#dept').val().toString();
    var currow=  $(this).closest('tr');
    var col1 = currow.find('td:eq(0)').text();

     console.log(col1);
     console.log(dept);
  $.ajax({
  type:"POST",
  url: "ajaxcall/reflect_holiday.php",
  data: {
    id: col1,
    deptId:dept
  },  
  error: function (xhr, b, c) {
    console.log(
      "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
    );

  },
}).done(function(message){
 
  
});
  })

  $('#users tbody').on( 'click', '#remove_holiday', function(){
    event.preventDefault();
    var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();

     console.log(col1);
     console.log(dept);
  $.ajax({
  type:"POST",
  url: "ajaxcall/delete_holiday.php",
  data: {
    id: col1
  },
  success: function () {

      notification("The holiday is succefully deleted.", "","Refresh","success","success");
  },
  error: function (xhr, b, c) {
    console.log(
      "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
    );

  },
});
  })

  $(document).ajaxStart(function(){
            try
            {
              $("#loading_modal").modal("show");
              $("#close_modal").attr("hidden",true);
              $("#notification_message").html("The System is updating the records please wait....");
                // showing a modal
         

                // var i = 0;
                // var timeout = 750;

                // (function progressbar()
                // {
                //     i++;
                //     if(i < 1000)
                //     {
                //         // some code to make the progress bar move in a loop with a timeout to 
                //         // control the speed of the bar
                //         // iterateProgressBar();
                //         setTimeout(progressbar, timeout);
                //         console.log(i);
                //     }
                // }
                // )();


            }
            catch(err)
            {
                alert(err.message);
            }
        });

        $(document).ajaxStop(function(){
          
          $("#close_modal").attr("hidden",false);
          $("#notification_message").html("Your holiday has been reflected.");
          // notification("Your Holiday has been reflected.", "","Refresh","success","success");
        });
    </script>
</body>
</html>
