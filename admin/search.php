<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pmis";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['empname'];
$sql = "SELECT CONCAT(firstName,' ', SUBSTRING(middleName,1,1),'.',' ',lastName) from employee";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 echo $row["CONCAT(firstName,' ', SUBSTRING(middleName,1,1),'.',' ',lastName)"]. "\n";
 }
} else {
 echo "0 results";
}
$conn->close();
?>
