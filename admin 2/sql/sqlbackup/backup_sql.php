<?php 
include('myclass.php');
if(isset($_POST['backup_database'])){

    error_reporting(E_ALL);

    /* Define database parameters here */
    define("DB_USER", 'root');
    define("DB_PASSWORD", '');
    define("DB_NAME", 'pmis');
    define("DB_HOST", 'localhost');
    define("OUTPUT_DIR", 'dbBackup'); // Folder Path / Directory Name
    define("TABLES", '*');
    
    /* Instantiate Backup_Database and perform backup */
    $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $status = $backupDatabase->backupTables(TABLES, OUTPUT_DIR) ? 'OK' : 'KO';
    echo "Backup result: " . $status;
    
   
}
?>