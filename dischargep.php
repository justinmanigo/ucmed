<?php
require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }

    if(isset($_POST['set'])){
    $querydischdate = "UPDATE in_patients SET discharge_date = '".$_POST['dischdate']."' WHERE diagnosis_id = '".$_POST['diagid']."'";
    mysqli_query($conn,$querydischdate);

    $queryamount = "UPDATE diagnosis SET paid_amount = '".$_POST['iPMount']."' WHERE diagnosis_id = '".$_POST['diagid']."'";
    /*echo $queryamount;*/
    mysqli_query($conn,$queryamount);
   

    $querynumoccu = "SELECT occupants FROM rooms WHERE room_id = '".$_POST['rmid']."'";
    /*echo $querynumoccu;*/
    $resultnumoccu = mysqli_query($conn,$querynumoccu);
    $row3 = mysqli_fetch_row($resultnumoccu);
    $occu = (int)$row3[0] - (int)1;

    $queryupoccu = "UPDATE rooms SET occupants = ".$occu." WHERE room_id = '".$_POST['rmid']."' ";
    mysqli_query($conn,$queryupoccu);
 
    
    $message = "Patient Successfully Discharged";
  	echo "<script type='text/javascript'>alert('".$message."')
    window.location.href = 'discharge.php';</script>";
	}else{

		
	}


?>