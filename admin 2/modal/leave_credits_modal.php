<?php 

$month_array  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
$current_month = date("F");

?>



<div class="modal fade" id="leave_credits">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPDATE EMPLOYEE LEAVE CREDITS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="#" method="POST" id="leave_credits_form" enctype="multipart/form-data">
                        <div class="row">
                            <!-- <input type="text" id="leave_creditsEmpno" name="leave_creditsEmpno" readonly hidden> -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control" id="month" name="month">
                                        <?php 
                                    foreach($month_array as $value){
                                    ?>
                                        <option <?php if($value == $current_month){
                                       echo 'selected'; }?> value="<?php echo $value?>"><?php echo $value;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" id="year" name="year">
                                        <?php for($i = 2019; $i < 2050; $i++){?>
                                        <option <?php if($i == date("Y")){
                                                echo 'selected';}?> value="<?php echo $i;?>">
                                            <?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>VL Balance</label>
                                    <input type="number" class="form-control" id="vlbalance" name="vlbalance">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>SL Balance</label>
                                    <input type="number" class="form-control" id="slbalance" name="slbalance">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary " style="margin:auto;"
                                id="update_credits">UPDATE LEAVE
                                CREDITS</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>