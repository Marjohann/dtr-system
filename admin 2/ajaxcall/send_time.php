<?php
include('../../plugins/twilio/vendor/autoload.php');
use Twilio\Rest\Client; 
include ('../../config/msconfig.php');
if(isset($_POST['mobile'])){
$mobile = $_POST['mobile'];
$date = $_POST['dateparam'];
$gettime = [];
$bioPin = '9989';
$format_current_date = date_create($date);
$date_format_2 = date_format($format_current_date,"n/j/Y");

$st_msaccess_search = "SELECT DISTINCT CHECKINOUT.CHECKTYPE as checktype ,CHECKINOUT.CHECKTIME as checktime,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%' ORDER BY CHECKINOUT.CHECKTIME";
$pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
$pre_msaccess_stmt->execute();
while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
    $chktime =  date_create($time_result['checktime']);
    $getTimeFormat = date_format($chktime,"h:i");
    
    array_push($gettime,$getTimeFormat);
}
$message = implode(",",$gettime);
$sid    = "AC170d7985325d1e2de779426b1d1cf5f0"; 
$token  = "e2153579b62519ed92b482288bbccbdd"; 


$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($mobile , 
                           array(  
                               "messagingServiceSid" => "MGbd6335aff45a0e6f767fd08e27e98cbd",      
                               "body" => $message
                           ) 
                  ); 

echo $message;
}



?>