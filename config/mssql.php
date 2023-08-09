<?php

    // $host = "localhost";
    // $db_name = "pmis";
    // $username = "root";
    // $password = "admin";

    // $serverName = "DESKTOP-I3UJM8B\SQLEXPRESS";
    // $connectionOptions = array(
    //     "Database" => "zktime",
    //     "Uid" => "",
    //     "PWD" => ""
    // );

// @hrm8ioMetrics -- HRM SERVER PASSWORD
    try{
        // $mscon = sqlsrv_connect($serverName, $connectionOptions);;
        $mscon = new PDO("sqlsrv:server=DESKTOP-GSOQNJO\SQLEXPRESS;Database=zktime;ConnectionPooling=0", "", "");
        //display the enye letter
        $mscon->exec("set names utf8");
        $mscon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>