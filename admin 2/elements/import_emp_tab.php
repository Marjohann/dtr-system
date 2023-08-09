<div class="col-12">
    <div class="form-group">
        <label> Search Employee:</label>
        <select class="form-control select2" id="select_employee" style="width: 100%;" name="sel_employee">
            <option selected="selected"></option>

            <?php 
                        while ($employee = $result->fetch(PDO::FETCH_ASSOC)) { 
                          $employeefn = $employee['fullName']; ?>

            <option value="<?php echo $employee['empno']?> ">
                <?php echo $employeefn?></option>
            <?php  } ?>

        </select>
    </div>

</div>
<div class="col-12">

    <input style="margin:auto; width:100%;" type="submit" class="btn btn-primary" id="import_individual" name="import"
        value="GENERATE EMPLOYEE">


</div>