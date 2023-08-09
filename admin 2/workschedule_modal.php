<?php 
// foreach($html->find('table') as $target) //FINDS TABLES
// {   
//    $total = $target->find('tr'); //FINDS TRs IN A TABLE(s)
 
//    $rows = count($total); //TOTAL ROWS IN ALL THE TABLE
 
//    echo $rows; //OUTPUTS 


?>

 <div class="modal fade" id="worksched">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Work Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
               <form class="form-horizontal" method = "post" action = "<?php htmlspecialchars("PHP_SELF");?>" id = "worksched-form">
              
                <div class ="col-12">
                   <div class = "form-group ">
                 <label class = " col-form-label "> Work Schedule Code: </label>
                 <input type = "text" class = "form-control "id = "workcode" name = "workid"  required >
                <label id = "checkworkcode" style = "margin-left:115px;padding-top:5px;font-size:13px;color:red;font:Arial;"></label>
                </div>
               
                   <div class = "form-group ">
                 <label class = " col-form-label "> Work Schedule Description: </label>
                 <input type = "text" class = "form-control" required id = "workdesc" name = "workdesc">
                </div>
                 <div class = "form-group ">
                 <label class = " col-form-label "> Remarks: </label>
                 <input type = "text" class = "form-control" required id = "remarks" name = "remarks">
                </div>
                 <div class = "form-group ">
                 <label class = " col-form-label "> Status: </label>
                 <select class = "form-control"  id = "workstatus" name = "workstatus">
                  <option value = "Active">Active</option>
                    <option value = "Not Active">Not Active</option>
                 </select>
                </div>
                <div class = "form-group col-12">
                 <label class = " col-form-label "> Work Schedule  </label>
                <table style="margin:auto;width:100%;" class = "table-bordered table-hover" name= "input-sched" id = "input-sched" >
                  <thead>
                    <th>Day</th>
                    <th>Check In</th>
                    <th>Break Out</th>
                    <th>Break In</th>
                    <th>Check Out</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Sunday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>

                    <tr>
                      <td>Monday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                    <tr>
                      <td>Tuesday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                    <tr>
                      <td>Wednesday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                    <tr>
                      <td>Thursday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                    <tr>
                      <td>Friday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                    <tr>
                      <td>Saturday</td>
                      <td contenteditable="true"></td>
                      <td contenteditable="true"></td>
                       <td contenteditable="true"></td>
                       <td contenteditable="true"></td>                               
                    </tr>
                  </tbody>
                </table>
                </div>
          </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button"   name = "insert" id = "insert" disabled class="btn btn-primary">Save</button>
            </div>
             </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <style>
        .label {
          margin-right:10px;
        }
      </style>