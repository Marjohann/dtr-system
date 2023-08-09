<?php
include ("../config/msconfig.php");
// date from = datefrom
// date to = date to
// employee name = sel_employee
//button employee import = import
include ("../config/config.php");


// 1.1 set the start date and end date

//1.1 end
if(isset($_POST['import'])){
 $selemployee = $_POST['sel_employee'];
$datefrom = $_POST['datefrom'];
$dateto= $_POST['dateto'];

//     echo "<pre>";
// print_r($datefrom);
// echo "</pre";
// while (0==0){
// $date = date('Y-m-d',strtotime($datefrom ."+1 days"));
// $stmt_insert_dtr = "CALL spInsertDTR(:empno,:dt)" ;
//          $pre_insert_dtr = $con->prepare($stmt_insert_dtr);
//         $pre_insert_dtr ->execute([
//              ':empno' =>$selemployee,
//             ':dt' =>$date
            
//          ]);     
// if($datefrom ==$dateto){
//     break;
// }

// }
// while(strtotime($datefrom)<=strtotime($dateto)){
//     $date = date("Y-m-d",strtotime("+1 day",strtotime($datefrom)));
//     $stmt_insert_dtr = "CALL spInsertDTR(:empno,:dt)" ;
//          $pre_insert_dtr = $con->prepare($stmt_insert_dtr);
//         $pre_insert_dtr ->execute([
//              ':empno' =>$selemployee,
//             ':dt' =>$date
            
//          ]);     
// $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
// $pre_insert_dtr = $con->prepare($stmt_insert_dtr);
// $pre_insert_dtr ->execute([
//     ':empno' =>$selemployee,
//    ':i' =>$date
  
// ]);              
    $datefrom=strtotime($datefrom);
    $dateto = strtotime($dateto);
     echo  date("Y-m-d", $datefrom).'<br />';
     echo  date("Y-m-d", $dateto).'<br />';

    //  for($i=$datefrom;$i)
    // while($datefrom<=$dateto){
    // //  
    //  $date = date('Y-m-d', strtotime($datefrom. ' +1 day'));
    // echo  date("Y-m-d", $datefrom).'<br />';
    // echo  date("Y-m-d", $dateto).'<br />'; 
    // if($date==$dateto){
    //     break;
    // }
       
            
    $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
    $pre_insert_dtr = $con->prepare($stmt_insert_dtr);
    // }
    for($i=$datefrom;$i<=$dateto;$i++){

        echo  date("Y-m-d", $i).'<br />';
        // $pre_insert_dtr ->execute([
        //     ':empno' =>$selemployee,
        //    ':i' =>$i
        // ]);
          
        if($i == $dateto){
            break;
        }
    }
}
?>
<script type = "text/javascript">
// function createDateRange($startDate, $endDate, $format = "Y-m-d")
// {
//     $begin = new DateTime($startDate);
//     $end = new DateTime($endDate);

//     $interval = new DateInterval('P1D'); // 1 Day
//     $dateRange = new DatePeriod($begin, $interval, $end);

//     $range = [];
//     foreach ($dateRange as $date) {
//         $range[] = $date->format($format);
//     }

//     return $range;
// }
</script>