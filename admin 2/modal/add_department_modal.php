<div class="modal fade" id="add_department">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="<?php htmlspecialchars("PHP_SELF")?>">
                        <div class="row ">
                            <div class="form-group col-12">
                                <label class="col-6">Department Id</label>
                                <input type="text" class="form-control " id="deptId" name="deptId">
                            </div>
                            
                            <div class="form-group col-12">
                                <label class="col-6">Department Name</label>
                                <input type="text" class="form-control " id="deptname" name="deptname">
                            </div>

                            <div class="form-group col-12">
                                <label class="col-6">Location</label>
                                <select class="form-control" id="location" name="add-location">
                                    <option value="CONNECTED">CONNECTED</option>
                                    <option value="DISCONNECTED">DISCONNECTED</option>
                                </select>
                            </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>