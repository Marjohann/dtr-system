<?php

include ('../config/config.php');
$curdate = date("m/d/Y");
include('session.php');
$titlename = 'Application for Leave';
include ('dtrdesign/header.php');


$curdate = date("m/d/Y");      
$getLeaveType = "CALL spGetLeaveType()";
$prep_leave_type = $con->prepare($getLeaveType);
$prep_leave_type->execute();
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');

  

   ?>




        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid ">
                    <div class=" row ">
                        <div class=" col-12">
                            <div class="justify-content-center">
                                <h1 class="m-0 text-dark ">Application for Leave</h1><br>
                            </div>
                        </div>
                    </div>
                    <div class=" row ">
                        <div class="col-4">


                            <div class="col-12 ">
                                <div class="card card-dark">
                                    <div class="wrapper">
                                        <div class="card-header">
                                            <h3 class="card-title capitalize text-bold">Search Employee</h3>
                                        </div>

                                        <?php include("elements/search_employee.php");?>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-8">

                            <div class="col-12 no-gutters">
                                <div class="card card-dark text-center bg-none  border border-secondary shadow-none"
                                    style="width:100%">
                                    <div class="card-header">
                                        <h3 class="card-title capitalize text-center text-bold">Details</h3>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-12" style="background-color:white-grey;">
                                                <input type="text" id="leaveempno" readonly hidden>
                                                <div class="card shadow-none bg-dark full_name">
                                                    <h4 class="text-white text-bold" id="fullname"> </h4>
                                                </div>
                                            </div>
                                            </div>  
                                            <div class="row">
                    
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class = "mb-0">Leave Type</label>
                                                    <select class="form-control " id="leavetype"
                                                        name="leavetype" required>
                                                        <option selected="selected">Select Leave</option>
                                                        <?php while ($get_result = $prep_leave_type->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $get_result['Category']; ?>">
                                                            <?php echo $get_result['LeaveTypeDescription']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group date">
                                                         <label class="mb-0">Date
                                                        </label>

                                                        <input style="margin-right:10px;" type="text"
                                                            class="form-control text-center" style="font-size:13px"
                                                            autocomplete="off" name="datefrom" id="dtefrom"
                                                            val="<?php echo $curdate; ?> ">

                                                    </div>
                                                </div>
                                            
                                                <div class="col-3">
                                                <div class="form-group">
                                                    <label class="mb-0">Inclusive Date</label>
                                                    <select class="form-control select2 " id="inclusivedate"
                                                        style="width: 100%;" name="inclusivedate" required>
                                                        <option selected="selected">Whole Day</option>
                                                        <option>Morning</option>
                                                        <option>Afternoon</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>






                                      

                                        <!-- <div class="row justify-content-center">
                                            <button type="submit" name="addleave"
                                                id="addleave" class=" btn btn-danger "><i
                                                    class="fa fa-plus"></i></button>
                                        </div> -->

                                    </div>
                                </div>
                                <div class="card card-info text-center bg-none  border border-secondary shadow-none">
                                    <div class="card-header">
                                        <h3 class="card-title text-bold">LEAVE DETAILS</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="margin:auto;">

                                            <table class="table table-hover table-bordered m-auto w-100 mt-2"
                                                 id="leavelist">
                                                <thead class = "m-auto w-100 text-center" >
                                                    <th>Leave Name</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Inclusive Date</th>
                                                    <th>Remove</th>
                                                </thead>

                                            </table>
                                        </div>

                                        <div class="row" style="margin:auto;padding-top:30px;padding-bottom:30px;">



                                            <button type="submit" name="save_leave" id="save_leave"
                                                class=" custom_button btn btn-info"><i
                                                    class="fa fa-save "></i></button>


                                        </div>
                                        <div class="row">
                                            <label id="save_notification"
                                                style="text-align:center;margin:auto;"></label>
                                        </div>

                                    </div>



                                </div>
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


    <?php include('dtrdesign/footer.php') ?>
    <script src="javascript/add_leave.js"></script>

</body>

</html>