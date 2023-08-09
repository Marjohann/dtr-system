<?php
include("config/config.php");
$alert_msg='';
if(isset($_POST['submit'])){

   $emptySession = '';
  $username=$_POST['username'];
  $pssword=$_POST['password'];
$userType = "Administrator";
$select_user_sql ="SELECT * FROM user where username = :uname";
$user_data = $con->prepare($select_user_sql);
$user_data ->execute([
  'uname' => $username
  ]);
  if($user_data->rowCount() >0){
    while ($result =$user_data->fetch (PDO::FETCH_ASSOC))
    {
   
        $_SESSION['id'] = $result['userId'];
        $_SESSION['usertype'] = $result['userType'];
        $_SESSION['fname'] = $result['firstName'];
        $_SESSION['lname'] = $result['lastName'];
        $hash_password  = $result['upass'];
        $_SESSION['currentGeneration'] =  $emptySession;
        // if($accnttype == 1)
       
        if(password_verify($pssword, $hash_password)){
        
           header('location: admin 2/dailytimerecord.php');

        
     
    }else{
      $alert_msg .= ' 
      <div class="new-alert new-alert-warning alert-dismissible">
          <i class="icon fa fa-warning"></i>
          Username does not exist!
      </div>     
  ';
    

    }
  }

}
}
    
?>