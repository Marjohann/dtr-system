<?php
session_start();
//include('update_user.php');
//include ("../php_scripts/search_user.php");
include('../../config/config.php');
include ('../../config/msconfig.php');
$datefrom=$dateto=$selemployee ='';
$db = '';

 //1.1 end
  $empNo = '';
  $bioPin = '';
  $workId = '';
  $selemployee = $_POST['sel_employee'];
if($_SESSION['currentGeneration'] == '' || $_SESSION['currentGeneration'] != $selemployee){

  $_SESSION['currentGeneration'] = $selemployee;

  $get_employee = "Select employeeNo,biometricId,workScheduleId,schedule from bioinfo  where employeeNo = :empno LIMIT 1";
 $prepare_employee = $con->prepare($get_employee);
  $prepare_employee->execute([':empno' => $selemployee]);
    while ($employee = $prepare_employee->fetch(PDO::FETCH_ASSOC)) { 
      $empNo = $employee['employeeNo'];
      $bioPin = $employee['biometricId'];
      $workId = $employee['workScheduleId'];
      $bolsched = $employee['schedule'];
  }
 $datefrom = strtotime($_POST['datefrom']);
 $dateto= strtotime($_POST['dateto']);
    $timeIn = "O";
    $brkout = "0";
    $timeInPm = "1";
    $timeOutPM = "i";
    $array_chktime = array();
    $array_chktype =array();
    $array_date = array();
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
      $date_format_2 = date_format($format_current_date,"n/j/Y");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;
      // $st_msaccess_search = "SELECT DISTINCT CHECKINOUT.CHECKTYPE as checktype ,FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%' ";
      $st_msaccess_search = "SELECT DISTINCT TOP 20 CHECKINOUT.CHECKTYPE as checktype ,CHECKINOUT.CHECKTIME as checktime,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME LIKE '$date_format_2%'";
      $pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
      $pre_msaccess_stmt->execute();

      while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {

      array_push(date($format,$time_result['checktime']));
      array_push($time_result['checktime']);
       array_push($time_result['checktype']);
  
      }
      if($i == $dateto){
        break;
      }
   
    }
    $conn = null;
         $iterator = new MultipleIterator();
         $iterator->attachIterator(new ArrayIterator($array_date));//0
         $iterator->attachIterator(new ArrayIterator($array_chktime));//1
         $iterator->attachIterator(new ArrayIterator($array_chktype));//2

         foreach($iterator as $value){
        if($value[2] == $timeIn){
         
          $insert_timeIn = "CALL spInsertTimeIn(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
              ':empno' =>$empNo,
              ':worksched'=>$workId,
              ':i' => $value[0],
              ':chktime'=> $value[1],
              ':bolsched'=> $bolsched,
          ]);
        }
          if($value[2] == $brkout){
          
          $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched'=>$workId,
              ':i' => $value[0],
              ':chktime'=> $value[1],
              ':bolsched'=> $bolsched
          ]);
        }
         
          if($value[2] == $timeInPm){
          
          $insert_timeIn = "CALL spInsertTimeInPM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched' =>$workId,
              ':i' => $value[0],
              ':chktime'=> $value[1],
              ':bolsched'=> $bolsched
          ]);
              
        }
         
            if($value[2] == $timeOutPM ){
          
          $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:worksched,:i,:chktime,:bolsched)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched' =>$workId,
              ':i' => $value[0],
              ':chktime'=> $value[1],
              ':bolsched'=> $bolsched
          ]);
              
       
      }
    }
   
 

  echo "Congratulations you already imported the record!";
}else{
  echo "This employee is currently generated by other user!";
}
$_SESSION['currentGeneration'] = '';
$con = null;

?>