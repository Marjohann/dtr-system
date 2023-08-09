<?php 
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>H.R. DTR System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">


    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>

<body class="hold-transition login-page">
    <div class="login-box">



        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <div class="card">


            <image src="../icons/time.png" alt="San Carlos City Logo"
                style="margin:auto;width:50%;padding-bottom:30px;padding-top:20px;">
                <h3 style="margin:auto;">View My Time</h3>

                <div class="card-body login-card-body">


                    <form action="getEmployeeRecords.php" method="GET">
                        <div class="input-group mb-4">

                            <input type="number" class="form-control text-center" name="biometricpin"
                                placeholder="Enter Biometric ID">

                        </div>
                        <div class="input-group mb-4">
                            <select class="form-control text-center" name="month">

                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="input-group mb-4">
                            <select class="form-control text-center" name="year">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block" style="border-radius:10px;"> SUBMIT</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>