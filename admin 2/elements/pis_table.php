 <table id = "employees" name = "employees"class = "table table-bordered table-hover " style="display:block;overflow-x:auto;white-space:nowrap;">
            <thead style="font-size:13px" >
             <th> Employee No</th>       
            <th> Last Name </th>
            <th> First Name </th>
            <th> Middle Name </th>
            <th> Residential Address </th>
            <th> Zip Code </th>
            <th> Tel. No.</th>
            <th> Permanent Address </th>
            <th> Zip  Code</th>
            <th> tel. No. </th>
            <th> Civil Status </th>
            <th> Birth Date </th>
            <th> Sex </th> 
            <th> Height </th> 
            <th> Blood Type </th>
            <th> Weight </th>
            <th> Contact No. </th>
            <th> Pag Ibig No. </th>
            <th> Issued at </th>
            <th> Philhealth No. </th>
            <th> Issued at </th>    
            <th> Tin Number </th>
            <th> GSIS Number </th>
            <th> CTC Number </th>
            <th> GSIS UMID </th>
                    
                    
                    
              </thead>
        <?php
            $get_allusers_sql = "Select * from employee";
            $get_allusers_data = $con->prepare($get_allusers_sql);
            $get_allusers_data->execute([]);
            while($user_data = $get_allusers_data->fetch(PDO::FETCH_ASSOC)){ 
        ?>
            
              
                    <tr>
                <td name = "empno"  value = "<?php echo $empno; ?>"><?php echo $user_data['EmployeeNo'];?></td>
                 <td name = "lname"  value = "<?php echo $fname; ?>"><?php echo $user_data['lastName'];?></td>
                    <td name = "fname"  value = "<?php echo $lname; ?>"><?php echo $user_data['firstName'];?></td>
                    <td name = "mname"  value = "<?php echo $mname; ?>"><?php echo $user_data['middleName'];?></td>
                    <td name = "raddress"  value = "<?php echo $raddress; ?>"><?php echo $user_data['resAddress'];?></td>
                    <td name = "rzip"  value = "<?php echo $rzip; ?>"><?php echo $user_data['rezip'];?></td>
                    <td name = "rtelno"  value = "<?php echo $rtelno; ?>"><?php echo $user_data['restelno'];?></td>
                    <td name = "paddress"  value = "<?php echo $paddress; ?>"><?php echo $user_data['peraddress'];?></td>
                    <td name = "pzip"  value = "<?php echo $pzip; ?>"><?php echo $user_data['perzip'];?></td>
                    <td name = "ptelno"  value = "<?php echo $ptelno; ?>"><?php echo $user_data['pertelno'];?></td>
                    <td name = "civil"  value = "<?php echo $civil; ?>"><?php echo $user_data['pertelno'];?></td>
                    <td name = "bday"  value = "<?php echo $bday; ?>"><?php echo $user_data['dateofbirth'];?></td>
                    <td name = "sx"  value = "<?php echo $sx; ?>"><?php echo $user_data['sex'];?></td>
                    <td name = "hght"  value = "<?php echo $hght; ?>"><?php echo $user_data['height'];?></td>
                     <td name = "bltype"  value = "<?php echo $bltype; ?>"><?php echo $user_data['bloodtype'];?></td>
                     <td name = "wght"  value = "<?php echo $wght; ?>"><?php echo $user_data['weight'];?></td>
                     <td name = "cnum"  value = "<?php echo $cnum; ?>"><?php echo $user_data['cnumber'];?></td>
                     <td name = "pgibig"  value = "<?php echo $pgibig; ?>"><?php echo $user_data['pagibig'];?></td>
                     <td name = "pgissued"  value = "<?php echo $pgissued; ?>"><?php echo $user_data['pbissued'];?></td>
                     <td name = "phlhealth"  value = "<?php echo $phlhealth; ?>"><?php echo $user_data['phlhealth'];?></td>
                     <td name = "phissued"  value = "<?php echo $phissued; ?>"><?php echo $user_data['phissued'];?></td>
                     <td name = "tin"  value = "<?php echo $tin; ?>"><?php echo $user_data['tin'];?></td>
                     <td name = "gsisnum"  value = "<?php echo $gsisnum; ?>"><?php echo $user_data['gsisnum'];?></td>
                     <td name = "ctc"  value = "<?php echo $ctc; ?>"><?php echo $user_data['ctc'];?>
                    <td name = "gsisumid"  value = "<?php echo $gsisumid; ?>"><?php echo $user_data['gsisumid'];?></td>
                    
                    
               <?php  }  ?> 

                 </tr>
        </table>