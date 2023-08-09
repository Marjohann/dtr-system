<?php

include ('../config/config.php');
if(isset($_POST['employeeno'])) {
     $empno=$_POST['employeeno'];
    
    $get_time="SELECT image from image where employeeNo = :empno";
    $user_data3=$con->prepare($get_time);
    $user_data3->execute([ ':empno'=>$empno
      ]);
     while ($result3=$user_data3->fetch(PDO::FETCH_ASSOC)) {
         
         $picture = $result3['image'];
      if($picture == "") {
         echo "<img src=../dist/img/scc%20logo.jpg";
        echo " ";
         echo "class=img-circle elevation-2 style=margin-top:50px;margin-left:20px;width:300px;height:300px;";
         echo ">";
        
          
      }else{
         echo "<img src=../upload/";
         echo  $picture;
            echo " ";
         echo "class=img-circle elevation-2 style=margin-top:50px;margin-left:20px;width:300px;height:300px;";
         echo ">";
        
     }
}
}

?>