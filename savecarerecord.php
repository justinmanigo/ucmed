<?php
	require("connect.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit();
    }
		if(isset($_POST['addcare'])){

			

			$queryinid = "SELECT in_id FROM in_patients WHERE diagnosis_id = '".$_POST['diagid']."'";
	
			$resultin = mysqli_query($conn,$queryinid);
			$rowinid = mysqli_fetch_array($resultin);

		

			$queryinsertcare = "INSERT INTO cares VALUES(NULL,".$rowinid[0].",'".$_POST['nursename']."','".$_POST['bp']."','".$_POST['temp']."','".$_POST['resrate']."','".$_POST['pulserate']."','".$_POST['cdate']."','".$_POST['ctime']."','".$_POST['concern']."')";

			

			$resultadd = mysqli_query($conn,$queryinsertcare);
			
			if($resultadd){

				$message = "Care Record Successfully Added!";
  				echo "<script type='text/javascript'>alert('".$message."')
              	window.location.href = 'viewspecpatientz.php?diagid=".$_POST['diagid']."';</script>";


			}

        }else{

			echo "ERROR";
		}
?>