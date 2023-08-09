<?php
include ('../config/config.php');


$alert_msg = '';
 $empnum = '';

if(isset($_POST['submit'])){
    
    $errors = [];
   $empnum = $_POST ['empnum'];
    $currentDir = getcwd();
    $uploadDirectory = "../upload/";
    $fileExtensions = ['jpg'];
    $fileName = $_FILES['myFile']['name'];
    $fileSize = $_FILES['myFile']['size'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    $fileType = $_FILES['myFile']['type'];
    
    
    $target_file = $uploadDirectory . basename($_FILES['myFile']['name']);
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $uploadDirectory . basename($fileName);

    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed.";
    }
    if (empty($errors)) {
        $dipUpload = move_uploaded_file($fileTmpName, $uploadPath);


        if ($dipUpload) {
            $alert_msg .= ' 
       <div class="new-alert new-alert-success alert-dismissible">
           <i class="icon fa fa-success"></i>
           File has been uploaded;
       </div>     
   ';
            // $fname = $mname = $lname = $contact_number = $email = $uname = $upass = '';


        } else {
            $alert_msg .= ' 
       <div class="new-alert new-alert-success alert-dismissible">
           <i class="icon fa fa-success"></i>
           An Error Occured;
       </div>     
   ';
            // $fname = $mname = $lname = $contact_number = $email = $uname = $upass = '';

          
    } 
    }else {
        foreach ($errors as $error) {
            echo $error . "Thses are the errors" . "\n";

        }
    }
    $insert_image = "Call spInsertImage(
    :empno,:image)";
        
    $set_image = $con->prepare($insert_image);
    $set_image ->execute([
        ':empno' => $empnum,
        ':image' => $fileName
        
    ]);
    
    $alert_msg .= ' 
          <div class="new-alert new-alert-success alert-dismissible">
              <i class="icon fa fa-success"></i>
              Data Inserted
          </div>     
      ';
}
?>