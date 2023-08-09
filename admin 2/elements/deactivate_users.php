<div class="row justify-content-center">
    <div class="col-12">
        <div class="form-group">
            <label>Select Month</label>
            <select class="form-control" id="clcDeactivate">
                <option selected>Select Month</option>
                <option value="<?php echo date("Y");?>-01-%">January</option>
                <option value="<?php echo date("Y");?>-02-%">February</option>
                <option value="<?php echo date("Y");?>-03-%">March</option>
                <option value="<?php echo date("Y");?>-04-%">April</option>
                <option value="<?php echo date("Y");?>-05-%">May</option>
                <option value="<?php echo date("Y");?>-06-%">June</option>
                <option value="<?php echo date("Y");?>-07-%">July</option>
                <option value="<?php echo date("Y");?>-08-%">August</option>
                <option value="<?php echo date("Y");?>-09-%">September</option>
                <option value="<?php echo date("Y");?>-10-%">October</option>
                <option value="<?php echo date("Y");?>-11-%">November</option>
                <option value="<?php echo date("Y");?>-12-%">December</option>
            </select>
        </div>

    </div>
    <div class="col-12">
        <button class="btn btn-primary" id="btnDeactivate" style="width:100%">DE-ACTIVATE USERS</button>
    </div>
    <div class="col-12" style="margin-top:10px;">
        <div class="alert alert-danger ">

            <h5><i class="icon fa fa-warning"></i> Caution!
            </h5>
            <label id="">This will deactivate users who do not have logs for the selected month. Please use
                this after you generated the entire month.
            </label>
        </div>
    </div>
</div>