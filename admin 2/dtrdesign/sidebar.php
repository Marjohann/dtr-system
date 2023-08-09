<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $_SESSION['fname']." ".$_SESSION['lname']?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <li class="nav-item ">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fa fa-download"></i>
                        <p class = "text-white">
                           Dashboard

                        </p>
                    </a>
                </li>



                <li class="nav-header">ADD RECORD</li>

                <li class="nav-item ">
                    <a href="import_record.php" class="nav-link">
                        <i class="nav-icon fa fa-download"></i>
                        <p class = "text-white">
                            Import Biometric Records

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="department.php" class="nav-link">
                        <i class="nav-icon fa fa-building"></i>
                        <p >
                            Department
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="employees.php" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Employee
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="workschedule.php" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Work Schedule
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="add_leave.php" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Application for Leave

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="add_travel.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Travel

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="add_co.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Compensatory Off

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="holidays.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Holidays

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="appleave.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Application for Leave

                        </p>
                    </a>
                </li>
                <li class="nav-header">TRANSACTIONS</li>

                <li class="nav-item">
                    <a href="dailytimerecord.php" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Daily Time Record

                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="frm_ledger.php" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Employee Ledger

                        </p>
                    </a>
                </li>
                <li class="nav-header">UPDATE DTR RECORD</li>
                <li class="nav-item">
                    <a href="frm_ledger.php" class="nav-link" id="update_sup">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Update Supervisor

                        </p>
                    </a>
                </li>
                <li class="nav-header">ADMINISTRATION</li>
                <li class="nav-item">
                    <a href="users" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Manage Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="sms_time" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Send Time via SMS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="signout" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Sign Out</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="signout" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Lockscreen</p>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>