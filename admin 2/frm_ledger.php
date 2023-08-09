<?php

include ('../config/config.php');
include('session.php');
$hiddenempno =$dteFrom=$dteTo='';
$timeIn ='';
$timeoutAm ='';
$timeinPm ='';
$timeoutPm='';
$otIn='';
$otOut='';
$titlename = 'Employees Ledger';

        include ('dtrdesign/header.php');
             
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');


   ?>

  <div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            
            <div class="row ">
          <div class="col-12" >
          <div class ="justify-content-center">
            <h1 class="m-0 text-dark ">Employee Ledger</h1><br>
              </div>
          </div>
        </div>
            <div class="row">
            <div class="col-4 no-gutters" style = "resize:both;overflow:auto;">
            <?php include('elements/employee_table.php');?>
                </div>
                <div class="col-8" style = "resize:both;overflow:auto;margin-top:10px;" >
                    <div class = "card card-primary">
                    <div class="card-header">
                <h3 class="card-title">Date Filter</h3>
               
              </div>
              <div class = "card-body">
              <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class ="d-flex justify-content-center">
                  
                <div class ="col-3"></div>
                <div class = "col-6" style = "background-color:white-grey;">
                <div class = "card full_name" >
                <h4 id ="full-name"> </h4>
                <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>"> 
                  </div>
                    </div>
                    <div class ="col-3"></div>
                  </div>
                    <div class = "row">
                  
                    <div class = "col-8" style="margin-bottom:10px;">
                     
                     <div class="input-group date">
                             <label style="padding-right:10px;padding-left: 10px">From:  </label> 
                               <div  style = "padding-right:10px" class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                               </div>
                      
        <input  style="margin-right:10px;"type="text" data-provide="datepicker"class="form-control " style="font-size:13px" autocomplete="off" name="datefrom" id="dtefrom" value = "<?php echo $dteFrom;?>" >
                                    
                         
                         <label style="padding-right:10px">To:</label>
                              <div style = "padding-right:10px" class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                              </div>
         <input type="text" class="form-control " data-provide="datepicker"  autocomplete="off" name="dateto" id="dteto" value = "<?php echo $dteTo;?>" >
                         
              
                       </div>
                       </div>
                   <div class = " input-group col-3">
                  
        <label style = "margin-right:2rem;">Type:</label> 
        <select class = "form-control"  name = "type" id = "status_type">
        <option val = "PENDING"> PENDING</option>
        <option val = "APPROVED">APPROVED</option>
        </select>

        
                   </div>
              
                       </div>
                    <submit type = "submit" name = "approve_ob"  id = "approve_ob" class = "btn btn-primary">Apply All OB entries </submit>

                    <submit type = "submit" name = "approve_leave" id = "approve_leave" class = "btn btn-primary">Apply All Leave entries </submit>
                 
                    <div class = "col-3"></div>
                      
                       </form>
                   </div>
                    </div>

          <div class="card card-success">
               <div class="card-header">
                <h3 class="card-title">Official Business Records</h3>
            
              </div>
                <div class = "card-body">
                          <div class = "row" style="margin:auto;">
                              
                                 <div class = "col-6" style = "margin:auto;">
                             
                              <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>">                               
                           
                          </div>
                          </div>
                     
                       <div class="row" style = "margin:auto;">
                       
                      
                            <table id="tbl__ob" class ="table-bordered table table-hover ">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Entry No </th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Duration</th>
                                        <th>Details</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                       
                                       
                                </thead>
                             <tbody id ="travel">
                             </tbody>
                                </table>  
                        
                           
                           </div>
                           </div>
                           </div>
                           <div class="card card-success">
               <div class="card-header">
                <h3 class="card-title">Application for Leave</h3>
            
              </div>
                <div class = "card-body">
                           <div class ="row">
                 <div class = "col-12" style = "margin:auto;text-align:center;">
      
                 </div>
                 </div>
                       <div class="row" style = "margin:auto;">
                       
                      
                            <table id="tbl_leave" class ="table-bordered table table-hover ">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Entry No </th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Type of Leave</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                       
                                       
                                </thead>
                             <tbody id ="leave">
                             </tbody>
                                </table>  
                          
                           
                           </div>
                  </div>
                  </div>
             
        
           </div>
    <!-- /.content -->
  </div>
  </div>

  <!-- /.content-wrapper -->
  </section>
  </div>
</div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    
  </footer>

  
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('dtrdesign/footer.php');?>


    <script language="javascript">


  $('.select2').select2();
  $(document).ready(function(){
     var deptId = $('#deptId').val();
     var empstatus = $('#emp_status').val();
 getEmployees(deptId,empstatus);
     

     
  function getEmployees(dept,status){
var dataTable = $('#employees').DataTable({

paging: true,
destroy: true,
stateSave: true,
processing: true,
serverSide: true,
scrollX: false,
ajax: {
  dataType:"JSON",
  url: "ajaxcall/get_employee_department.php",
  type: "POST",
  data:function (d){
    d.department = dept,
    d.empstatus = status
  },
  error: function(xhr, b, c) {
    console.log(
      "xhr=" +
      xhr.responseText +
      " b=" +
      b.responseText +
      " c=" +
      c.responseText
    );
  }
}
});


     }
 $('#deptId').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  // $('#body').load("get_employee_department.php",{
  //   dept:deptId,
  //   empstatus:empstatus
  // })
  getEmployees(deptId,empstatus)
 });

 $('#emp_status').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  getEmployees(deptId,empstatus);

 });
 });
    function loadTravel(empnum,datefr,dateto,ob_status){

          $("#travel").load("ajaxcall/load_ledger.php",{
           employeeno: empnum,
           dtfr: datefr,
           dtto: dateto,
           obstatus:ob_status
  
      }, function(response, status, xhr) {
    if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
    }
});

      }
      function loadLeave(empnum,datefr,dateto,leave_status){

          $("#leave").load("ajaxcall/load_leave.php",{
           employeeno: empnum,
           dtfr: datefr,
           dtto: dateto,
           leave_status: leave_status,
           
  
      }, function(response, status, xhr) {
    if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
    }
});

      }
var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];

    tbody.onclick = function (e) {
  var datefr = $('#dtefrom').val();
   var dateto = $('#dteto').val();
   var ob_status = $('#status_type').val();
    e = e || window.event;
    var empno = [];
   var fullname = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) { 
        var cells = target.getElementsByTagName("td");
     
        var finaldatefr = formatDate(datefr);
        var finaldateto = formatDate(dateto);
            empno.push(cells[0].innerHTML);
       fullname.push(cells[1].innerHTML); 
        var empnum = empno.toString();
        var fullname2= fullname.toString();
        $('#hiddenempno').val(empnum);
        $('#full-name').html(fullname2);
        // $('#empinfo').html(fullname2);
        loadTravel(empnum,finaldatefr,finaldateto,ob_status);
        loadLeave(empnum,finaldatefr,finaldateto,ob_status);
    }
   
   
  }
  //FORMAT THE DATE
  function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
$('#approve_ob').click(function(){

var empno = $('#hiddenempno').val();
var dtefrom = formatDate($('#dtefrom').val());
var dteto = formatDate($('#dteto').val());
var status = $('#status_type').val();
event.preventDefault();
$.ajax({
url:'sql/reflect_all_ob.php',
type:'POST',
data:{
  empno:empno,
  dtefrom:dtefrom,
  dteto:dteto,
  status:status
},
success: function(e){
  console.log(e);
  notification("REFLECTED !", "This record has been reflected.","Refresh","success","success");
},
error:function (xhr, b, c) {     
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

})

})
$('#approve_leave').click(function(){

var empno = $('#hiddenempno').val();
var dtefrom = formatDate($('#dtefrom').val());
var dteto = formatDate($('#dteto').val());
var status = $('#status_type').val();
event.preventDefault();
$.ajax({
url:'sql/reflect_all_leave.php',
type:'POST',
data:{
  empno:empno,
  dtefrom:dtefrom,
  dteto:dteto,
  status:status
},
success: function(e){
  console.log(e);
  notification("REFLECTED !", "This record has been reflected.","Refresh","success","success");
},
error:function (xhr, b, c) {     
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

})

})
$('#tbl__ob tbody').on( 'click', '.ob__button', function(){
  event.preventDefault();
  const empno = $('#hiddenempno').val();
  const currow=  $(this).closest('tr');
  const entryno = currow.find('td:eq(0)').text();
  const datefrom = currow.find('td:eq(1)').text();
  const dateto = currow.find('td:eq(2)').text();
  const duration = currow.find('td:eq(3)').text();
  const obtype = currow.find('td:eq(5)').text();
console.log(empno,entryno,datefrom,dateto,duration);
  $.ajax({

url:'sql/reflect_ob.php',
type:'POST',
data:{
  empno:empno,
  entryno:entryno,
  datefrom:datefrom,
  dateto:dateto,
  obtype:obtype,
  duration:duration
},
success: function(){
  notification("REFLECTED !", "This record has been reflected.","Refresh","success","success");
},
error:function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }
  })

});

$('#tbl_leave tbody').on( 'click', '.btn__leave', function(){
console.log('test');

event.preventDefault();
  const empno = $('#hiddenempno').val();
  const currow=  $(this).closest('tr');
  const entryno = currow.find('td:eq(0)').text();
  const datefrom = currow.find('td:eq(1)').text();
  const  dateto= currow.find('td:eq(2)').text();
  const leavetype = currow.find('td:eq(3)').text();
  const duration = currow.find('td:eq(4)').text();
 
// console.log(empno,entryno,datefrom,dateto,leavetype,duration);
  $.ajax({

url:'sql/reflect_leave.php',
type:'POST',
data:{
  empno:empno,
  entryno:entryno,
  datefrom:datefrom,
  dateto:dateto,
  leavetype:leavetype,
  duration:duration
},
success: function(message){
  console.log(message);
  notification("REFLECTED !", "This record has been reflected.","Refresh","success","success");
},
error:function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }
  })




})
function notification(title, message,text,value,status) {
  const empno = $('#hiddenempno').val();
  const datefr = $('#dtefrom').val();
  const status_type = $('#status_type').val();
  const dateto = $('#dteto').val();
  const finaldatefr = formatDate(datefr);
  const finaldateto = formatDate(dateto);
      swal(title, message, status, {
          buttons: {
            catch: {
              text: text,
              value: value,
            }

          },
        })
        .then((value) => {
          switch (value) {

            case "success":
              loadTravel(empno,finaldatefr,finaldateto,status_type);
              loadLeave(empno,finaldatefr,finaldateto,status_type);
              break;
              case "error":

              break;

          }
        });

    }

    
     
 
        
    </script>
   
</body>
</html>
