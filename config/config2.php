<?php

    $host = "localhost";
    $db_name = "pmis";
    $username = "root";
    $password = "";

    try{

        $con = new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>