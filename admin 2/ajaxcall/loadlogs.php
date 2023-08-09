<?php
include('../../config/config.php');
include('../../config/mssql.php');
// include ('../../config/msconfig.php');
if(isset($_POST['empno'])){
	$set_selected ='';
	$biometric = '';
	$date = '';
	$location = '';
	$get_employee  = "Select b.biometricId,DATE_FORMAT(d.Date,'%c/%e/%Y') as dDate,d.Date from bioinfo b inner join dailytimerecord d on b.employeeNo = d.employeeNo where b.employeeNo =:empno and d.Date = :id";
	$prepare_emp = $con->prepare($get_employee);
	$prepare_emp->bindParam(':empno' , $_POST['empno']);
	$prepare_emp->bindParam(':id' , $_POST['date']);
	$prepare_emp->execute();
	while($result = $prepare_emp->fetch(PDO::FETCH_ASSOC)){
		$biometric = $result['biometricId'];
		$date = $result['dDate'];
		$dateunformatted = $result['Date'];
}	
unset($prepare_emp);
	 $format_current_date = date_create($date); 
	 $date_format_year = date_format($format_current_date,"Y");
	 $date_format_month = date_format($format_current_date,"m");
	 $date_format_day = date_format($format_current_date,"d");

	 
	// $st_msaccess_search = "SELECT  FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,CHECKINOUT.CHECKTYPE as checktype,USERINFO.BADGENUMBER,sn from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$biometric' AND CHECKINOUT.CHECKTIME like '$date%'";
 // $st_msaccess_search="SELECT FORMAT([CHECKINOUT.CHECKTIME],'$date_format') AS checktime,CHECKINOUT.CHECKTYPE as checktype, USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO on CHECKINOUT.USERID = USERINFO.USERID WHERE USERINFO.BadgeNumber = '$biopin' AND CHECKINOUT.CHECKTIME like '$date%'";

 $st_msaccess_search = "SELECT distinct top 20 checktype ,checktime,sn ,badgenumber from checkinout   
 inner join userinfo  on  checkinout.USERID = userinfo.USERID 
 where userinfo.badgenumber = :biometric and  DATEPART(yy,checktime)= :year 
 AND datepart(mm,checktime) = :month and datepart(dd,checktime)= :day
 ORDER BY checktime" ;
 $pre_msaccess_stmt = $mscon->prepare($st_msaccess_search);

 $pre_msaccess_stmt->bindParam(':biometric',$biometric);
 $pre_msaccess_stmt->bindParam(':year'	, $date_format_year);
 $pre_msaccess_stmt->bindParam(':month', $date_format_month);
 $pre_msaccess_stmt->bindParam(':day', $date_format_day);
 $pre_msaccess_stmt->execute();
//  $pre_msaccess_stmt->execute([
// 	':biometric'	=>	 $biometric,
// 	':year'	=>	 $date_format_year,
// 	':month'	=>	 $date_format_month,
// 	':day'	=>	 $date_format_day
//  ]);
 while( $timeresult = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
 	if($timeresult == 0){
 		echo "failed";
 	}else{
		 //DISPLAYS THE TIME INTO THE INSERT LOG TABLE
	 $sn = $timeresult['sn'];
		$checktime_time = date_create($timeresult['checktime']);
	$checktime = date_format($checktime_time,"h:i A");
	 $checktype = $timeresult['checktype'];
	 $checkstate = 'Check In';
	 $checkColor = 'Green';

		switch($sn){
			case "3569182360161":
			$location = "CED BTM";
			break;
			case "3486862430001":
			$location = "OHRM BTM";
			break;
			case "3486862430384":
			$location = "CTO BTM";
			break;
			case "3569182360034":
			$location = "CMO BTM";
			break;
			case "3486862430380":
			$location = "PMSD BTM";
			break;
			case "3486862430309":
			$location = "CWD BTM";
			break;
			case "3486862430243":
			$location = "SP BTM";
			break;
			case "3486862430322":
			$location = "COA BTM";
			break;
			case "OGT7030057022400300":
			$location = "OCA BTM";
			break;
			case "OPH6040056041500373":
			$location = "ANNEX BTM";
			break;
			case "3486862430036":
				$location = "CHO BTM";
			break;
			case "OGT7030057022400440":
				$location = "CDRRMO BTM";
			break;
		}



	 switch($checktype){
		case "O":
			$checkstate = 'Check In';
			$checkColor = '#F3ED1A';
			break;
		case "0":
			$checkstate = 'Break Out';
			$checkColor = '#91FF61';
			break;
		case "1":
			$checkstate = 'Break In';
			$checkColor = '#FFC100';
			break;
		case "i":
		$checkstate = 'Check Out';
		$checkColor = '#00FFEC';
		break;

	 }
	 
 	$options = array('Check In','Break Out','Break In','Check Out','Overtime In','Overtime Out');
 	echo $checktime;	
 	echo "<tr style = 'background-color:".$checkColor."'>";
 	echo "<td>";
 	echo $dateunformatted;
 	echo "</td>";
	 echo "<td>";
 	echo $location;
 	echo "</td>";
 	echo "<td>";
 	echo $checktime;
 	echo "</td>";
 	echo "<td>";

	 echo '<select class = "select2" id = "insert_record">';
	 echo '<option  val  ="">Select</option>';
 	foreach ($options as $value){
	// 	if($checkstate == $value){
	// 		$set_selected = 'selected';
	// 	}else{
	// 		$set_selected ='';
	// 	}
		
 		echo '<option  val  = <?php echo $options?>';

echo $value;
echo '</option>';
};

echo'</select>';
echo "</td>";
// echo '<td><button class="btn btn-primary btn-md btn-circle reflectrecords" data-id='.$date.'> <i
//             class="fa fa-save"></i></button> </td>';
echo "</tr>";
}

}
unset($pre_msaccess_stmt);

}
?>