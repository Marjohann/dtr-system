<?php

include '../config/config.php';
$curdate = date("m/d/Y");
$titlename = 'Travel Order/Pass Slip';
include 'dtrdesign/header.php';
include('session.php');
$curdate = date("m/d/Y");
?>
<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php
include 'dtrdesign/navbar.php';
include 'dtrdesign/sidebar.php';

?>



        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-12" style="margin-bottom:20;">
                            <div class="justify-content-center">
                                <h1 class="m-0 text-dark ">Add Travel Order </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 no-gutters" style="resize:both;overflow:auto;">
                            <div class="card card-info">
                                <div class="card-header bg-dark">
                                    <h3 class="card-title text-bold">SEARCH EMPLOYEE</h3>
                                </div>

                                <?php include "elements/search_employee.php";
                                include 'modal/update_supervisor_modal.php';?>


                            </div>
                            <!-- /.content -->
                        </div>
                        <div class="col-8">
                            <form method="POST" id="travelform" action=<?php htmlspecialchars("PHP_SELF");?>>
                                <div class="col-12 ">
                                    <div class="card shadow-none border-secondary border">
                                        <div class="card-header bg-dark">
                                            <div class="card-title">
                                                <h4 class = "text-center">DETAILS</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        <div class="row">

                                            <div class="col-4 dateformat">


                                                <div class="input-group" style="margin-left:10px">
                                                    <span class="input-group-text">
                                                        <label class = p-1><b>Date:</b> </label>
                                                        <i class="fa fa-calendar m-0"></i>
                                                    </span>
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="datefrom" id="datefrom" value="<?php echo $curdate; ?> ">
                                                </div>

                                            </div>





                                            <div class="input-group col-4">
                                                <span class="input-group-text">
                                                    <label>Duration: </label>
                                                </span>
                                                <select class=" form-control h-100 " name="duration" id="duration"
                                                  >
                                                    <option val="0">Whole Day</option>
                                                    <option val="1">Morning</option>
                                                    <option val="2">Afternoon</option>
                                                    <option val="3">Break Out / Break In</option>
                                                </select>
                                            </div>
                                            <div class="input-group col-4">
                                                <span class="input-group-text">
                                                    <label style="padding-right:10px;padding-left: 10px">Type:
                                                    </label> </span>

                                                <select class="form-control h-100" name="type"
                                                    id="type">
                                                    <option val="FW"> Field Work</option>
                                                    <option val="TOB">Travel on Official Business</option>
                                                    <option val="OT"> On Official Time</option>
                                                    <option val="TOT"> Travel on Official Time</option>
                                                </select>

                                            </div>

                                        </div>
                                        </div>
                                        <div class="row ml-3 pt-3 mb-4" >
                                            <div class="form-group col-6">
                                                <label style="padding-right:10px;padding-left: 10px">Purpose </label>
                                                <textarea  name="details" id="details" class="form-control h-100 w-100"
                                                   ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DISPLAY'S THE SECOND SECTION OF THE FORM -->
                                    <div class="card card-white shadow-none border border-secondary">
                                        <div class="card-header text-center">
                                            <h3 class="card-title text-bold">EMPLOYEE LIST</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php include "elements/travelorder_details.php";?>
                                        </div>
                                        <div class="row" style=" margin:auto;padding-top:30px;padding-bottom: 30px">
                                            <button type="submit" name="savetravel" id="savetravel"
                                                class=" btn btn-info custom_button"><i
                                                    class="fa fa-save"></i></button>
                                        </div>
                                    </div>

                                    <!-- /.content -->
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.content-wrapper -->
                </div>
            </section>

        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0-alpha

        </footer>


        <!-- ./wrapper -->

        <!-- jQuery -->
        <?php include 'dtrdesign/footer.php';?>
        <!-- PRINT REPORTS  SCRIPT -->

        <script language="javascript">
        var datefrom = '';
        var dateto = '';

        //ADD TRAVEL TO THE TABLE
        $("#tblsearch tbody").on('click', '#select', function() {

            var currow = $(this).closest('tr');
            // var datefrom = $('#dtefrom').val();
            // var dateto = $('#dteto').val();
            var duration = $('#duration').val();
            var type = $('#type').val();
            var details = $('#details').val();
            if (datefrom == '' || dateto == '' || details == '') {
                post_notify("Please complete the information!", "danger");
            } else {
                var col1 = currow.find('td:eq(0)').text();
                var col2 = currow.find('td:eq(1)').text();
                var table = document.getElementById("travellist");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                var cell8 = row.insertCell(7);
                cell1.innerHTML = col1;
                cell2.innerHTML = col2;
                cell3.innerHTML = datefrom;
                cell4.innerHTML = dateto;
                cell5.innerHTML = duration;
                cell6.innerHTML = type;
                cell7.innerHTML = details;
                cell8.innerHTML =
                    '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
            }
        });

        $('input[name="datefrom"]').daterangepicker({
                opens: "left",
            },
            function(start, end, label) {
                datefrom = start.format("YYYY-MM-DD");
                dateto = end.format("YYYY-MM-DD");
                console.log(
                    "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
                );
            }
        );

        $('#savetravel').click(function() {
            //fetch all the data from the table and save it to the database
            var workid = $('#worksched-form').serializeArray();
            event.preventDefault();

                var empno_array =[];
                var fname_array =[];
                var duration_array =[];
                var type_array =[];
                var details_array =[];
                var from_array =[];
                var to_array =[];

                var empno='';
                var newfrom ='';
                var newto = ''
                var duration ='';
            $('#travellist tr').each(function(row, tr) {
                // var details = $('#details').val();
                 empno = $(tr).find('td:eq(0)').text();
                var fname = $(tr).find('td:eq(1)').text();
                var from = $(tr).find('td:eq(2)').text();
                var to = $(tr).find('td:eq(3)').text();
                 duration = $(tr).find('td:eq(4)').text();
                var type = $(tr).find('td:eq(5)').text();
                var details = $(tr).find('td:eq(6)').text();
                 newfrom = formatDate(from);
                 newto = formatDate(to);
                
                empno_array.push(empno);
                fname_array.push(fname);
                duration_array.push(duration);
                type_array.push(type);
                details_array.push(details);
                from_array.push(newfrom);
                to_array.push(newto);
               
            });
                if (empno == '' || newfrom == '' || newto == '' || duration == '') {
                    notification('Please check the fields!', "", "Go back", "error", "error");
                } else {
                    $.ajax({
                        url: 'sql/save_travel.php',
                        type: 'POST',
                        data: {
                            empno: empno_array,
                            fname: fname_array,
                            from: from_array,
                            to: to_array,
                            duration: duration_array,
                            type: type_array,
                            details: details_array
                        },
                        error: function(xhr, b, c) {
                            console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                                " c=" + c.responseText);
                        }
                    }).done(function(message){
                        notification(message, "", "Refresh", "success", "success");
                    })
                }
          
        });
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
        //display notification
        function post_notify(message, type) {

            if (type == 'success') {

                $.notify({
                    message: message
                }, {
                    type: 'success',
                    delay: 2000
                });

            } else {

                $.notify({
                    message: message
                }, {
                    type: 'danger',
                    delay: 2000
                });

            }

        }



        //reset the all the data inside the form
        function reset_form_input(form_id) {
            $('#' + form_id).each(function() {
                this.reset();
            });
        }

        function deleteRow(r) {
            // DELETE SELECTED ROW
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("travellist").deleteRow(i);
        }
        </script>

</body>

</html>