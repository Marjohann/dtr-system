<?php

include('session.php');




$titlename = 'Send Time Via SMS';
include ('dtrdesign/header.php');
          
?>
<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php 
 include('dtrdesign/sidebar.php');

   ?>

        <div class="content-wrapper">

            <section class="content">
                <div class="wrapper">
                    <div class="container-fluid">

                        <div class=" row d-flex justify-content-center align-items-center">
                            <div class=" col-6 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Send Time via SMS</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" id="mnumber">
                                        </div>
                                        <div class="date">
                                            <input style="margin-bottom:10px;" type="text" data-provide="datepicker"
                                                class="form-control " style="font-size:13px" autocomplete="off"
                                                name="date" id="date" val="<?php echo $curdate; ?> ">
                                        </div>
                                        <button class="btn btn-primary sendsms" id="sendsms" style="width:100%">SEND
                                            TIME</button>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>

            </section>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha

    </footer>

    </div>

    <?php include('dtrdesign/footer.php');  
    ?>


    <script language="javascript">
    $(document).ready(function() {
        $('#sendsms').click(function() {
            var mobilenumber = $("#mnumber").val();
            var date = $("#date").val();
            $.ajax({
                url: "ajaxcall/send_time.php",
                type: "POST",
                data: {
                    mobile: mobilenumber,
                    dateparam: date

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
            }).done(function(e) {
                console.log(e);
            })
        })
    });
    </script>

</body>

</html>