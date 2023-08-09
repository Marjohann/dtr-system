<?php
//include('update_user.php');
include "../php_scripts/search_user.php";
$titlename = 'Compensatory Day Off';
?>

<!DOCTYPE html>
<html>
<?php include 'dtrdesign/header.php';?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include 'dtrdesign/navbar.php';
include 'dtrdesign/sidebar.php';

?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Compensatory Off</h1>
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
                        <div class="col-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Employees Table</h3>
                                </div>
                                <div class="card-body">
                                    <?php include "elements/search_employee.php";?>
                                </div>
                            </div>
                        </div>


                        <div class="col-8 ">
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title capitalize"><b>Search Logs</b></h3>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="get" action="<?php htmlspecialchars("PHP_SELF");?>">
                                        <div class="box-body">
                                            <div class="row" style="margin-top:5px;">
                                                <div class="col-3"></div>
                                                <div class="col-6" style="background-color:white-grey;">

                                                    <div class="card full_name">
                                                        <h4 id="full-name"> </h4>
                                                    </div>
                                                    <input type="hidden" readonly id="hiddenempno" name="hiddenempno"
                                                        value="<?php echo $hidden; ?>">

                                                </div>
                                                <div class="col-3"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="input-group date ">
                                                        <label> Date: </label>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>

                                                        <input type="text" data-provide="datepicker"
                                                            class="form-control " autocomplete="off" name="datefrom"
                                                            id="check_date" val="<?php echo $curdate; ?> ">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-success" id="co__search"
                                                        onClick="checkCOff();"><i class="fa fa-search"></i></button>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table table-hover table-bordered" id="co__table">
                                                        <thead style="margin:auto;width:100%;">
                                                            <th>Date</th>
                                                            <th>Check In</th>
                                                            <th>Break Out</th>
                                                            <th>Break In</th>
                                                            <th>Check Out</th>
                                                        </thead>
                                                        <tbody id="check_body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.box-body -->
                                </form>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title capitalize"><b>ADD COMPENSATORY OFF</b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group date ">
                                                <label> Date: </label>
                                                <div class="input-group-addon" style = "margin-right:5px;">
                                                    <i class="fa fa-calendar"></i>
                                                </div>

                                                <input type="text" data-provide="datepicker" class="form-control "
                                                    autocomplete="off" name="datefrom" id="compen_date"
                                                  >
                                            </div>

                                        </div>
                                        <div class = "col-3">
                                            <div class = "input-group">
                                            <label style = "margin-right:5px;">Time:</label>
                                            <input class = "form-control" id = "time" type = "text">
                                            </div>
                                        </div>
                                        <div class = "col-3">
                                            <div class = "input-group">
                                            <label style = "margin-right:5px;">Type:</label>
                                            
                                            <select class = "form-control" id = "type">
                                            <option val = "Holiday">Holiday</option>
                                            <option val = "Straight Duty">Straight Duty</option>
                                            <option val = "Regular Off">Regular Off</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class = "col-2">
                                        <select class = "form-control" id ="compen_year">
                                        <?php for($x = 2020; $x < 2050; $x++) { ?>
                                            <option <?php if($x == date("Y")){
                                                echo 'selected';} ?> val = '<?php echo $x; ?>'> <?php echo $x; ?> </option>
                                            <?php }?>
                                        </select>    

                                        </div>
                                        <div class = "col-1">
                                            <button class = "btn btn-primary pull-left" onClick = "saveCompensatory();"> <i class ="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class ="row">
                                    <table class="table table-hover table-bordered" id="tbl_compensatory">
                                                        <thead style="margin:auto;width:100%;">
                                                            <th>Entry No</th>
                                                            <th>Date Rendered</th>
                                                            <th>Time</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>Claimed Date</th>
                                                            <th>Option</th>
                                                        </thead>
                                                        <tbody id="compen_body">

                                                        </tbody>
                                                    </table>

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

    <?php include 'dtrdesign/footer.php';?>
    <script language="javascript">
        $("#tblsearch tbody").on('click', '#select', function () {
            var currow = $(this).closest('tr');
            var col1 = currow.find('td:eq(0)').text();
            var col2 = currow.find('td:eq(1)').text();
            $('#full-name').html(col2);
            $('#hiddenempno').val(col1);
            getCoffRecord(col1);
        })

        function checkCOff() {
            console.log("hello");
            event.preventDefault();
            const checking_date = $('#check_date').val();
            const empno = $('#hiddenempno').val();
            console.log(checking_date, empno);
            $("#check_body").load("ajaxcall/get_logs_record.php", {
                    empno: empno,
                    date: checking_date
                },
                function (response, status, xhr) {
                    if (status == "error") {
                        alert(msg + xhr.status + " " + xhr.statusText);
                        console.log(msg + xhr.status + " " + xhr.statusText);
                    }

                }
            );

        }

        function getCoffRecord(empno){


            $("#compen_body").load("ajaxcall/load_compensatory.php", {
                    empno: empno
                
                },
                function (response, status, xhr) {
                    if (status == "error") {
                        alert(msg + xhr.status + " " + xhr.statusText);
                        console.log(msg + xhr.status + " " + xhr.statusText);
                    }

                }
            );
        }

        function saveCompensatory(){

            const empno =  $('#hiddenempno').val();
            const compen_date = $('#compen_date').val();
            const time = $('#time').val();
            const type = $('#type').val();
            console.log(empno,compen_date,time,type);
            $.ajax({
                url:'ajaxcall/save_compensatory.php',
                type:'POST',
                dataType:'json',
                data:{empno:empno,
                    compen:compen_date,
                    time:time,
                    type:type},
                success: function(e){
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

  }})
            
        }

    </script>
</body>

</html>