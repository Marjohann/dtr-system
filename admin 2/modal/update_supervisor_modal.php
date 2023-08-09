<div class="modal fade" id="update_supervisor">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Supervisor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class = "container-fluid">
              <form method = "POST" action = "<?php htmlspecialchars("PHP_SELF")?>">
                <div class = "row ">
                 <div class = "col-12">
                 <div class = "form-group col-12">
                 <label class = "col-6" >Department</label>
                    <select class= "select2" style = "width:100%" name="update_supervisor_department" id = "update_supervisor_department">
                <?php
             
                     $get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {?>
            
                        <option value='<?php echo $result['deptId'];?>'><?php echo  $deptdesc = $result['departmentDescription'];?></option>;
                    <?php }?>
                    </select>
                        </div>
                 </div>
                 <div class = "form-group col-12">
                    <label class = "col-6" >Supervisor Name</label>
                    <input type = "text" class = "form-control " id = "supervisor_name" name = "supervisor_name">
                 </div>


                 <div class = "form-group col-12">
                    <label class = "col-6" >Employment Status</label>
                    <select class = "form-control" name = "update_emp_status" id = "update_emp_status">
                      <option value = "Regular"> Regular </option>
                      <option value = "Job Order"> Job Order </option>
                        </select>
                 </div>
           </div>
            </div>
          </div>
            <div class="modal-footer justify-content-between">
              <button type="button"   class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button"  id = "btn_update_supervisor" onClick = "updateSupervisor();" class="btn btn-primary update_sup">UPDATE</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>