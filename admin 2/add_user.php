<!DOCTYPE html>
<html>


<?php 
include('session.php');
$titlename = 'Add User';
include('dtrdesign/header.php'); 
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include('dtrdesign/navbar.php');
      include('dtrdesign/sidebar.php');
      include('sql/insert_user.php');

 ?>

        <style>
        .margin-right {
            margin-right: 0.5rem;
        }

        .margin-bottom {
            margin-bottom: 2rem;
        }

        .auto-margin {
            margin: auto;
        }

        .max-width {
            width: 100%
        }
        </style>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add User</h1>
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

                        <div class="col-12">
                            <form method="POST" id="user" action=<?php htmlspecialchars("PHP_SELF");?>>
                                <div class=" col-6 auto-margin">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title capitalize">User Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row margin-bottom">
                                                <div class="col-6 auto-margin">
                                                    <div class="input-group">
                                                        <label class="col-form-label margin-right">Username:</label>
                                                        <input class="form-control" type="text" id="username"
                                                            name="username" required>
                                                    </div>
                                                </div>
                                                <div class="col-6 auto-margin ">
                                                    <div class="input-group">
                                                        <label class="col-form-label margin-right">Password:</label>
                                                        <input class="form-control" type="password" id="password"
                                                            name="password" required>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row margin-bottom">
                                                <div class="col-6 auto-margin">
                                                    <div class="input-group">
                                                        <label class="col-form-label margin-right">First Name:</label>
                                                        <input class="form-control" type="text" id="firstname"
                                                            name="firstname" required>
                                                    </div>
                                                </div>
                                                <div class="col-6 auto-margin ">
                                                    <div class="input-group">
                                                        <label class="col-form-label margin-right">Last Name:</label>
                                                        <input class="form-control" type="text" id="lastname"
                                                            name="lastname" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row margin-bottom">
                                                <div class="col-6 ">
                                                    <div class="input-group">
                                                        <label class="col-form-label margin-right">Account Type:</label>
                                                        <select class=form-control id="usertype" name="usertype">
                                                            <option value="User">User</option>
                                                            <option value="Administrator">Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary  " id="save"
                                                        name="save"><i class="fa fa-save"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <?php include('dtrdesign/footer.php');?>
    <script language="javascript">
    $('#save').click(function() {

        //         event.preventDefault();
        //         var username = $('#username').val();
        //         var password = $('#password').val();
        //         var firstname = $('#firstname').val();
        //         var lastname = $('#lastname').val();
        //         var usertype = $('#usertype').val();
        //        $.ajax({
        //          url:'sql/insert_user.php',
        //           type:'POST',
        //           data:{
        //             uname:username,
        //             upass:password,
        //             fname:firstname,
        //             lname:lastname,
        //             utype:usertype
        //           },

        //           success:function(message){
        //             console.log(message);
        // if(message = "New user added" ){
        // notification(message, "","Refresh","success","success");
        // }else {
        //   notification(message, "","Refresh","error","success");
        // }
        // },
        // error: function (xhr, b, c) {
        // console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);

        // }
        // })


    })




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
    </script>
</body>

</html>