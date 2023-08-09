<div class="col-12">
    <div class="form-group">
        <label> Select Department: </label>
        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
        <select class="form-control select2" name="selectdep" id="selectdep">
            <option value=""></option>
            <?php
          while($get_result = $prep_dep->fetch(PDO::FETCH_ASSOC)){
            $list_depid = $get_result['deptId'];
            $list_desc = $get_result['departmentDescription'];

          echo '<option value ="'.$list_depid.'">'.$list_desc.'</option>';
          }
          ?>
        </select>
    </div>

</div>


<input style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;" type="submit" class="btn btn-primary"
    name="import_dep" id="import_dep" value="GENERATE DEPARTMENT">

    <div class = "card">
      <div class ="card-header">
        <h4 class = "card-title">Custom Code Generation</h4>
      </div>
      <div class ="card-body">
        <div class = "row">
        <div class="input-group col-3 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Check In</span>
  </div>
  <input type="text" class="form-control" id = "custom_checkin" value ="<?php echo $customValueCheckIn?>" aria-describedby="basic-addon1">
</div>

<div class="input-group col-3 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Break Out</span>
  </div>
  <input type="text" class="form-control" id = "custom-breakout" value ="<?php echo $customValueBreakOut?>"  aria-describedby="basic-addon1">
</div>

<div class="input-group col-3 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Break In</span>
  </div>
  <input type="text" class="form-control" id="custom_breakin" value ="<?php echo $customValueBreakIn?>"  aria-describedby="basic-addon1">
</div>

<div class="input-group col-3 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Check Out</span>
  </div>
  <input type="text" class="form-control" id = "custom_checkout"  value ="<?php echo $customValueCheckOut?>" aria-describedby="basic-addon1">
</div>
<input style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;" type="submit" class="btn btn-primary"
    name="importcustomcode" id="importcustomcode" value="GENERATE WITH CUSTOM CODE">
        </div>
      </div>
    </div>