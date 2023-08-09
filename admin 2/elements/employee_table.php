<?php

$setreadonly = '';
$setSelected = '';
if($user_type == 'User'){
  $setreadonly ='disabled';
  $setSelected = 'selected';
}
?>

<div class="wrapper">
    <div class=" card  mt-2 shadow-none border border-dark" >

      
            <div class="card-header bg-dark ">
                <h3 class="card-title text-center"><b>DEPARTMENT</b></h3>
            </div>
            
            <div class="card-body">
            <div class="container-fluid">
                <div class="row mb-2" >
                    <div class="col-lg-12 col-md-12 col-sm-12 ">

                        <select  class="select2 form-control" name="department" id="deptId">
                            <?php
             
                     $get_user_sql = "SELECT * FROM department WHERE status = 'Active'";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {?>

                            <option value='<?php echo $result['deptId'];?>'>
                                <?php echo  $deptdesc = $result['departmentDescription'];?></option>;
                            <?php }?>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin:auto;margin-bottom:20px;margin-top:30px;">
                    <select class="form-control" id="emp_status" <?php echo $setreadonly;?>>
                        <option <?php echo $setSelected;?> val="Regular">Regular</option>
                        <option <?php echo $setSelected;?> val="Job Order">Job Order</option>
                        <option <?php echo $setSelected;?> val="Contractual">Contractual</option>
                        
                    </select>
                </div>
                <div class="row" id="slim">
                    <div class="col-12">
                        <table id="employees" class="table table-bordered table-reponsive table-hover dataTable text_align"
                            role="grid">
                            <thead>
                                <th> Employee No. </th>
                                <th> Full Name </th>
                            </thead>

                            <tbody id="body">
                                <tr id="row">
                                </tr>

                            </tbody>


                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>