<?php
include ('../php_scripts/insert_employee.php');
include('../config/config.php');
?>


<div class="modal fade" id="addnew">
     <div class="modal-dialog">
         
        <div class="modal-content">
            	<div class="modal-header">
               
                    <h4 class="modal-title"><b>Add Employee</b></h4>
                    
          	</div>
               	<div class="modal-body">
                    
                    	<form class="form-horizontal" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>" enctype="multipart/form-data">
                              <div class="form-group">
                  	<label for="empno" class="col-sm-9 control-label">Employee Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="emp_no" name="emp_no" placeholder ="Employee Number "required>
                  	</div>
                </div>
                        <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Last Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" placeholder ="Last Name "required>
                  	</div>
                </div>      
                       <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">First Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" placeholder ="First Name "required>
                  	</div>
                </div>           
                     
                    <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Middle Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="middlename" name="middlename" placeholder ="Middle Name "required>
                  	</div>
                </div> 
                      <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Biometric I.D.</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="bpin" name="bpin" placeholder ="Biometric I.D. "required>
                  	</div>
                </div>    
                            
                     <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Department</label>

                  	<div class="col-sm-9">
                    	
                        <select class="form-control" name="department" placeholder="Select" value="<?php echo $department; ?>">
                                            <?php
                   
                     $get_user_sql = "SELECT * FROM department";
                     $user_data = $con->prepare($get_user_sql);
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result['deptId'];
                        $deptdesc = $result['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                     </select>
                  	</div>
                         
                         
                </div>  
                            
                    <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Employment Type</label>

                  	<div class="col-sm-9">
                    	<select class="form-control" name="emp_type" placeholder="Select" value="<?php echo $emp_type; ?>">
                                            <option selected="Regular">Regular</option>
                                            <option selected="Job Order">Job Order</option>
                                        </select>
                  	</div>
                </div>    
                    
                            
                             <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Status</label>

                  	<div class="col-sm-9">
                        <select class="form-control" name="status" placeholder="Select" value="<?php echo $status; ?>">
                                            <option selected="Active">Active</option>
                                            <option selected="Not Active">Not Active</option>
                                        </select>
                  	</div>
                </div>    
                  
                <button type="submit" class="btn btn-primary btn-flat" name="new" href = "frm_addemployee.php"><i class="fa fa-save"></i> New</button>   
                <button type="submit" class="btn btn-primary btn-flat" name="add" href = "frm_addemployee.php"><i class="fa fa-save"></i> Save</button>         
                   
                                   
                        </div>
                    </form>
                            
                    
                    
                    
         </div>
               
         </div>
         
         
    </div>
    
    
    
</div>