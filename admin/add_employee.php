<?php
include ('../php_scripts/insert_employee.php');
include('../config/config.php');
$alert_msg='';
$worksched = '';
$empno=$lastname=$firstname=$middlename=$bpin=$department=$btnStatus=$emp_types=$status='';
$user_name='';
$btnNew ='disabled';
$btnStatus ='enabled';
$btnCancel ='disabled';
//include('delete.php'); 


?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Employee </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../dist/css/custom.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Pace style -->
    <link rel="stylesheet" href="../bower_components/pace/pace.css">



</head>

<body>

    <div>
        <section class="content-header">
            <h1 align="middle">
                Add Employee
                <!-- <small>Version 2.0</small> -->
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Details</h3>
                            <div class="box-footer">

                            </div>
                        </div>
                        <form role="form" method="post" action="<?php htmlspecialchars("PHP_SELF");?>">
                            <div class="box-body">
                                <div style=color:green>
                                    <a name="alertmsg"> <?php echo $alert_msg; ?> </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                                        <label>Employee No:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="emp_no" placeholder="Employee Number" value="<?php echo $empno; ?>" required>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                                        <label>Last Name:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                                        <label>First Name:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                                        <label>Middle Name:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="middlename" placeholder="Middle Name" value="<?php echo $middlename; ?>" required>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                                        <label>Biometric Pin:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="bpin" placeholder="Biometric Pin" value="<?php echo $bpin; ?>" required>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">

                                        <label>Department:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="department" placeholder="Select" value="<?php echo $department; ?>">
                                            <?php
                    //  $query = "SELECT * FROM `department`";
                    //  $result = mysql_query($query);
                    //  while($row=mysql_fetch_array($result, MYSQL_ASSOC)){                                                 
                    //  echo "<option value='".$row['deptId']."'>".$row['departmentDescription']."</option>";
                    // }
                     $get_user_sql = "SELECT * FROM department";
                     $user_data = $con->prepare($get_user_sql);
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result['deptId'];
                        $deptdesc = $result['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                                            <!-- <option selected ="Admin">City Administrators Office</option>
              <option selected ="OHRM">Office for Human Resource Management</option>  -->
                                        </select>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">

                                        <label>Employment Type:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="emp_type" placeholder="Select" value="<?php echo $emp_type; ?>">
                                            <option selected="Admin">Regular</option>
                                            <option selected="OHRM">Job Order</option>
                                            <option selected="OHRM">Contractual</option>
                                        </select>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right;padding-top: 5px;">

                                        <label>Employee Status:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status" placeholder="Select" value="<?php echo $status; ?>">
                                            <option selected="Active">Active</option>
                                            <option selected="Not Active">Not Active</option>
                                        </select>
                                    </div>

                                </div><br>
                                <div class="box-footer">
                                    <input type="submit" <?php echo $btnNew;?> name="add" class="btn btn-primary" value="New">
                                    <input type="submit" <?php echo $btnStatus;?> name="insert" class="btn btn-primary" value="Save">
                                    <a href="users">
                                        <input type="button" <?php echo $btnCancel;?> name="cancel" class="btn btn-default" value="Cancel">
                                    </a>
                                </div>
                        </form>
                    </div>
</body>

</html>
