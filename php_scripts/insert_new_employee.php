<?php

include ("../config/config.php");
session_start();

if(!isset($_SESSION['id'])) {
    header('location:../index');
  }
    $empnum='';
    $fname='';
    $lname='';
    $mname='';
    $resaddress='';
    $rzipcode='';
    $rtelno=
    $ctship='';
    $peraddress='';
    $perzipcode='';
    $pertelno='';
    $cstatus='';
    $bday='';
    $sx = '';
    $hght='';
    $btype='';
    $wght='';
    $cnumber='';
    $pgibig='';
    $pgibigissued='';
    $phealth='';
    $phissuedate='';
    $tin='';
    $gsis='';
    $ctc='';
    $gsisbp='';


if(isset($_POST['submit'])){
    $empnum = $_POST['empnum'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mname=$_POST['mname'];
    $resaddress=$_POST['resaddress'];
    $rzipcode=$_POST['rzipcode'];
    $rtelno=$ctship=$_POST['rtelno'];
    $peraddress=$_POST['peraddress'];
    $perzipcode=$_POST['perzipcode'];
    $pertelno=$_POST['pertelno'];
    $cstatus=$_POST['cstatus'];
    $bday=$_POST['bday'];
    $sx = $_POST['sx'];
    $hght=$_POST['hght'];
    $btype=$_POST['btype'];
    $wght=$_POST['wght'];
    $cnumber=$_POST['cnumber'];
    $pgibig=$_POST['pgibig'];
    $pgibigissued=$_POST['pgibigissued'];
    $phealth=$_POST['phealth'];
    $phissuedate=$_POST['phissuedate'];
    $tin=$_POST['tin'];
    $gsis=$_POST['gsis'];
    $ctc=$_POST['ctc'];
    $gsisbp=$_POST['gsisbp'];
    
    $insert_employee= "CALL spInsertNewEmployee (
    :empno,
    :fname,
    :lname,
    :mname,
    :resaddress,
    :rzipcode,
    :rtelno,
    :peraddress,
    :perzipcode,
    :pertelno,
    :cstatus,
    :bday,
    :sx,
    :hght,
    :btype,
    :wght,
    :cnumber,
    :pgibig,
    :pgibigissued,
    :phealth,
    :phissuedate,
    :tin,
    :gsis,
    :ctc,
    :gsisbp
    
    )";
    $set_statement =  $con->prepare($insert_employee);
      $set_statement->execute([
          ':empno'       =>  $empnum,
           ':fname'      =>  $fname,
           ':lname'      =>  $lname,
           ':mname'      =>  $mname,
           ':resaddress' =>  $resaddress,
           ':rzipcode'   =>  $rzipcode,
           ':rtelno'     =>  $rtelno,
           ':peraddress' =>  $peraddress,
           ':perzipcode' =>  $perzipcode,
           ':pertelno'   =>  $pertelno,
           ':cstatus'    =>  $cstatus,
           ':bday'       =>  $bday,
           ':sx'         =>  $sx,
           ':hght'       =>  $hght,
           ':btype'      =>  $btype,
           ':wght'       =>  $wght,
           ':cnumber'    =>  $cnumber,
           ':pgibig'     =>  $pgibig,
           ':pgibigissued' =>$pgibigissued,
           ':phealth'    =>  $phealth,
           ':phissuedate' => $phissuedate,
           ':tin'        =>  $tin,
           ':gsis'       =>  $gsis,
           ':ctc'        =>  $ctc,
           ':gsisbp'     =>  $gsisbp
            
          
          
      ]);
      $btnStatus = 'disabled';
    $btnNew = 'enabled';
    
}

?>
