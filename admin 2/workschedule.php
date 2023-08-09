<?php
$titlename = 'Work Schedule';
include('session.php');
include ('dtrdesign/header.php');
include('../config/config.php');
$alert_msg='';
$workid='';


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
              
          </div><!-- /.col -->
                        <div class="col-2">
                            <button class="btn btn-primary" id="addemp" data-toggle="modal" data-target="#worksched">Add
                                Work Schedule </button>
                        </div>
                        <div class="form-group has-feedback col-8">
                            <?php echo $alert_msg; ?>
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
                        <div class="row">
                            <div style="margin:auto;" class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Employees Table</h3>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="post" name="form"
                                            action="<?php htmlspecialchars("PHP_SELF");?>">
                                            <table class="table table-hover" id="tablesched" readonly>
                                                <thead>
                                                    <th>Work Schedule Code</th>
                                                    <th>Work Schedule Description</th>
                                                    <th>Remarks</th>
                                                    <th>Status</th>
                                                    <th>Options</th>


                                                </thead>
                                                <tbody>
                                                    <?php 
                                $sql = "SELECT * FROM workschedule ";
               
                $prep_work= $con->prepare($sql);
                $prep_work->execute();
                while($result = $prep_work->fetch(PDO::FETCH_ASSOC)){?>
                                                    <tr>
                                                        <td><?php echo $result['workScheduleId']?> </td>
                                                        <td><?php echo $result['workScheduleDescription']?> </td>
                                                        <td><?php echo $result['remarks']?> </td>

                                                        <td><?php echo $result['status']?> </td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm btn-flat" id="edit">
                                                                <i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm btn-flat" id="delete">
                                                                <i class="fa fa-trash"></i></button>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <?php include('workschedule_modal.php');
        include('modal/edit_worksched_modal.php');
     
    ?>

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
    $(document).ready(function() {
        $('#tablesched').DataTable({
            'paging': true,
            stateSave: "true",
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'autoHeight': true
        });
    });

    function is_valid(element) {
        // callback function
        // returns every value
        return element.value;
    }


    //SAVE THE WORK SCHEDULE
    $('#insert').click(function(event) {
        event.preventDefault();
        var workId = $('#workcode').val();
        var status = $('#workstatus').val();
        var workid = $('#worksched-form').serializeArray();
        console.log(workid);


        var dataObj = {};
        $(workid).each(function(i, field) {
            dataObj[field.name] = field.value;
        });

        workid.push({
            name: 'status',
            value: status
        });

        $.ajax({

            url: 'ajaxcall/insert_workschedule.php',
            method: 'POST',
            data: $.param(workid),
            dataType: 'json'
        })

        $('#input-sched tr').each(function(row, tr) {

            
            // var col1 = $(tr).find('td:eq(0)').text();
            // var col2 = $(tr).find('td:eq(1)').text();
            // var col3 = $(tr).find('td:eq(2)').text();
            // var col4 = $(tr).find('td:eq(3)').text();
            // var col5 = $(tr).find('td:eq(4)').text();
            // console.log(col1, col2, col3, col4, col5);
            // // TableData = $.toJSON(storeTblValues());
            // console.log(col1);
            // $.ajax({

            //     url: 'ajaxcall/insert_workscheduledetail.php',
            //     method: 'POST',
            //     data: {
            //         workId: workId,
            //         Day: col1,
            //         CheckIn: col2,
            //         BreakOut: col3,
            //         BreakIn: col4,
            //         CheckOut: col5
            //     },
            //     dataType: 'json',
            //     success: function(e) {
            //         console.log(e);
            //         notification("Congratulations", "", "Refresh", "success",
            // "success");
            //     },
            //     error: function(xhr, b, c) {
            //         console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" +
            //             c.responseText);
            //     }
            // })
            var currow=  $('#show_sched').closest('tr');
            var col1 = $(tr).find('td:eq(0)').text();
            var col2 = $(tr).find('td:eq(1)').text();
            var col3 = $(tr).find('td:eq(2)').text();
            var col4 = $(tr).find('td:eq(3)').text();
            var col5 = $(tr).find('td:eq(4)').text();
            console.log(col1, col2, col3, col4, col5);
            console.log(workId);
            $.ajax({
                url: 'ajaxcall/insert_workscheduledetail.php',
                type: 'POST',
                data: {
                    workId: workId,
                    day: col1,
                    CheckIn: col2,
                    BreakOut: col3,
                    BreakIn: col4,
                    CheckOut: col5
                },
                success: function(e) {
                    notification("Congratulations", "", "Refresh", "success",
                        "success");
                   console.log(e);
                },
                error: function(xhr, b, c) {
                    console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                        " c=" +
                        c.responseText);


                }

            })
           
        })




    });
    //CHECK IF THE WORK CODE IS AVAILABLE
    $('#workcode').keyup(function() {
        // console.log("hello");s
        var workcode = $('#workcode').val();
        $.ajax({
            url: 'ajaxcall/get_workcode.php',
            type: "POST",
            data: {
                workcode: workcode
            },
            success: function(msg) {
                console.log(msg);
                if (msg) {
                    $('#checkworkcode').html(msg);
                    $('#insert').prop('disabled', true);

                } else if ($('#workcode').val() == '') {
                    $('#checkworkcode').html('');
                    $('#insert').prop('disabled', true);
                } else {
                    $('#checkworkcode').html('This work code is available');
                    $('#insert').prop('disabled', false);
                }
            },
            error: function(xhr, b, c) {
                console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c
                    .responseText);
            }


        })

    })
    //EDIT THE WORK SCHEDULE
    $('#tablesched tbody').on('click', '#edit', function() {
        event.preventDefault();


        const days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ];

        $('#editworksched').modal('show');

        var currow = $(this).closest('tr');
        var col1 = currow.find('td:eq(0)').text();
        var table = document.getElementById("editsched");

        var tableHeaderRowCount = 1;
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $.ajax({
            url: 'ajaxcall/getworkscheduleinfo.php',
            type: "POST",
            data: {
                workschedid: col1
            },
            success: function(response) {
                var result = jQuery.parseJSON(response);
                $('#editworkcode').val(result.workschedid);
                $('#editworkdesc').val(result.workdesc);
                $('#editremarks').val(result.remarks);
                $('#editworkdesc').val(result.workdesc);
            },
            error: function(xhr, b, c) {
                console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c
                    .responseText);
            }
        });
        days.forEach(function(item) {
            $.ajax({
                url: 'ajaxcall/getworkschedule.php',
                type: "POST",
                data: {
                    workschedid: col1,
                    Day: item
                },
                success: function(response) {
                    var result = jQuery.parseJSON(response);

                    var row = table.insertRow(1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);

                    cell1.innerHTML = item;
                    cell2.innerHTML = result.inAM;
                    cell3.innerHTML = result.outAM;
                    cell4.innerHTML = result.inPM;
                    cell5.innerHTML = result.outPM;
                    $('#editsched td').attr('contenteditable', true);

                    $('#editsched tr').find('td:eq(0)').attr('contenteditable', false);
                },

                error: function(xhr, b, c) {
                    console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                        " c=" +
                        c.responseText);



                },
            })
        });

    });
    //UPDATE THE WORK SCHEDULE
    $('#update').click(function() {
        event.preventDefault();
        var worksched = $('#editworkcode').val();
        var workDesc = $('#editworkdesc').val();
        var remarks = $('#editremarks').val();
        var status = $('#editworkstatus').val();

        $.ajax({
            url: 'ajaxcall/updateWorkSchedule.php',
            type: 'POST',
            dataType: "JSON",
            data: {
                worksched: worksched,
                workdesc: workDesc,
                remarks: remarks,
                status: status
            },
            success: function() {



            },
            error: function(xhr, b, c) {
                console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c
                    .responseText);


            }
        })



        $('#editsched tr').each(function(row, tr) {


            var col1 = $(tr).find('td:eq(0)').text();
            var col2 = $(tr).find('td:eq(1)').text();
            var col3 = $(tr).find('td:eq(2)').text();
            var col4 = $(tr).find('td:eq(3)').text();
            var col5 = $(tr).find('td:eq(4)').text();
            console.log(col1, col2, col3, col4, col5);
            console.log(worksched);
            $.ajax({
                url: 'ajaxcall/workScheduleUpdate.php',
                type: 'POST',

                data: {
                    worksched: worksched,
                    day: col1,
                    timeIn: col2,
                    breakOut: col3,
                    breakIn: col4,
                    timeOut: col5
                },
                success: function() {
                    notification("Congratulations", "", "Refresh", "success",
                        "success");

                },
                error: function(xhr, b, c) {
                    console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                        " c=" +
                        c.responseText);


                }

            })

        })
        // window.location.reload();
    });

    function notification(title, message, text, value, status) {
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
                        window.location.reload(true);
                        break;
                    case "error":

                        break;

                }
            });

    }

    $(document).ready(function() {
        $('#editsched tbody').on('click', '#edittime', function() {

            event.preventDefault();

        });
    });

    function reset_form_input(form_id) {
        $('#' + form_id).each(function() {
            this.reset();
        });
    }
    //  TableData.shift();  // first row will be empty - so remove
    // return TableData;
    //  console.log(TableData); 
    </script>
</body>

</html>