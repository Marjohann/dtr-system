<?php 
include ('php_scripts/log_in.php');
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
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">


    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>

<body class="hold-transition login-page">
    <div class="login-box">



        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <div class="card">


            <image src="icons/time.png" alt="San Carlos City Logo"
                style="margin:auto;width:50%;padding-bottom:30px;padding-top:20px;">
                <h3 style="margin:auto;">Time Attendance System</h3>

                <div class="card-body login-card-body">


                    <form action="<?php htmlspecialchars("PHP_SELF");?>" method="post">
                        <div class="input-group mb-4">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username">

                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">

                        </div>
                        <div class="Ashake form-group has-feedback">
                            <?php echo $alert_msg; ?>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-block"
                                    style="border-radius:10px;">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

</body>

</html>