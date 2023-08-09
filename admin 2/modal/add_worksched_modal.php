      <div class="modal fade" id="addemployeesched">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add Work Schedule</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="container-fluid">
                          <form class="form-horizontal" method="post">
                              <div class="row">
                                  <label id="empdate" name="empdate"></label>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <input type="hidden" name="empno" id="empno" readonly>
                                          <label>Work Schedule</label>
                                          <select name="sel_worksched" id="sel_worksched" style="width:100%"
                                              class="form-control select2">
                                              <?php
                    $sql_worksched = "SELECT * from workschedule where status = 'Active'";
                    $worksched = $con->prepare($sql_worksched);
                    $worksched->execute();
                    while($work_result = $worksched->fetch(PDO::FETCH_ASSOC)){
                      $work_id = $work_result['workScheduleId'];
                      $work_desc = $work_result['workScheduleDescription'];
                       echo "<option value='".$work_id."'>".$work_desc."</option>";
                    }

                    ?>
                                          </select>
                                      </div>
                                      <table style="margin:auto;width:100%;" id="show_sched"
                                          class="table-hover table-bordered">
                                          <thead>
                                              <th>Day</th>
                                              <th>Check In</th>
                                              <th>Break Out</th>
                                              <th>Break In</th>
                                              <th>Check Out</th>

                                          </thead>
                                          <tbody id="work_body">


                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" id="closeschedule" class="btn btn-default"
                          data-dismiss="modal">Close</button>
                      <button type="submit" name="insert" id="insert" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
              </form>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>

      <?php
      if(isset($_POST['insert'])){
        $sql = "UPDATE bioinfo set workScheduleId = :workid where employeeNo = :empno";
        $prep_update = $con->prepare($sql);
        $prep_update->execute([':workid' => $_POST['sel_worksched'],
                                ':empno' =>$_POST['empno']]);


        
      }
      ?>