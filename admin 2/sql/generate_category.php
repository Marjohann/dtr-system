<?php
//include('update_user.php');
//include ("../php_scripts/search_user.php");
include('../../config/config.php');
// include ('../../config/msconfig.php');
include('../../config/mssql.php');
$datefrom=$dateto='';
$db = '';

 //1.1 end
  $empNo = '';
  $bioPin = '';
  $workId = '';
$category = $_POST['category'];
  $get_employee = "SELECT * from viewbioinfo  where connection = :connected  AND dep_status = 'Active' and bio_status = 'Active' ORDER BY department ASC ";
 $prepare_employee = $con->prepare($get_employee);
  $prepare_employee->execute([':connected' => $category]);
    while ($employee = $prepare_employee->fetch(PDO::FETCH_ASSOC)) { 
      $empNo = $employee['employeeNo'];
      $bioPin = $employee['biometricId'];
      $workId = $employee['workScheduleId'];
      $bolsched = $employee['SCHEDULE'];
  
 $datefrom = strtotime($_POST['datefrom']);
 $dateto= strtotime($_POST['dateto']);
    $timeIn = "O";
    $brkout = "0";

 //1.2 INSERT BLANK RECORD
 $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
 $pre_insert_dtr = $con->prepare($stmt_insert_dtr);

 //INSERT DAY OFF
 $stmt_insert_off = "CALL spInsertDayOff(:empno,:worksched,:i,:bolsched)" ;
 $pre_insert_off = $con->prepare($stmt_insert_off);
  $format = 'Y-m-d';
 for($z=$datefrom;$z<=$dateto;$z+=86400){
  $i = date($format, $z);

   
      $pre_insert_dtr ->execute([ 
          ':empno' =>$empNo,        
          ':i' =>$i

         
     
    ]);

    $pre_insert_off ->execute([ 
        ':empno' =>$empNo,
         ':worksched' =>$workId,
        ':i' =>$i,
        ':bolsched'=> $bolsched

    ]);
     
      $date_format = 'hh:mm tt';
      $format_current_date = date_create($i);
      // $date_format_2 = date_format($format_current_date,"n/j/Y");
      $date_format_year = date_format($format_current_date,"Y");
      $date_format_month = date_format($format_current_date,"m");
      $date_format_day = date_format($format_current_date,"d");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;
      // $st_msaccess_search = "SELECT DISTINCT CHECKINOUT.CHECKTYPE as checktype ,FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%' ";
      // $st_msaccess_search = "SELECT DISTINCT TOP 20 CHECKINOUT.CHECKTYPE as checktype ,CHECKINOUT.CHECKTIME as checktime,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%' ";
     
      $st_msaccess_search = "SELECT distinct top 20 checktype ,checktime,sn ,badgenumber from checkinout  
      inner join userinfo  on  checkinout.USERID = userinfo.USERID
       where userinfo.badgenumber = :biometric and 
        DATEPART(yy,checktime)= :year AND 
        datepart(mm,checktime) = :month and datepart(dd,checktime)= :day 
        ORDER by checktime";
     
      $pre_msaccess_stmt = $mscon->prepare($st_msaccess_search);
      $pre_msaccess_stmt->execute(
        [
    ':biometric'	=>	 $bioPin,
    ':year'	=>	 $date_format_year,
    ':month'	=>	 $date_format_month,
    ':day'	=>	 $date_format_day
  ]
      );
      while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
        $chktime =  $time_result['checktime'];
        $chktype = $time_result['checktype'];
         
        if($chktype == $timeIn){
         
          $insert_timeIn = "CALL spInsertTimeIn(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
              ':empno' =>$empNo,
              ':worksched'=>$workId,
              ':i' => $i,
              ':chktime'=> $chktime,
              ':bolsched'=> $bolsched,
          ]);
        }
          if($chktype == $brkout){
          
          $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched'=>$workId,
              ':i' => $i,
              ':chktime'=> $chktime,
              ':bolsched'=> $bolsched
          ]);
        }
          $timeInPm = "1";
          if($chktype == $timeInPm){
          
          $insert_timeIn = "CALL spInsertTimeInPM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched' =>$workId,
              ':i' => $i,
              ':chktime'=> $chktime,
              ':bolsched'=> $bolsched
          ]);
              
        }
           $timeOutPM = "i";
            if($chktype == $timeOutPM ){
          
          $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched' =>$workId,
              ':i' => $i,
              ':chktime'=> $chktime,
              ':bolsched'=> $bolsched
          ]);
              
       
      }
    
    }
    if($i == $dateto){
      break;
    }
 
  }
}
unset($prepare_employee);
unset($pre_msaccess_stmt);
unset($pre_insert_off);
unset($pre_insert_dtr);
  // $con = null;
  // $mscon = null;
  echo "Congratulations you already imported the record!";
?>