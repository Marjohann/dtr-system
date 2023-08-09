<?php
include ("../config/msconfig.php");


if(isset($_POST['search'])){
    
    $bnumber = $_POST['pin'];
    $datesearch = date_create($_POST['datefrom']);
    $tformat = "HH:MM ampm";
    $formatdate = date_format($datesearch,"n/j/Y");
    $search = "Select USERINFO.Name as name,USERINFO.Badgenumber as bnumber,CHECKINOUT.CHECKTIME, FORMAT([CHECKINOUT.CHECKTIME], '$tformat') as checktime,CHECKINOUT.CHECKTYPE as checktype,CHECKINOUT.sn as sn from CHECKINOUT inner join USERINFO on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bnumber' and CHECKINOUT.CHECKTIME LIKE '$formatdate%'";
    $pre_msaccess_stmt = $conn->prepare($search);
    $pre_msaccess_stmt->execute();
    while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {?>
<!--
    $bnum = $time_result['bnumber'];
    $chktime = $time_result['checktime'];

    $chktype = $time_result['checktype'];
    
-->
<tbody>
    <tr>
        <?php
        $chktype = '';
        $muse ='';                                                     
           if($time_result['checktype'] == 'O'){
                $chktype = 'Check In';
           } 
          if($time_result['checktype'] == '0'){
                $chktype = 'Break Out';
           }    
          if($time_result['checktype'] == '1'){
                $chktype = 'Break In';
           }
          if($time_result['checktype'] == 'i'){
                $chktype = 'Check Out';
           } 
        
        if($time_result['sn'] == '3486862430384'){
                $muse ='LOBBY 1';
           } 
        else if($time_result['sn'] == '3486862430001'){
                $muse ='LOBBY 2';
           }
        else if($time_result['sn'] == '3486862430380'){
                $muse ='SP';
           }
        else if($time_result['sn'] == '3486862430322'){
                $muse ='CSWDO';
           }
        else if($time_result['sn'] == '3486862430243'){
                $muse ='CTO';
           }
        else if($time_result['sn'] == '3088182660178'){
                $muse ='CMO';
           }
        else if($time_result['sn'] == '3486862430309'){
                $muse ='CWD';
           }
        else if($time_result['sn'] == '3486862430205'){
                $muse ='PMSD';
           } else{
              $muse ='OUTSIDE OFFICE';
        }
        ?>
        <td> <?php echo $time_result['name'];?> </td>
        <td> <?php echo $time_result['bnumber'];?> </td>
         <td> <?php echo $formatdate; ?> </td>
        <td> <?php echo  $time_result['checktime'];?> </td>
        <td> <?php echo  $chktype;?> </td>
         <td> <?php echo  $muse;?> </td>

    </tr>
</tbody>
<?php  
                                                                       
     }
    if (isset($_POST['pin'])) {
        $bnumber = $_POST['pin'];	
        }   
    if (isset($_POST['datefrom'])) {
        $datesearch = $_POST['datefrom'];	
        }  

    }
    ?>
