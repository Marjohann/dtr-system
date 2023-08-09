<?php
include('../config/config.php');
include ("../php_scripts/search_user.php");
include("frm_officialbusiness.php");
?>


<div class="modal fade" id="addnew">
    <div class="modal fade" id="addnew">
         <div class="modal-content">
             <div class="modal-header">
               
                    <h4 class="modal-title"><b>Add Travel Order</b></h4>
                    
          	</div>
             <form class="form-horizontal" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>" enctype="multipart/form-data">
                  <table id = "employee" class = "table table-bordered table-hover"   action ="<?php htmlspecialchars("PHP_SELF");?>">
                                   <thead>
                <tr class = "emprow">
                        <th> Employee No </th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <!-- <th>Add</th> -->
                    </tr>
            </thead>
                 <?php
            //  $get_allusers_sql = "Select * from employee e inner join department d on e.department = d.deptId";
            //  $get_allusers_sql = "Select * from employee";

             $get_allusers_sql = "CALL spSearchEmployee($user_id)";

            $get_allusers_data = $con->prepare($get_allusers_sql);
            $get_allusers_data->execute([]);
             while($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr>
                         <td class= "empnumber"><?php echo $user_data['EmployeeNo'];?></td>
                        <td id= "fullName"><?php echo ucfirst($user_data['firstName']) . '  ' . ucfirst($user_data['lastName']);?></td>
                       
                                  
                        <td id= "dept"><?php echo $user_data['departmentDescription'];?></td>
                      
                        <!-- <td>
                          <a class="btn btn-outline-success btn-xs" href="update_user.php?userpass=<?php echo $user_data['userpass'];?>&id=<?php echo $user_data['id_no'];?> "><i class="fa fa-check-square-o"></i>
                          </a>
                          &nbsp; 
                          
                        </td> -->
                      </tr>

        
            <?php } ?>                  
                                  
                            </table>
             </form>
             
        </div>
        
    </div>
    
</div>