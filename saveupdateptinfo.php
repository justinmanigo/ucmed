<?php

	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }


	if(isset($_POST['update'])){
			 

			 $queryupdate = "UPDATE patients SET patient_Fname = '".$_POST['fname']."', patient_Lname = '".$_POST['lname']."',
			 patient_contact = '".$_POST['contact']."', address = '".$_POST['address']."', gender = '".$_POST['gender']."',
			 birthdate = '".$_POST['birthdate']."', civil_status = '".$_POST['civilStatus']."', patient_BloodType = '".$_POST['btype']."',
			 patient_height = '".$_POST['height']."', patient_weight = '".$_POST['weight']."'
			  WHERE patient_id = '".$_POST['pid']."'" ;
			
			$result = mysqli_query($conn,$queryupdate);
			

			if($result){

				$message = "Patient Info Successfully Updated";
				echo "<script type='text/javascript'>alert('".$message."')
              	window.location.href = 'patientz.php';</script>";

			}

	}
?>