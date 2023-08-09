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

        <?php include('modal/leave_credits_modal.php');?>


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
                                <div class="card bg-dark">
                                    <div class="wrapper">
                                        <div class="card-header">
                                            <h3 class="card-title">Search Employee</h3>
                                        </div>

                                        <?php include("elements/search_employee.php");?>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-8">

                            <div class="col-12 no-gutters">
                                <div class="card card-primary" style="width:100%">
                                    <div class="card-header">
                                        <h3 class="card-title">Details</h3>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-3"></div>
                                            <div class="col-6" style="background-color:white-grey;">
                                                <input type="text" id="leaveempno" readonly hidden>
                                                <div class="card full_name">
                                                    <h4 id="fullname"> </h4>
                                                </div>
                                            </div>
                                            <div class="col-3"></div>
                                            <div class="row col-12">
                                                <button id="add_leave_credits" class="btn btn-primary">UPDATE LEAVE
                                                    CREDITS</button>

                                            </div>






                                        </div>

                                        <div class="row col-12">

                                            <div class="col-8">
                                                <div class="form-group ">
                                                    <label>Leave Type</label>
                                                    <select class="form-control select2 " id="leavetype"
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
                                                <div class="form-group">
                                                    <label>Inclusive Date</label>
                                                    <select class="form-control select2 " id="inclusivedate"
                                                        style="width: 100%;" name="inclusivedate" required>
                                                        <option selected="selected">Whole Day</option>
                                                        <option>Morning</option>
                                                        <option>Afternoon</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row justify-content-center">
                                            <button style="margin:auto;width:120px;" type="submit" name="addleave"
                                                id="addleave" class=" btn btn-primary"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Leave Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="margin:auto;">

                                            <table class="table table-hover table-bordered "
                                                style="margin:auto;width:100%;margin-top:20px;" id="leavelist">
                                                <thead style="margin:auto;width:100%;">
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
                                                class=" custom_button btn btn-primary"><i
                                                    class="fa fa-save"></i></button>


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
    <script type="text/javascript">
    var employeeNo = '';
    $("#tblsearch tbody").on('click', '#select', function() {

        var currow = $(this).closest('tr');
        var col1 = currow.find('td:eq(0)').text();
        var col2 = currow.find('td:eq(1)').text();
        employeeNo = col1;
        $('#leave_creditsEmpno').val(col1);
        $('#fullname').html(col2);
    });

    $('#add_leave_credits').on("click", function(e) {
        e.preventDefault();
        $('#leave_credits').modal('show');

    })

    $("#leave_credits_form").click(function(e) {
        e.preventDefault();
        const month = $('#month').val();
        const sl = $('#slbalance').val();
        const vl = $('#vlbalance').val();
        const year = $('#year').val();
        // const fd = new FormData(this);
        // console.log(fd);
        $.ajax({
            url: 'ajaxcall/insert_leavecredits.php',
            type: 'POST',
            dataType: "JSON",
            data: {
                empnum: employeeNo,
                month: month,
                sl: sl,
                vl: vl,
                year: year


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
            },
        }).done(
            function(e) {
                console.log(e);

            })
    })
    </script>

</body>

</html>