<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label> Select Department: </label>
                        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
                        <select class="form-control select2" style="width:100%" name="select_batch" id="select_batch">
                            <option value=""></option>
                            <?php
                            $prep_dep->execute();
          while($get_result = $prep_dep->fetch(PDO::FETCH_ASSOC)){
            $list_depid = $get_result['deptId'];
            $list_desc = $get_result['departmentDescription'];

          echo '<option value ="'.$list_depid.'">'.$list_desc.'</option>';
          }
          ?>
                        </select>
                    </div>
                    <table class="table table-hover" style="width: 100%" id="tblBatchImport">
                        <thead>
                            <th>Office Code</th>
                            <th>Office Name</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Options</th>


                        </thead>
                    </table>
                </div>



                <input style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;" type="submit"
                    class="btn btn-primary" name="import_dep_batch" id="import_dep_batch" value="GENERATE DEPARTMENTS">
                <div class="col-12 card">
                    <div class="card-header">
                        <h5>SET TIMER FOR IMPORT</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Time:</label>
                                    <input type="time" style="width:80%" id="appt" name="appt" min="00:00" max="24:00">
                                </div>
                            </div>
                            <div class="col-6">
                                <input style="margin:auto;width:100%" type="submit" class="btn btn-primary"
                                    name="schedule_import" id="schedule_import" value="SCHEDULE IMPORT">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 card">
                    <div class="card-header">
                        <h5>IMPORT BY CATEGORY</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category:</label>
                                    <select class = "form-control" id = "category" name = "category">
                                        <option value = "CONNECTED"> CONNECTED MACHINES</option>
                                        <option value = "DISCONNECTED"> DISCONNECTED MACHINES</option>
                                    </select>
                                </div>
                                <input style="margin:auto;width:100%" type="submit" class="btn btn-primary"
                                    name="generate_category" id="generate_category" value="GENERATE RECORDS">

                                    <input style="margin:auto;width:100%;margin-top:10px" type="submit" class="btn btn-primary"
                                    name="sync_records" id="sync_records" value="SYNC RECORDS">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>