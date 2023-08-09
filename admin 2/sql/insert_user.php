<?php

include '../config/config.php';

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $usertype = $_POST['usertype'];
    
    $check_username = "SELECT * FROM user WHERE
                username = :uname and Status = 'Active'";
    $get_username = $con->prepare($check_username);
    $get_username->execute([
        ':uname' => $username,
    ]);
    if ($get_username->rowCount() == 0) {

        $insert_query = "INSERT INTO user SET
                username = :uname,
                upass = :upass,
                firstName = :fname,
                lastName = :lname,
                userType = :utype";

        $insert_execute = $con->prepare($insert_query);
        $insert_execute->execute([
            ':uname' => $username,
            ':upass' => password_hash($password, PASSWORD_DEFAULT),
            ':fname' => $firstname,
            ':lname' => $lastname,
            ':utype' => $usertype,

        ]);
      
    }
}
