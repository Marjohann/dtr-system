<style>
.dtr-input-size {
    width: 95px;
    height: 30px;
}

.dtr-input-size-sm {
    height: 30px;
    width: 60px;
}
</style>
<div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card bg-none  border border-secondary shadow-none">

        <div class="card-body ">
            <div class="row  ">
                <div class="col-5 input-group ">


                    <span class="input-group-text ">
                        <label>DATE FILTER: </label>

                    </span>
                    <input style="margin-right:10px;" type="text" class="form-control text-sm text-center"
                        autocomplete="off" name="daterange" id="dtefrom" value="<?php echo $dteFrom;?>">



                    <!-- <button class="btn btn-primary float-right" type="button" data-toggle="collapse"
                        data-target="#printDtr" aria-expanded="false" aria-controls="multiCollapseExample2"><i
                            class="fa fa-print"></i>
                    </button> -->

                    <button class="btn bg-dark float-right" style="margin-left:10px;" type="button"
                        id="editEmployee" aria-expanded="false"><i class="fa fa-edit"></i>
                    </button>

                </div>
                <div class="col-7 m-0">
                    <?php include ('modal/print_modal.php');?>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card full_name m-2 shadow-none  bg-dark">
        <h4 class="text-bold text-white" id="full-name"> </h4>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card m-2 shadow-none border border-secondary bg-white">
        <div class="card-body">

            <form role="form" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class="row mt-2" >

                    <div class=" offset-3 col-6" style="background-color:white-grey;">


                        <input type="hidden" readonly id="hiddenempno" name="hiddenempno"
                            value="<?php echo $hidden;?>">
                        <input type="hidden" readonly id="hiddendeptid" name="hiddendeptid" value="">

                    </div>

                </div>

                <div class="row col-lg-12 col-md-12 col-sm-12">

                    <div class="m-auto">
                        <table id="dtr" class="form__table table-bordered table-hover bg-white">
                            <thead class="text_align">

                                <th class="border border-dark ">Date </th>
                                <th class="border border-dark">Day</th>
                                <th class="border border-dark">Check In</th>
                                <th class="border border-dark">Break Out</th>
                                <th class="border border-dark">Break In</th>
                                <th class="border border-dark">Check Out</th>
                                <th class="border border-dark">OT In</th>
                                <th class="border border-dark">OT Out</th>
                                <th class="border border-dark">Late</th>
                                <th class="border border-dark">UT</th>
                                <th class="border border-dark">Options</th>

                            </thead>
                            <tbody id="dtrbody">
                            </tbody>
                        </table>


                    </div>
                </div>
            </form>

        </div>


          
    </div>
    </div>
</div>