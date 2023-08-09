<?php 

// save the data from the table in database
if(isset($_POST['empno'])){	
	$message = '';
include('../../config/config.php');
$message = "The Official Business entry has been encoded";
$empno = $_POST['empno'];
$fname = $_POST['fname'];
$from = $_POST['from'];
$to = $_POST['to'];
$duration = $_POST['duration'];
$type = $_POST['type'];	
$details = $_POST['details'];	

$iterator = new MultipleIterator();
$iterator->attachIterator(new ArrayIterator($empno));
$iterator->attachIterator(new ArrayIterator($fname));
$iterator->attachIterator(new ArrayIterator($from));
$iterator->attachIterator(new ArrayIterator($to));
$iterator->attachIterator(new ArrayIterator($duration));
$iterator->attachIterator(new ArrayIterator($type));
$iterator->attachIterator(new ArrayIterator($details));
$query = "CALL spInsertTravel(:empno,:fname,:from,:to,:duration,:type,:detail)";

foreach($iterator as $value){
if($value[0] != ''){	
$prep_query = $con->prepare($query);

if($prep_query->execute([
	':empno' =>$value[0],
	':fname' =>$value[1],
	':from' =>$value[2],
	':to' =>$value[3],
	':duration' =>$value[4],
	':type' =>$value[5],
	':detail' =>$value[6]
])){
$message = "Official Business encoded";
}
}
}
}else {
	$message = "Please check fields!";
}


echo $message;
?>